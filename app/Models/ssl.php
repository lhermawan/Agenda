<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ssl extends Model
{
    use HasFactory;
    protected $table='website_ssl';
    protected $primaryKey='id';
    protected $fillable = ['id', 'host', 'expiry_date', 'owner', 'tipe','status'];
}
