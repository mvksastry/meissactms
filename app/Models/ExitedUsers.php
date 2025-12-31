<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class ExitedUsers extends Model
{
    //
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'exited_users';

    protected $primaryKey = 'exited_user_id';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'exited_user_id',
        'name',
        'uuid',
        'email' ,
        'email_verified_at',

        'team_id',
        'profile_photo_path',
        'folder',
        'start_date',
        'date_exited',
        'first_login',

        'exit_authorized_by',
        'date_authorized',

        'reactivation_requested_by',
        'reactivation_request_date',
        
        'reactivation_approved_by',
        'reactivation_approved_date',
        'created_at',
        'updated_at'
    ];
}
