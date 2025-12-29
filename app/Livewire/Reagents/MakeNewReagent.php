<?php

namespace App\Livewire\Reagents;

use Livewire\Component;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//models
use App\Models\Inventory\Categories;
use App\Models\Inventory\Consumption;
use App\Models\Inventory\Products;
use App\Models\Inventory\Reagents;
use App\Models\Inventory\Repository;
use App\Models\Inventory\Supplier;
use App\Models\Inventory\Units;

//Traits
use App\Traits\Base;
use App\Traits\FileUploadHandler;
//

//helpers
use Log;
use Validator;
use Carbon\Carbon;
use Illuminate\Log\Logger;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MakeNewReagent extends Component
{
	use Base;
	//use Fileupload;
	use WithFileUploads;
	
	//models
	public $repositories;
	public $categories;
	public $units;
	public $suppliers;
	
	//common panel titles
	public $panel_title = "Select Action";
	
	//consumption form inputs
	public $prodResult, $expt_id, $expt_date, $consumed;
	
	//reagent variables
    public $reagentCode;
	public $reagent_name, $reagent_nickname, $reagent_desc, $reagentClassCode;
	public $quantity_made, $units_id, $units_desc, $expirty_date;
	
	public $container_id, $rack_shelf, $box_sack, $location_code, $note_remark;
	
	public $openrestriced = 1;
	
	public $product_id, $pack_mark_code, $prod_name;
	
    public $inputs = [], $pmcProd = [], $nameProd = [];
	public $quantityProd = [], $usageProd = [];
    public $i = 0;
	public $sampCode, $catalogNumber, $itemDesc, $unit_desc1, $unit_desc2;
	
	//panels
	public $searchResultBox1 = false;
	public $left_panel_title, $right_panel_title;
	
	//remake reagents
	public $selectedReagentID, $rmReagentClassCode;
	public $rmReagent_id,$rmName,$rmDesc,$rmNickName,$rmIngradients=[];
	public $rmMadebyID, $rmDateMade, $rmRegClassCode, $rmRegCode;
	public $rmQuantity, $rmUnits_desc, $rmUnitDesc, $rmExpiryDate;
	public $rmStorContId,$rmShelfRackId,$rmBoxSackId,	$rmLocationCode;
	public $rmOpenRestrict, $rmNotes, $rmMakeSame, $usedReagents = [];
	public $altProdInfo = [], $rmCodePM = [], $reagentsUsed = [];
	public $openRemakeReagentFields = false;
	
	//flags
	public $stopFlag = true;
	
	//errors
	public $rmMakeSameError, $rmQuantityErrors = [];
	
	//listeners
	protected $listeners = [
        'itemSelected' => 'selectedItem',
		'reagentSelected' => 'selectedReagent'
   ];
	
	//panels
	public $viewNewReagentForm = false;
	public $showNewReagentEntry = false;
	
	public $viewRemakeReagentForm = false;
	public $showRemakeReagentEntry = false;
	
    public function render()
    {
        $this->units = Units::all();
		$this->suppliers = Supplier::all();
		$this->categories = Categories::all();
        $this->repositories = Repository::all();
        $this->reagentCode = $this->generateCode(6);
		//Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] Reagent home page displayed'); 
        return view('livewire.reagents.make-new-reagent');
    }

	public function selectedItem($params)
	{
		$this->sampCode = $params['pack_mark_code'];
		
		$res = Products::with('categories')
								->with('units')
								->with('vendor')
								->where('pack_mark_code', $params['pack_mark_code'])
								->first();
								
		$this->inputs[$this->i]['pmc'] = $this->sampCode;
		$this->inputs[$this->i]['name'] = $res->name;
		$this->inputs[$this->i]['cat_num'] = $res->catalog_id;
		$this->inputs[$this->i]['unit_desc1'] = $res->units->symbol;
		$this->inputs[$this->i]['unit_desc2'] = $res->units->symbol_add;
		$this->inputs[$this->i]['quantity'] = '';
		$this->inputs[$this->i]['usage'] = '';
		
		//open the result box
		$this->searchResultBox1 = true;
		
		//keep ready for next item
		$this->i = $this->i + 1;
		
		//array_push($this->inputs ,$this->i);
		//dd($this->inputs);
		
		//Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] selected the reagent ['.$this->sampCode.' ]');
	}
	
	public function postReagentInfo()
	{	
		$i=0;
		
		foreach($this->inputs as $row)
		{
			$this->inputs[$i]['quantity'] = $this->quantityProd[$i];
			$this->inputs[$i]['usage'] = $this->usageProd[$i];
			$i = $i + 1;
		}
	
		$ingradients = json_encode($this->inputs);

		$newReagent = new Reagents();
		
		$newReagent->name  = $this->reagent_name;
		$newReagent->nick_name  = $this->reagent_nickname;
		$newReagent->description  = $this->reagent_desc;
		$newReagent->madeby_id  = Auth::user()->id;
		$newReagent->date_made  = date('Y-m-d');
		$newReagent->reagent_class_code  = $this->reagentClassCode;
		$newReagent->reagent_code  = $this->sampCode;
		$newReagent->ingradients  = $ingradients;
		$newReagent->quantity_made  = $this->quantity_made;
		$newReagent->unit_id  = $this->units_desc;
		$newReagent->quantity_left  = $this->quantity_made;
		$newReagent->expiry_date  = $this->expirty_date;
		$newReagent->storage_container_id  = $this->container_id;
		$newReagent->shelf_rack_id  = $this->rack_shelf;
		$newReagent->box_sack_id  = $this->box_sack;
		$newReagent->location_code  = $this->location_code;
		$newReagent->open_restricted  = $this->openrestriced;
		$newReagent->notes  = $this->note_remark;
		$newReagent->save();
		
		Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] saved new reagent with id [ '.$newReagent->nick_name.' ]'); 
		
		//now using the inputs array process the usage information
		//especially the quantity left in products 
		//table and consumptions tables
		foreach($this->inputs as $row)
		{
			//now get the chemical detail from products table
			//reduce the quantity in products table
			$cProd = Products::where('pack_mark_code', $row['pmc'])->first();
			$cProd->quantity_left = $cProd->quantity_left - $row['quantity'];
			$cProd->status_date = date('Y-m-d');
			if( $cProd->quantity_left < $cProd->pack_size )
			{
				$cProd->status_open_unopened = 0;
			}
			//ensure it is not negative, 
			//it must be unsigned
			if($cProd->quantity_left < 0 )
			{
				$cProd->quantity_left = 0;
			}
			$cProd->save();
			//Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] updated quantity for reagent with id [ '.$row['pmc'].' ]'); 
			
			//now post to consumption table
			//create object for storage
			$newConsumption = new Consumption();
			$newConsumption->pack_mark_code = $row['pmc'];
			$newConsumption->user_id = Auth::user()->id;
			$newConsumption->date_used = date('Y-m-d');
			$newConsumption->product_id = $cProd->product_id;
			//get unit_id
			$newConsumption->unit_id = $cProd->unit_id;
			$newConsumption->quantity_consumed = $row['quantity'];
			//get Expt date
			$newConsumption->experiment_id = 0;
			$newConsumption->experiment_date = date('Y-m-d');
			$newConsumption->notes = "General Open reagent.";
			//dd($newConsumption);
			$newConsumption->save();
			
			//Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] updated consumption for reagent with id [ '.$row['pmc'].' ]');
			
		}
		
		//now clear theform
		$this->resetReagentForm();
		$ingradients = [];
		
	}
	
	public function resetReagentForm()
	{
		$this->reagent_name = null;
		$this->reagent_nickname = null;
		$this->reagent_desc = null;
		$this->sampCode = null;
		$this->quantity_made = null;
		$this->units_desc = null;
		$this->expirty_date = null;
		$this->container_id = null;
		$this->rack_shelf = null;
		$this->box_sack = null;
		$this->location_code = null;
		$this->openrestriced = null;
		$this->note_remark = null;
		//Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] reagent form reset');
	}
}
