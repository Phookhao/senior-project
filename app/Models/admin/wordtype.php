<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name'];

    // เชื่อมกับ words
    public function type()
    {
        return $this->hasMany(AdminWord::class,'word_type_id');
    }
}
