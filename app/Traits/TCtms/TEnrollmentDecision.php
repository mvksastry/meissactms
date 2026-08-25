<?php

namespace App\Traits\TCtms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//Models
use App\Models\Ctms\Patient;
use App\Models\Ctms\Enrollment;
use App\Models\Ctms\Decisions\EnrollmentFiles;
use App\Models\Common\Todo;

//traits
use App\Traits\Base;
use App\Traits\Fileuploads\TOldFileMove;

use Illuminate\Support\Facades\Log;

trait TEnrollmentDecision
{
    use Base;
    use TOldFileMove;

    public function uploadEnrollemntFile($fileObj, $input)
    {
        switch ($input['file_code']) {

            case '881':
                $input['report_category'] = 'enrollment_qc_report_1';
                $input['report_description'] = "QC report 1";
            break;

            case '882':
                $input['report_category'] = 'enrollment_qc_report_2';
                $input['report_description'] = "QC report 2";
            break;

            case '883':
                $input['report_category'] = 'enrollment_qc_report_3';
                $input['report_description'] = "QC report 3";
            break;

            case '884':
                $input['report_category'] = 'enrollment_qc_coa';
                $input['report_description'] = "QC CoA";
            break;

            default:
                return false;
        }

        $input['patient_uuid'] = $this->patient_uuid;
        $input['file_uuid'] = $this->fileUuid();
        $input['tags'] = null;
        $input['file_name'] = $this->generateCode(12).'.'.$fileObj->getClientOriginalExtension();
        $input['file_path'] = $this->def_file_path.$this->patient_uuid.'/enrollment/valid/';      
        $input['report_status'] = 'valid';
        $input['uploaded_by'] = Auth::user()->id;
        //dd($input);
        //now check if file exists
        $oldfile = $this->getOldEnrollmentFileInfo($input['file_code']);
        //dd($oldfile, $input);
        if($oldfile)
        {
            $result = $this->fnMoveOldFileToArchieve($oldfile, $input);                 
        }
        //looks like first time insertion go ahead.
        $path = $fileObj->storeAs($input['file_path'], $input['file_name'], 'public');

        try {
            $resx = EnrollmentFiles::create($input);  
            $tableName = $resx->getTable();  
            if ($resx) { 
                $fileObj = null;
                $msg['status'] = true;
                $msg['content'] = 'New Enrollment File with Code '.$input['file_code'].' saved successfully!';
                Log::channel('patient')->info($msg);
                return $msg; 
            } else {
                $msg['status'] = false;
                $msg = 'Error: Enrollment File with Code ['. $input['file_code'] .'] could not be saved';
                Log::channel('patient')->info($msg);
                return $msg;
            }

        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg['status'] = false;
            $msg = 'Database error for Enrollment File model ['. $tableName .'] while saving : ' . $e->getMessage();
            Log::channel('patient')->info($msg);
            return $msg;
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg['status'] = false;
            $msg = 'Unexpected error for Enrollment File model ['. $tableName .'] while saving : ' . $e->getMessage();
            Log::channel('patient')->info($msg);
            return $msg;
        }
    }


    /*
    public function setFinalEnrollmentDecision($input)
    {
        //Make an entry in the enrollment table itself.
        $enPat = new Enrollment();

        $enPat->patient_uuid = $input['patient_uuid'];
        $enPat->opd_id = $input['opd_id'];

        try {
            $resx = $enPat->save();    
            $tableName = $enPat->getTable();  
            if ($resx) { 
                $msg = 'New Patient Model [' . $tableName . '] saved successfully!';
            } else {
                $msg = 'Error: New Patient Model [' . $tableName . '] could not be saved';
            }

        } catch (QueryException $e) {
            // Handles database-related errors (e.g., duplicate email)
            $msg = 'Database error for new patient model [' . $tableName . '] while saving : ' . $e->getMessage();
        } catch (\Exception $e) {
            // Handles any other general exceptions
            $msg = 'Unexpected error for new patient model [' . $tableName . '] while saving : ' . $e->getMessage();
        }
        Log::channel('patient')->info($msg);
        unset($enPat); // destroy reference
    }
        */

}
