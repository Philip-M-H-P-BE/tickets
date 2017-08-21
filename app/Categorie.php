<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['categoryName'];
	protected $primaryKey = 'categoryID';
	protected $guarded = ['categoryID', 'created_at', 'updated_at'];
	
	public function tickets() {
		return $this->hasMany(Ticket::class, 'category_id', 'categoryID');
	}
}
