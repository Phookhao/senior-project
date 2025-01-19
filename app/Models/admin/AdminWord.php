<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminWord extends Model
{
    use HasFactory; 

    protected $table = 'words'; //ดึงข้อมูลจากตาราง words
    protected $fillable = ['word','pronunciation','meaning','audio_file','word_type_id']; // ดึงข้อมูลของตารางwords มาตามนี้

    public function wordType()
    {
        return $this->belongsTo(wordtype::class, 'word_type_id');
    }
}
