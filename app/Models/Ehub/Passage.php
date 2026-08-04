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
        'cell_line_origin_comment',
        'passage_number',
        'passage_date',
        'passage_day',
        'type',
        'transfer_day',
        'transfer_date',
        'cell_count',
        'comments',
        'status',
        'entered_by',
        'checked_by',
    ];
}
