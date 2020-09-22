<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
	protected $guarded = ['id'];
	protected $table = 'file';
	protected $fillable =  ['id_wp', 'jenis_dok', 'nomor_ketetapan', 'no_dok','tittle','filename'];

	public function wp(){
		return $this->belongsTo(Wp::class,'id_wp');

	}
	
 
}
