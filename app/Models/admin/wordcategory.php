<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];
}