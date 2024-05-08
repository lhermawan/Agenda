<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='post';
    protected $primaryKey='id_post';
    protected $fillable = ['id_kategori_post', 'author', 'tanggal', 'title_slug', 'title', 'content', 'waktu', 'avatar', 'post_status', 'hits'];


    public function kategori_post()
    {
    	return $this->belongsTo('App\Models\KategoriPost', 'id_kategori_post');
    }
}
