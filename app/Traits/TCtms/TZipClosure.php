<?php

namespace App\Traits\TCtms;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use App\Models\Ctms\Patient;
use App\Models\Ctms\Decisions\Enrollment;
//models
use App\Models\Archieve;

//Livewire Alerts
use App\Traits\Base;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

use ZipArchive;
use Exception;

trait TZipClosure
{
    /**
     * Zip a directory and move the ZIP file to a new folder in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function zipAndMove($patient_uuid, $skls_id)
    {

        $patient_folder_path = "app/public/skls/patients/".$patient_uuid;

        $zip_temp_path = "app/public/skls/zips";

        $archieve_path = "app/public/skls/archieves";

        try {
            // Source directory inside storage/app
            $sourceDir = storage_path($patient_folder_path); // Change to your folder name

            // Validate source directory
            if (!is_dir($sourceDir)) {
                LivewireAlert::title("patient Directory Not Found" )->success()->show();
                return response()->json(['error' => 'Source directory does not exist.'], 404);
            }

            // Temporary ZIP file path
            $zipFileName = $skls_id.'_'.date('Ymd_His').'.zip';
            $tempZipPath = storage_path($zip_temp_path);


            // Create ZIP
            $zip = new ZipArchive();

            if ($zip->open($tempZipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
                return response()->json(['error' => 'Failed to create ZIP file.'], 500);
            }

            // Recursively add files and folders
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($sourceDir, \FilesystemIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::SELF_FIRST
            );

            foreach ($files as $file) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($sourceDir) + 1);

                if ($file->isDir()) {
                    $zip->addEmptyDir($relativePath);
                } else {
                    $zip->addFile($filePath, $relativePath);
                }
            }

            $zip->close();

            $narc = new Archieve();

            $narc->patient_uuid = $patient_uuid;
            $narc->description = 'Archive of SKLS Patient ID: ' . $zipFileName;
            $narc->archieved_by = Auth::user()->name;
            $narc->date_archieved = date('Y-m-d');
            $narc->filename = $zipFileName;
            $narc->file_path = $archieve_path;
            $narc->status = 1;
            $narc->save();
            
            // Destination folder inside storage/app
            $destinationFolder = storage_path($archieve_path);

            // Create destination folder if it doesn't exist
            if (!is_dir($destinationFolder)) {
                mkdir($destinationFolder, 0755, true);
            }

            // Move ZIP file to destination
            $finalPath = $destinationFolder . '/' . $zipFileName;
            rename($tempZipPath, $finalPath);
        
            return $zipFileName;

        } catch (Exception $e) {
            LivewireAlert::title($e->getMessage() )->warning()->show();
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }


}
