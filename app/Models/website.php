<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class website extends Model
{
    use HasFactory;
    protected $table='website';
    protected $primaryKey='id';
    protected $fillable = ['id', 'host', 'downtime', 'owner', 'tipe'];
}
