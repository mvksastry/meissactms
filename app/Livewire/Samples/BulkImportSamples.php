<?php

namespace App\Livewire\Samples;

use Livewire\Component;

class BulkImportSamples extends Component
{
    public function render()
    {
        return view('livewire.samples.bulk-import-samples');
    }

	//bulk sample addition
	public function downloadTemplate()
	{
			$this->alert('success', 'Template Download in Progress');
	}
    public function bulkUploadForm($repository_id)
	{
		$this->repositSelected = Repository::where('repository_id', $repository_id)->get();
		$this->sampCode = $this->generateCode(6);
		//dd($repository_id);
		
		$this->viewSingleSampleForm = false;
		$this->viewSamples = false;
		$this->viewContainerInf = true;
		$this->viewBulkUploadForm = true;
		
		Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] Bulk upload Form for Sample Displayed');
	}

    public function processBulkUpload(Request $request)
    {
			//dd($repository_id);
			// we dont need the container id as it is going to be
			//entered through the sheet, just left the info for future use, if any.
			
			//now we need to invoke the excel object and retrieve the data.
			if(count($this->sampleExcel) > 0)
			{
				$allowedExtension = ['xls', 'xlsx'];
				//for testing, in reality, pass on the user's folder name fromm DB.
				$piFolder = Auth::user()->folder;
				$destPath = "public/institutions"."/".$piFolder."/";
				foreach ($this->sampleExcel as $key => $value) 
				{
					$filename = $value->getClientOriginalName();
					$oExt = $value->getClientOriginalExtension();
					$check=in_array($oExt, $allowedExtension);
					
					if($check )
					{
						$fileName = "";
						$code8 = $this->generateCode(8);
						$fileName = $code8."_".Auth::user()->id.".".$oExt;
						$fxt[$key] = $value->storeAs($destPath, $fileName);
						//dd($destPath.$fileName);
						$data = Excel::import(new ExptsamplesImport, $destPath.$fileName);
						
						$this->sampleExcel = null;
						$this->alert('success', 'Sample Import Successful');
						$this->irqMessage = "Sample Import Successful";		
					}
					else {
						$this->irqMessage = "File types must be jpeg, jpg, tiff and pdf";
						dd($this->irqMessage);
					}                
				}
			}
			$this->alert('warning', 'Excel Sheet Error or Check Excel sheet ');
			Log::channel('activity')->info('[ '.tenant('id')." ] [ ".Auth::user()->name.' ] Bulk Upload Not Completed');
			//return back()->with('success', 'User Imported Successfully.');
    }
}
