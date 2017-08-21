<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'commentID';
	protected $fillable = ['ticket_id', 'comment'];
	protected $guarded = ['commentID', 'created_at', 'updated_at'];
	
	public function ticket() {
		return $this->belongsTo(Ticket::class, ticketID);
	}
}
