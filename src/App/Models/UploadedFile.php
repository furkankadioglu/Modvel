<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $guarded = [];
    protected $table = "uploadedFiles";
    public $timestamps = true;
}

