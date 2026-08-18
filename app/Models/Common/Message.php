<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\User;

class Message extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'messages';

    protected $primaryKey = 'id';

    protected $fillable = [

        'sender_id',
        'subject',
        'content',
        'folder',
        'is_broadcast',
        'sent_on'

    ];
    // Message.php
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipients()
    {
        return $this->hasMany(MessageRecipient::class);
    }
}
