<?php

namespace App\Models\Ctms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Rmquestion extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'rmquestions';

    protected $primaryKey = 'rmquestion_id';

        protected $fillable = [
            'rmquestion_id',
            'question',
            'entered_by',
            'entry_date',
            'verified_by',
            'verified_date',
            'sealed_by',
            'sealed_date',
            'created_at',
            'updated_at'
        ];
}
