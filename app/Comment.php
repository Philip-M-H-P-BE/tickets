<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'commentID';
	protected $fillable = ['ticket_id', 'comment', 'user_id'];
	protected $guarded = ['commentID', 'created_at', 'updated_at'];
	
	public function ticket() {
		return $this->belongsTo(Ticket::class, 'ticketID');
	}
	public function user() {
		return $this->belongsTo(User::class);
	}
}
