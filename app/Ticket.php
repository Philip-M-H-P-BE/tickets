<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ticket extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'message'];
	protected $primaryKey = 'ticketID';
	protected $guarded = ['ticketID', 'created_at', 'updated_at'];
	
	public function comments(){
		return $this->hasMany(Comment::class, 'ticket_id', 'ticketID');
	}	
	public function user() {
		return $this->belongsTo(User::class);
	}	
	public function categorie() {
		return $this->belongsTo(Categorie::class, 'category_id', 'categoryID');
	} 
}
