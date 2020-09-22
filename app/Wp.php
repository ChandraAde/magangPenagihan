<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Wp extends Model
{
	protected $guarded = ['id'];
	protected $table = 'wajibpajak';
	protected $fillable = ['NPWP', 'Nama', 'Lemari', 'No_urut'];


	public function file()
	{
		return $this->hasMany(file::class,'id_wp');
		
	}
}
