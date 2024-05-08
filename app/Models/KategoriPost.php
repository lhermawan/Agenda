<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPost extends Model
{
    use HasFactory;
    protected $table='kategori_post';
    protected $primaryKey='id_kategori_post';
    protected $fillable = ['nama_kategori'];

    public function post()
    {
    	return $this->hasMany('App\Models\Post', 'id_kategori_post');
    }
}
