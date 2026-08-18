<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;

class MailRecipient extends Model
{
    use HasFactory;
    use HasRoles;

    protected $table = 'message_recipients';

    protected $primaryKey = 'id';

    protected $fillable = [

        'message_id',
        'user_id',
        'folder',
        'is_cc',
        'is_seen',
        'seen_at'
    ];

    public function mail()
    {
        return $this->belongsTo(Message::class);
    }

    // MessageRecipient.php
    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope for folder filtering
    public function scopeFolder($query, string $folder)
    {
        return $query->where('folder', $folder);
    }

    // Scope for current user's messages
    public function scopeForUser($query, int $userId = null)
    {
        return $query->where('user_id', $userId ?? auth()->id());
    }

    // Scope for unread messages
    public function scopeUnread($query)
    {
        return $query->where('is_seen', false);
    }
}
