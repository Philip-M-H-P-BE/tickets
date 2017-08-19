<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['categoryName'];
	protected $primaryKey = 'categoryID';
	
	public function tickets() {
		return $this->hasMany(Ticket::class);
	}
}
