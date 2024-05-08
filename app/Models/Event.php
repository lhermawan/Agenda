<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table='event';
    protected $primaryKey='id_event';
    protected $fillable = ['id_kategori_post', 'author', 'lokasi', 'title_slug', 'title', 'tanggal_mulai','tanggal_selesai', 'avatar', 'post_status', 'hits'];


    public function kategori_post()
    {
    	return $this->belongsTo('App\Models\KategoriPost', 'id_kategori_post');
    }
}
