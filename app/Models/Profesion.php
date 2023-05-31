<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    //use HasFactory;
    protected $table="profesion";
    protected $primaryKey="id_profesion";
    protected $fillable=['profesion'];

    public $timestamps = false;
}
