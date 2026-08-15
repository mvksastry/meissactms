<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\User;

class Chat extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'chats';

    protected $primaryKey = 'chat_id';

    protected $fillable = [
        
        'uuid',
        'user_id',
        'message',
        'is_seen'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id'); 
    }
}
