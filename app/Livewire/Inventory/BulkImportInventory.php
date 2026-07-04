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
use App\Models\Inventory\Currency;

//Validation of product form
//use App\Livewire\Forms\Inventory\ProductForm;
//traits
use App\Traits\Base;

class BulkImportInventory extends Component
{
    use Base;
    use WithFileUploads;

    //swal messages
	public $message, $msgx;

    //flex muneu contents
    public $categories;
    public $ne = [], $nee = [], $nex = [];
    public $newEntries = [], $iter1;

    //form validation
    public $form;
    public $cleared = [];
    public $currencies;
    //form variables;
    public  $category_id, $grade, $resproject_id, $catalog_id, $name,
            $unit_id, $num_packs, $mfd_date, $batch_code, $vial_cost,
            $item_currency, $expiry_date, $supplier_id, $pack_size,
            $storage_container_id, $shelf_rack_id, $box_id, $box_position_id,
            $notes;

    //file
    public $inventoryExcel, $product_coa;

    //
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
        'productSelected' => 'fetchProductDetails',
        'groupDelete' => 'fnMassDeleteEntries'
    ];

    public function render()
    {
        $this->categories = Categories::all();
        $this->currencies = Currency::all();
        $this->nex = Tempproduct::where('office_review', 'draft')->get();
        if(count($this->nex) > 0)
        {
            //set form object values
            $this->dispatch('swal:warning', [
                'type' => 'warning',  
                'message' => 'Unfinished Inventory Found!', 
                'text' => 'Inventory Not Yet Finalized Found.'
            ]);
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
                LivewireAlert::title('The File is valid')->success()->show();
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
            LivewireAlert::title('File Must be .xls or .xlsx')->warning()->show();

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
        //set form object values
        //$this->dispatch('swal:confirm', $this->msgx);
        
        LivewireAlert::title('Proceed with this Irreversible action?')
        ->asConfirm()
        ->onConfirm('fnMassDeleteEntries')
        ->onDeny('fnKeepAllEntries')
        ->show();
    }


    public function fnMassDeleteEntries()
    {
        $result = true;
        //$result = Tempproducts::truncate();
        if($result)
        {
            LivewireAlert::title('All Entries Deleted')->success()->asToast()->show();
        }else{
            LivewireAlert::title('Deletion Failed: Check with admin')->error()->asToast()->show();
        }
    }

    public function fnKeepAllEntries()
    {
        LivewireAlert::title('Abandoned Deletion')->info()->asToast()->show();
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
        $this->pObj = Tempproduct::where('temp_product_id', $tempproduct_id)
                                    ->where('office_review', 'draft')
                                    ->first();
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
        LivewireAlert::title('Item Details Fetched')->success()->asToast()->show();
    }

    public function updateProductInfo()
    {
        //dd("update product info button", $this->tempproduct_id);
        $input = $this->form;
        //dd($input);
        LivewireAlert::title('Processing...')->info()->asToast()->show();
        //first enter data as we need product id to store the file
        if($input['num_packs'] != null )
        {
            for($i = 0; $i < $input['num_packs']; $i++)
            {	
                //$this->validate();
                //implement validations here
                $validatedData = $this->validate(
                [
                    'product_coa'               => 'nullable|file|mimes:pdf|max:2048',
                    'form.category_id'          => 'required|numeric',
                    'form.resproject_id'        => 'required|numeric',
                    'form.grade'                => 'required|alpha',
                    'form.catalog_id'           => 'required|string|regex:/^[A-Za-z0-9-_. ]+$/',
                    'form.name'                 => 'required|string|regex:/^[A-Za-z0-9-,_. ]+$/',

                    'form.unit_id'              => 'required|numeric',
                    'form.num_packs'            => 'required|numeric',

                    'form.mfd_date'             => 'nullable|date',
                    'form.batch_code'           => 'nullable|string|regex:/^[A-Za-z0-9-_. ]+$/',

                    'form.vial_cost'            => 'required|regex:/^[0-9.]+$/',
                    'form.item_currency'        => 'required|numeric',

                    'form.expiry_date'          => 'nullable|date',

                    'form.supplier_id'          => 'required|numeric',
                    'form.pack_size'            => 'required|string|regex:/^-?\d+(\.\d+)?$/',

                    'form.storage_container_id' => 'required|numeric',
                    'form.shelf_rack_id'        => 'required|numeric',
                    'form.box_id'               => 'required|numeric',
                    'form.box_position_id'      => 'required|string|regex:/^[A-Za-z0-9-_. ]+$/',

                    'notes'                     => 'nullable|string|regex:/^[A-Za-z0-9-,_. ]+$/',
                ],
                [
                    'product_coa.product_coa'                   => 'The :attribute a .pdf file',
                    'category_id.required'                      => 'The :attribute required',
                    'category_id.category_id'                   => 'The :attribute must be numeric input only',

                    'resproject_id.required'                    => 'The :attribute required',
                    'resproject_id.resproject_id'               => 'The :attribute must be numeric input only',

                    'catalog_id.required'                       => 'The :attribute required',
                    'catalog_id.catalog_id'                     => 'The :attribute must be alpha, numeric input only',

                    'name.required'                             => 'The :attribute required',
                    'name.name'                                 => 'The :attribute must be alpha, numeric input only',

                    'pack_size.required'                        => 'The :attribute required',
                    'pack_size.pack_size'                       => 'The :attribute must be numeric input only',

                    'unit_id.required'                          => 'The :attribute required',
                    'unit_id.unit_id'                           => 'The :attribute must be selected',

                    'num_packs.required'                        => 'The :attribute required',
                    'num_packs.num_packs'                       => 'The :attribute must be numeric input only',

                    'mfd_date.mfd_date'                         => 'The :attribute must be Date only',

                    'batch_Code.batch_Code'                     => 'The :attribute must be alpha, numeric input only',

                    'vial_cost.required'                        => 'The :attribute required',
                    'vial_cost.vial_cost'                       => 'The :attribute must be numbers, decimal allowed',

                    'item_currency.required'                    => 'The :attribute required',
                    'item_currency.item_currency'               => 'The :attribute must be selected',

                    'expiry_date.expiry_date'                   => 'The :attribute must be Date',

                    'supplier_id.required'                      => 'The :attribute required',
                    'supplier_id.supplier_id'                   => 'The :attribute must be selected',

                    'storage_container_id.required'             => 'The :attribute required',
                    'storage_container_id.storage_container_id' => 'The :attribute must be selected',

                    'shelf_rack_id.required'                    => 'The :attribute required',
                    'shelf_rack_id.shelf_rack_id'               => 'The :attribute must be selected',

                    'box_id.required'                           => 'The :attribute required',
                    'box_id.box_id'                             => 'The :attribute must be selected',

                    'box_position_id.box_position_id'           => 'The :attribute must be alpha, numeric characters only',

                    'notes.notes'                               => 'The :attribute must be alpha, numeric characters only',
                ],
                [
                    'product_coa'          => 'CoA File', 
                    'category_id'          => 'Category ID',
                    'resproject_id'        => 'Patient Link',
                    'catalog_id'           => 'Catalog Number',
                    'name'                 => 'Item Description',

                    'pack_size'            => 'Pack Size',
                    'unit_id'              => 'Units',
                    'num_packs'            => 'Number of Packs',

                    'mgd_dateD'            => 'Mfd Date',
                    'batch_code'           => 'Batch Code',

                    'vial_cost'            => 'Cost',
                    'item_currency'        => 'Currency',

                    'expiry_date'          => 'Expiry Date',

                    'supplier_id'          => 'Supplier',

                    'storage_container_id' => 'Container',
                    'shelf_rack_id'        => 'Rack-Shelf',
                    'box_id'               => 'Box-Sack',
                    'box_position_id'      => 'Location Details',

                    'notes'                => 'Notes',
                ]);
                LivewireAlert::title('Validations Successful')->info()->asToast()->show();
                
                $nprod = new Products();
                $nprod->pack_mark_code = $input['pack_mark_code'];
                $nprod->category_id = $input['category_id'];
                $nprod->resproject_id = $input['resproject_id']; // in CTMS it is patient id.
                $nprod->grade = $input['grade'];
                $nprod->catalog_id = $input['catalog_id'];
                $nprod->name = $input['name'];
                
                $nprod->pack_size = $input['pack_size'];
                $nprod->unit_id = $input['unit_id'];
                $nprod->num_packs = $input['num_packs'];
                
                $nprod->mfd_date = $input['mfd_date'];
                $nprod->batch_code = $input['batch_code'];
                
                $nprod->vial_cost = $input['vial_cost'];
                $nprod->item_currency = $input['item_currency'];
                
                $nprod->expiry_date = $input['expiry_date'];
                
                $nprod->supplier_id = $input['supplier_id'];
                $nprod->status_open_unopened = 1; // 1 is unopened, 0 is opened
                $nprod->status_date = date('Y-m-d');
                $nprod->quantity_left = $input['pack_size'];
                $nprod->full_empty = 1;  // 1 is full , 0 is empty
                
                $nprod->storage_container_id = $input['storage_container_id'];
                $nprod->shelf_rack_id = $input['shelf_rack_id'];
                $nprod->box_id = $input['box_id'];
                $nprod->box_position_id = $input['box_position_id'];

                if($input['shelf_rack_id'] == null || $input['box_position_id'] == null)
                {
                    $nprod->open_storage = 1;  // 1 is kept in open
                }else {
                    $nprod->open_storage = 0;  // 0 is in a box or some enclosed
                }
                
                $nprod->enteredby_id = Auth::id();
                $nprod->date_entered = date('Y-m-d');
                $nprod->notes = $input['notes'];
                //dd($input['num_packs'], $nprod);
                $nprod->save();
                LivewireAlert::title('Product Saved to DB')->info()->asToast()->show();
            }

            //After product id generated, complete the file upload .
            if ($this->product_coa) 
            {
                LivewireAlert::title('File Being saved...')->info()->asToast()->show();
                $result = $this->uploadCoAFile();
            }
            //now modify the product id in coA table --Very import
            $nCoadet = COAs::where('product_id', $this->tempproduct_id)->first();
            $nCoadet->product_id = $nprod->getKey();
            $nCoadet->save();
            LivewireAlert::title('CoA DB Updated')->info()->asToast()->show();

            //neutralize the ids selected
            $this->dispatch('closeProductModal');
            $result = Tempproduct::where('temp_product_id', $this->tempproduct_id)->delete();
            LivewireAlert::title('Product Removed from Temporary DB')->info()->asToast()->show();
            $this->nex = Tempproduct::all();

            $this->pObj = null;
            $this->tempproduct_id = null;
            LivewireAlert::title('New Product Entry Successful')->info()->success()->show();

        } else {
            LivewireAlert::title('Number of Packs Empty')->warning()->asToast()->show();
        }


    }

    public function uploadCoAFile()
    {
        $bpath = "app/public";
        $def_file_path = "skls/inventory/";

        $file_path = $def_file_path.'coas/valid/';
        $file_input['product_id'] = $this->tempproduct_id;
        $file_input['file_code'] = 222;
        $file_input['file_uuid'] = Str::uuid()->toString();

        $file_input['coa_status'] = 'valid';
        $file_input['uploaded_by'] = Auth::user()->id;
        $file_input['date_created'] = date('Y-m-d');

        $file_input['file_name'] = $this->generateCode(12).'.'.$this->product_coa->getClientOriginalExtension();
        $file_input['file_path'] = $file_path;
        //dd($input);

        //now check if file exists
        $oldfile = $this->getOldFileInfo($this->tempproduct_id, $file_input['file_code']);
        
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
            LivewireAlert::title('Old File Moved...')->info()->asToast()->show();
            //now put new file in directory
            //$path = $this->product_coa->storeAs($file_path, $file_input['file_name'], 'public' );
            //now make database entry             
        } 

        //now since we have taken care o fthe old file, now save it.
        $path = $this->product_coa->storeAs($file_path, $file_input['file_name'], 'public');
        LivewireAlert::title('New File Uploaded...')->info()->asToast()->show();
        //now enter into the db table.
        $newCoa = new COAs();
        $newCoa->product_id = $this->tempproduct_id;
        $newCoa->file_code = $file_input['file_code'];
        $newCoa->file_uuid = $this->fileUuid();
        $newCoa->file_name = $file_input['file_name'];
        $newCoa->file_path = $file_input['file_path'];
        $newCoa->coa_status = 'valid';
        $newCoa->uploaded_by = Auth::user()->id;
        $newCoa->date_created = date('Y-m-d');
        $newCoa->save();
        $this->iter1++;
        //dd($input, $oldfile);
        LivewireAlert::title('New File Data Saved...')->info()->asToast()->show();
    }

    public function getOldFileInfo($tempproduct_id, $code)
    {
        return $oldfile = COAs::where('product_id', $tempproduct_id)
                                    ->where('file_code', $code)
                                    ->where('coa_status', 'valid')
                                    ->first();
    }

}
