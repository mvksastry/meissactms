<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//models
use App\Models\Inventory\Categories;

//use App\Models\Elab\Consumption;
use App\Models\Inventory\Products;
use App\Models\Inventory\Repository;
use App\Models\Inventory\Supplier;
use App\Models\Inventory\Units;

//Traits
use App\Traits\Base;
use App\Traits\FileUploadHandler;
use App\Traits\TCtms\TActivityQueries;
use Livewire\WithFileUploads;
use Validator;
//Livewire Alerts
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
//Validation of product form
use App\Livewire\Forms\Inventory\ProductForm;

// Log trails recorder
use Carbon\Carbon;
use Illuminate\Log\Logger;
use Log;

class AddToInventory extends Component
{
    //form validation
	public ProductForm $form;

	//Trait classes
  use Base;
  use TActivityQueries;

    //swal messages
	public $msgx;
	public $message;

    //models
	public $repositories;
	public $categories;
	public $units;
	public $suppliers;

	//common panel titles
	public $panel_title = "Select Action";

	//project info
	public $allActiveResProjects, $allActivities;

	//Fine chem form variables
	public $packMarkCode, $resproj_id, $grade, $category_id, $catalog_number, $item_desc;
	public $source_desc, $pack_size, $unit_desc, $number_packs;
	public $container_id, $rack_shelf, $box_sack, $location_code, $note_remark;
	public $batchCode, $dateMFD, $dateExpiry, $vialCost, $costCurrency;

	public $viewFineChemForm = true;

	public function render()
	{
		//$this->packMarkCode = $this->generateCode(6);
		$this->categories = Categories::all();
		$this->repositories = Repository::all();
		$this->units = Units::all();
		$this->suppliers = Supplier::all();
		$this->allActivities = $this->allCtmsActivities();
		//$this->panel_title = "Add To Inventory x";
		Log::channel('activity')->info("[ ".Auth::user()->name.' ] Displayed inventory form');
		return view('livewire.inventory.add-to-inventory');
	}

	public function postProductInfo()
	{
		//dd("reached");
		//dump all validations
		LivewireAlert::title('Processing...')->info()->asToast()->show();
		if($this->form->number_packs != null )
		{
			for($i = 0; $i < $this->form->number_packs; $i++)
			{	
				$this->validate();
				
				//implement validations here
				$validatedData = $this->validate(
				[
					'product_coa'    => 'nullable|file|mimes:pdf|max:2048',
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
					'product_coa.product_coa'       => 'The :attribute a .pdf file',
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
					'product_coa'    => 'CoA File', 
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
				LivewireAlert::title('Validations Successful')->info()->asToast()->show();

				$nprod = new Products();
				$nprod->pack_mark_code = $this->generateCode(6);
				$nprod->category_id = $this->form->category_id;
				$nprod->resproject_id = $this->form->resproj_id; // in CTMS it is ctms activity id.
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
				//Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] saved inventory info [ '.$this->generateCode(6).' ]');
				LivewireAlert::title('New Product Entry Success...')->info()->asToast()->show();
				//$msg = "Product Entry Success";
				//$this->dispatch('swal:confirm', ['title' => $msg]);
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

			$this->resetInventoryForm();
			$this->viewFineChemForm = false;
		}
		else {
			LivewireAlert::title('Number of Packs Empty')->warning()->asToast()->show();
			//$msg = "Number of Packs Empty";  //this is working and this is the way to use.
			//$this->dispatch('swal:warning', ['title' => $msg]);
		}
		//$this->viewFineChemForm = false;
	}

  private function resetInventoryForm()
	{
		//$this->panel_title = "Select Action";
		$this->form->category_id = null;
		$this->form->resproj_id = null;
		$this->form->grade = null;
		$this->form->catalog_number = null;
		$this->form->item_desc = null;
		$this->form->pack_size = null;
		$this->form->unit_desc = null;
		$this->form->number_packs = null;
		$this->form->dateMFD = null;
		$this->form->batchCode = null;
		$this->form->vialCost = null;
		$this->form->costCurrency = null;
		$this->form->dateExpiry = null;		
		$this->form->source_desc = null;
		$this->form->container_id = null;
		$this->form->rack_shelf = null;
		$this->form->box_sack = null;
		$this->form->location_code = null;
		$this->form->note_remark = null;
		//Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] reset inventory form');
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
