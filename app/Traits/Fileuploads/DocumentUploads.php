<?php

namespace App\Traits\Fileuploads;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//Uuid import class
use Illuminate\Support\Str;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

//Import created models
use App\Models\Documents\DocumentCategory;
use App\Models\Documents\Document;
use App\Models\Documents\DocumentVersion;

use File;

use Illuminate\Support\Facades\Log;

trait DocumentUploads
{
    public function upload_new_document($fileObj, $input)
    {
      $filename = Str::uuid()->toString().'.'.$fileObj->getClientOriginalExtension();
      $year = date('Y');
      $base_path = "app/public/";
      $company = "skls/";
      //category folder here
      $cat_info = DocumentCategory::where('category_id', $input['doc_category_id'])->first();
      $category_folder = $cat_info->category_folder;

      $folder_path = $company.$input['department'].'/'.$category_folder.'/'.$year.'/';
      $final_path = $base_path.$folder_path;
      //dd($fileObj, $final_path);
      $file_path = $fileObj->move(storage_path($final_path), $filename); // Save to public/uploads

      $new_document_id = $this->save_new_document($input);
      $result = $this->save_new_document_version($input, $new_document_id, $filename, $file_path);
      return $new_document_id;
    }

    public function save_new_document($input)
    {
      //now create objects for db insertion
      $nDoc = new Document();
      $nDoc->document_uuid = Str::uuid()->toString(); 
      $nDoc->doc_category_id = $input['doc_category_id'];
      $nDoc->title = $input['title'];
      $nDoc->summary = $input['description'];
      $nDoc->tags = $input['tags'];
      $nDoc->doc_status = $input['open_status'];

      $nDoc->user_id = Auth::user()->id;

      $nDoc->created_name = Auth::user()->name;
      $nDoc->created_uuid = null; //supposed to come from users table
      $nDoc->date_created = date('Y-m-d');

      $nDoc->approved_name = null;
      $nDoc->approved_uuid = null; //supposed to come from users table
      $nDoc->approved_date = null;

      $nDoc->sealed_name = null;
      $nDoc->sealed_uuid = null; //supposed to come from users table
      $nDoc->date_sealed = null;

      $nDoc->effective_date = date('Y-m-d');
      //dd($nDoc);
      $nDoc->save();
      $new_document_id = $nDoc->document_id;
      return $new_document_id;
    }

    public function save_new_document_version($input, $new_document_id, $filename, $file_path)
    {
      //monitor version number
      $nDocVer = new DocumentVersion();
      
      $nDocVer->document_id = $new_document_id;
      $nDocVer->version_number = $input['version_num'];
      $nDocVer->content = $input['content'];
      $nDocVer->is_active = 1;
      $nDocVer->obsolete_at = null;
      $nDocVer->obsolete_by = null;
      $nDocVer->created_by = Auth::user()->id;
      $nDocVer->supersedes_version_id = null;
      $nDocVer->superseded_by_version_id = null;
      $nDocVer->filename = $filename;
      $nDocVer->file_path = $file_path;
      //dd($nDocVer);
      $result = $nDocVer->save();
      
      return $nDocVer->doc_version_id;
    }
}