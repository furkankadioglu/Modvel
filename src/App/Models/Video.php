<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];
    protected $table = "videos";
    public $timestamps = false;
}

