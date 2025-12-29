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


}
