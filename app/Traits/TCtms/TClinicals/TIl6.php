<?php

namespace App\Traits\TCtms\TClinicals;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//Uuid import class
use Illuminate\Support\Str;

use File;

//Models
use App\Models\Ctms\Clinicals\Il6;

use Illuminate\Support\Facades\Log;

trait TIl6
{

    public function saveIl6Data($input)
    {
        $newIl6data = new Il6();

        $newIl6data->il6 = $input['il6'];
        $newIl6data->il6_report_file = $input['il6_report_file'];
        $newIl6data->il6_report_file_path = $input['il6_report_file_path'];


        $newIl6data->save();


    }
}