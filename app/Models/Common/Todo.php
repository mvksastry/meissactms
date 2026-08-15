<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class Todo extends Model
{
    //
    //
    use HasFactory;
    use HasRoles;

    protected $table = 'todos';

    protected $primaryKey = 'todo_id';

    protected $fillable = [
        
        'uuid',
        'user_id',
        'message',
    ];

}
