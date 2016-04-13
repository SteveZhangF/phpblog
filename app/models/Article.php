<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Jenssegers\Mongodb\Model as Eloquent;
class Article extends Eloquent {
	
	protected $fillable = ['title','content'];

	public function user(){
		return $this->belongsTo('User');
	}
}



