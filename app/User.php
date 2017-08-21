<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	
	public function tickets() {
		return $this->hasMany(Ticket::class);
	}
	public function comments() {
		return $this->hasManyThrough(Comment::class, Ticket::class, 'user_id', 'ticket_id', 'commentID');
	}
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
	/* guarded */
	protected $guarded = ['id', 'created_at', 'updated_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
