<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use Livewire\Attributes\On;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
//excel sheet reference
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TCtms\BulkInventoryImport;
// Log trails recorder
use Carbon\Carbon;
use Illuminate\Log\Logger;
use Log;
//file uploads
use File;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
//Uuid import class
use Illuminate\Support\Str;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Validator;
//models
use App\Models\Inventory\Units;
use App\Models\Inventory\Categories;
use App\Models\Inventory\Products;
use App\Models\Inventory\Tempproduct;
use App\Models\Inventory\Consumption;
use App\Models\Inventory\COAs;
//Validation of product form
//use App\Livewire\Forms\Inventory\ProductForm;
//traits
use App\Traits\Base;

class BulkImportInventory extends Component
{
    use Base;
    use WithFileUploads;

    //swal messages
	public $message;

    //flex muneu contents
    public $categories;
    public $ne = [], $nee = [], $nex = [];
    public $newEntries = [], $iter1;

    //form validation
    public $form;

    //file
    public $inventoryExcel, $product_coa;

    //panels
    public $templatePanel = false;
    public $finalizePanel = false;

    //modals variables
    public $id, $tempproduct_id, $pObj, $file_uuid;
    public $units;
    public $currency = [
        "inr" => "IN Rupee",
        "usd" => "US $",
        "gbp" => "GB P",
        "jpy" => "JP Y",
        "euro" => "Euro"
    ];

    protected $listeners = [
        'productSelected' => 'fetchProductDetails'
    ];

    public function render()
    {
        $this->categories = Categories::all();
        $this->nex = Tempproduct::all();
        if(count($this->nex) > 0)
        {
            //set form object values
            $this->finalizePanel = true;
        }
        return view('livewire.inventory.bulk-import-inventory');
    }

    public function downloadBulkTemplate()
    {
        //dd("reached download template");
    }

    public function processBulkInventoryUpload()
    {
        //dd("reached bulk inventory upload");
        // we dont need the container id as it is going to be
        //entered through the sheet, just left the info for future use, if any.
        //now we need to invoke the excel object and retrieve the data.
        $year = date('Y');
        //dd($year);
        if($this->inventoryExcel)
        {
            $allowedExtension = ['xls', 'xlsx'];
            //for testing, in reality, pass on the user's folder name fromm DB.
            $destPath = "skls/inventory/".$year."/raw/";
            $oExt = $this->inventoryExcel->getClientOriginalExtension();
            $check=in_array($oExt, $allowedExtension);
            //$check = true;
            if($check)
            {
                //first store the file
                $code8 = $this->generateCode(8);
                $fileName = $code8."_".Auth::user()->id.".".$oExt;
                $result = $this->inventoryExcel->storeAs($destPath, $fileName);
                //dd($destPath.$fileName); // till here no isssue

                //then import the file into tempproducts db table
                $this->newEntries = Excel::import(new BulkInventoryImport, $destPath.$fileName);
                $this->nex = Tempproduct::all();
                //dd($this->nex);

                //$this->inventoryExcel = null;
                LivewireAlert::title('Inventory Import Successful')->warning()->show();
                //Now open panel for finalization of the data entered.
            }
            else {
                $this->alert('danger', 'File type must be .xls or .xlsx only');
                //$this->irqMessage = "File type must be .xls or .xlsx only";
                //dd($this->irqMessage);
            }
        }
        LivewireAlert::title('Excel Sheet Error or Check Excel Sheet')->warning()->show();
        //Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] Bulk Upload Not Completed');
        //return back()->with('success', 'User Imported Successfully.');
    }

    public function finalizeBulkInventoryUpload()
    {
        //dd("reached finalization of inventoryupload");
    }

    public function deleteBulkEntries()
    {
        dd("deletion code reached");
    }

    public function fetchProductDetails($tempproduct_id)
    {
        // Handle the message from child
        // Handle the action, e.g., redirect or open modal
        $this->id = $tempproduct_id;
        $this->tempproduct_id = $tempproduct_id;
        $this->setTempProductObject($tempproduct_id);
        //dd($this->pObj);
        //$this->dispatch('uuid-selected', ['id' => $this->id]);
        $this->dispatch('tempproduct-details', ['pObj' => $this->pObj] );
        //session()->flash('info', $message);
    }
    public function setTempProductObject($tempproduct_id)
    {
        //preset model select boxes
        $this->units = Units::all();
        //dd("reached");
        $this->pObj = Tempproduct::where('temp_product_id', $tempproduct_id)->first();
        $this->form['pack_mark_code'] = $this->pObj->pack_mark_code;
        $this->form['category_id'] = $this->pObj->category_id;
        $this->form['resproject_id'] = $this->pObj->resproject_id;
        $this->form['grade'] = $this->pObj->grade;
        
        $this->form['catalog_id'] = $this->pObj->catalog_id;
        $this->form['name'] = $this->pObj->name;
        $this->form['pack_size'] = $this->pObj->pack_size;
        $this->form['unit_id'] = $this->pObj->unit_id;
        $this->form['num_packs'] = $this->pObj->num_packs;

        $this->form['mfd_date'] = $this->pObj->mfd_date;
        $this->form['batch_code'] = $this->pObj->batch_code;
        $this->form['vial_cost'] = $this->pObj->vial_cost;
        $this->form['item_currency'] = $this->pObj->item_currency;
        $this->form['item_cost'] = $this->pObj->item_cost;        
        $this->form['expiry_date'] = $this->pObj->expiry_date;
        $this->form['supplier_id'] = $this->pObj->supplier_id;


        $this->form['storage_container_id'] = $this->pObj->storage_container_id;
        $this->form['shelf_rack_id'] = $this->pObj->shelf_rack_id;
        $this->form['box_id'] = $this->pObj->box_id;
        $this->form['box_position_id'] = $this->pObj->box_position_id;
        $this->form['notes'] = $this->pObj->notes;
    }

    public function updateProductInfo()
    {
        //dd("update product info button", $this->tempproduct_id);
        $input = $this->form;
        dd($this->form);

        //$this->validate();
        
        /*
        //implement validations here
        $validatedData = $this->validate(
        [
            'category_id'    => 'required|numeric',
            'resproj_id'     => 'required|numeric',
            'grade'          => 'required|alpha',
            'catalog_number' => 'required|string|regex:/^[A-Za-z0-9-,_. ]+$/',
            'item_desc'      => 'required|string|regex:/^[A-Za-z0-9-,_. ]+$/',

            'pack_size'      => 'required|string|regex:/^[A-Za-z0-9-,_. ]+$/',
            'unit_desc'      => 'required|numeric',
            'number_packs'   => 'required|numeric',

            'dateMFD'        => 'nullable|date',
            'batchCode'      => 'nullable|string|regex:/^[A-Za-z0-9-,_. ]+$/',

            'vialCost'       => 'required|regex:/^[0-9.]+$/',
            'costCurrency'   => 'required|alpha',

            'dateExpiry'     => 'nullable|date',

            'source_desc'    => 'required|numeric',
            'pack_size'      => 'required|string|regex:/^[A-Za-z0-9-,_. ]+$/',

            'container_id'   => 'required|numeric',
            'rack_shelf'     => 'required|numeric',
            'box_sack'       => 'required|numeric',
            'location_code'  => 'required|string|regex:/^[A-Za-z0-9-,_. ]+$/',

            'note_remark'    => 'nullable|string|regex:/^[A-Za-z0-9-,_. ]+$/',
        ],
        [
            'category_id.required'          => 'The :attribute required',
            'category_id.category_id'       => 'The :attribute must be numeric input only',

            'resproj_id.required'           => 'The :attribute required',
            'resproj_id.resproj_id'         => 'The :attribute must be numeric input only',

            'catalog_number.required'       => 'The :attribute required',
            'catalog_number.catalog_number' => 'The :attribute must be alpha, numeric input only',

            'item_desc.required'            => 'The :attribute required',
            'item_desc.item_desc'           => 'The :attribute must be alpha, numeric input only',

            'pack_size.required'            => 'The :attribute required',
            'pack_size.pack_size'           => 'The :attribute must be numeric input only',

            'unit_desc.required'            => 'The :attribute required',
            'unit_desc.unit_desc'           => 'The :attribute must be selected',

            'number_packs.required'         => 'The :attribute required',
            'number_packs.number_packs'     => 'The :attribute must be numeric input only',

            'dateMFD.dateMFD'               => 'The :attribute must be Date only',

            'batchCode.batchCode'           => 'The :attribute must be alpha, numeric input only',

            'vialCost.required'             => 'The :attribute required',
            'vialCost.vialCost'             => 'The :attribute must be numbers, decimal allowed',

            'costCurrency.required'         => 'The :attribute required',
            'costCurrency.costCurrency'     => 'The :attribute must be selected',

            'dateExpiry.dateExpiry'         => 'The :attribute must be Date',

            'source_desc.required'          => 'The :attribute required',
            'source_desc.source_desc'       => 'The :attribute must be selected',

            'container_id.required'         => 'The :attribute required',
            'container_id.container_id'     => 'The :attribute must be selected',

            'rack_shelf.required'           => 'The :attribute required',
            'rack_shelf.rack_shelf'         => 'The :attribute must be selected',

            'box_sack.required'             => 'The :attribute required',
            'box_sack.box_sack'             => 'The :attribute must be selected',

            'location_code.location_code'   => 'The :attribute must be alpha, numeric characters only',

            'note_remark.note_remark'       => 'The :attribute must be alpha, numeric characters only',
        ],
        [
            'category_id'    => 'Category ID',
            'resproj_id'     => 'Research Project',
            'catalog_number' => 'Catalog Number',
            'item_desc'      => 'Item Description',

            'pack_size'      => 'Pack Size',
            'unit_desc'      => 'Units',
            'number_packs'   => 'Number of Packs',

            'dateMFD'        => 'Mfd Date',
            'batchCode'      => 'Batch Code',

            'vialCost'       => 'Cost',
            'costCurrency'   => 'Currency',

            'dateExpiry'     => 'Expiry Date',

            'source_desc'    => 'Supplier',
            'pack_size'      => 'Pack Size',

            'container_id'   => 'Container',
            'rack_shelf'     => 'Rack-Shelf',
            'box_sack'       => 'Box-Sack',
            'location_code'  => 'Location Details',

            'note_remark'    => 'Notes',
        ]);
        */

        $nprod = new Tempproduct();
        $nprod->pack_mark_code = $this->form->pack_mark_code;
        $nprod->category_id = $this->form->category_id;
        $nprod->resproject_id = $this->form->resproj_id; // in CTMS it is patient id.
        $nprod->grade = $this->form->grade;
        $nprod->catalog_id = $this->form->catalog_number;
        $nprod->name = $this->form->item_desc;
        
        $nprod->pack_size = $this->form->pack_size;
        $nprod->unit_id = $this->form->unit_desc;
        $nprod->num_packs = $this->form->number_packs;
        
        $nprod->mfd_date = $this->form->dateMFD;
        $nprod->batch_code = $this->form->batchCode;
        
        $nprod->vial_cost = $this->form->vialCost;
        $nprod->item_currency = $this->form->costCurrency;
        
        $nprod->expiry_date = $this->form->dateExpiry;
        
        $nprod->supplier_id = $this->form->source_desc;
        $nprod->status_open_unopened = 1; // 1 is unopened, 0 is opened
        $nprod->status_date = date('Y-m-d');
        $nprod->quantity_left = $this->form->pack_size;
        $nprod->full_empty = 1;  // 1 is full , 0 is empty
        
        $nprod->storage_container_id = $this->form->container_id;
        $nprod->shelf_rack_id = $this->form->rack_shelf;
        $nprod->box_id = $this->form->box_sack;
        $nprod->box_position_id = $this->form->location_code;

        if($this->form->box_sack == null || $this->form->location_code == null)
        {
            $nprod->open_storage = 1;  // 1 is kept in open
        }else {
            $nprod->open_storage = 0;  // 0 is in a box or some enclosed
        }
        
        $nprod->enteredby_id = Auth::id();
        $nprod->date_entered = date('Y-m-d');
        $nprod->notes = $this->form->note_remark;
        //dd($this->form->number_packs, $nprod);
        $nprod->save();


    }


    public function fileUuid()
    {
        $this->file_uuid = Str::uuid()->toString();
        return $this->file_uuid;
    }

    public function uploadCoAFile()
    {
        //dd("upload CoA file", $this->tempproduct_id);
        $bpath = "app/public";
        $def_file_path = "skls/inventory/";

        $file_path = $this->def_file_path.'/coas/valid/';
        $input['product_id'] = $this->tempproduct_id;
        $input['file_code'] = 222;
        $input['file_uuid'] = $this->fileUuid();

        $input['coa_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        $input['date_created'] = date('Y-m-d');

        // Check if $file is a Livewire temporary uploaded file
        if ($this->product_coa) {
            // Validate file
            //$this->validate([
            //    'blood_routine' => 'file|max:2048', // max 2MB
            //]);
            $input['file_name'] = $this->generateCode(12).'.'.$this->product_coa->getClientOriginalExtension();
            $input['file_path'] = $file_path;
            //dd($input);

            //now check if file exists
            $oldfile = $this->getOldFileInfo($this->tempproduct_id, $input['file_code']);
            
            if($oldfile){

                $ttpath = "app/public/skls/inventory/coas/archieve/";
                $t_path = storage_path($ttpath);
                $pathTest = File::isDirectory($t_path);
                //dd($pathTest);
                if (!$pathTest) {
                    mkdir($t_path, $mode = 0775, $recursive = true);
                    //dd("dir created");
                }
                // set destination directory for moving the file
                $to_path = "skls/inventory/coas/archieve/";
                //move that file unwanted directory
                File::move(storage_path("app/public/".$oldfile->file_path.$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
                
                //after moving get the path and update database of that file.
                $oldfile->file_path = $to_path;
                //after moving set the status to invalid
                $oldfile->report_status = 'invalid';
                //now save the file.
                $oldfile->save();

                //now put new file in directory
                $path = $this->product_coa->storeAs($file_path, $input['file_name'], 'public' );
                //now make database entry
                $newFile = COAs::insert($input);
                $this->product_coa = null;
                $this->iter1++;
                //                
            } else {
                //looks like first time insertion go ahead.
                $path = $this->product_coa->storeAs($file_path, $input['file_name'], 'public');

                $newFile = COAs::insert($input);
                $this->product_coa = null;
                $this->iter1++;
            }
            //dd($input, $oldfile);
            session()->flash('message', "File uploaded successfully: {$file_path}");
        } else {
            dd("file not selected");
            //session()->flash('error', 'No valid file uploaded.');
        }
    }

    public function getOldFileInfo($tempproduct_id, $code)
    {
        return $oldfile = COAs::where('temp_product_id', $tempproduct_id)
                                    ->where('file_code', $code)
                                    ->where('coa_status', 'valid')
                                    ->first();
    }

}
