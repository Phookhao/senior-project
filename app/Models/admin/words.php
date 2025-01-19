<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class words extends Model
{
       use HasFactory;


       protected $fillable =[
        'word',
        'pronunciation',
        'spelling',
        'meaning',
        'word_type_id',
        'word_category_id',
        'user_id',
        'audio_file',
    ];
    

    public function wordType()
    {
        return $this->belongsTo(wordtype::class, 'Word_type_id');
    }

    public function wordCategory()
    {
        return $this->belongsTo(wordcategory::class, 'Word_category_id');
    }

    public function user()
    {
        return $this->belongTo(User::class);
    }

}
