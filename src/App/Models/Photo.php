<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];
    protected $table = "photos";
    public $timestamps = false;
}

