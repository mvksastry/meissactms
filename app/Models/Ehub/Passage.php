<?php

namespace App\Models\Ehub;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Passage extends Model
{
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'passages';

    protected $primaryKey = 'passage_id';

    protected $fillable = [
        'passage_id',
        'chondcyte_production_id',
        'cell_line_id',
        'cell_line_origin',
        'Cell Line Origin',
        'passage_number',
        'passage_date',
        'passage_day',
        'plate_type',
        'transfer_plate_day',
        'transfer_plate_date',
        'flask_type` smallint',
        'transfer_flask_day',
        'transfer_falsk_date',
        'cell_count',
        'comments',
        'status',
        'entered_by',
        'checked_by',
    ];
}
