<?php

namespace App\Traits\Fileuploads;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//models
use App\Models\Ctms\ClinicalReports;

//
use Illuminate\Support\Facades\Log;

trait TOldFileMove
{

  public function fnMoveOldFileToArchieve($oldfile, $input)
  {
    $ttpath = "app/public/skls/patients/".$input['patient_uuid']."/clinicals/archieve/";
    $t_path = storage_path($ttpath);
    $pathTest = File::isDirectory($t_path);
    //dd($pathTest);
    if (!$pathTest) {
        mkdir($t_path, $mode = 0775, $recursive = true);
    }
    // set destination directory for moving the file
    $to_path = "skls/patients/".$input['patient_uuid']."/clinicals/archieve/";
    //move that file unwanted directory
    File::move(storage_path("app/public/".$oldfile->file_path."/".$oldfile->file_name), storage_path("app/public/".$to_path.$oldfile->file_name));
    //after moving get the path and update database of that file.
    $oldfile->file_path = $to_path;
    //after moving set the status to invalid
    $oldfile->report_status = 'invalid';
    //now save the file.
    $oldfile->save();

    return true;
  }

}