<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'Judul',
        'Deskripsi',
        'photo',
        'id_kategori'
    ];

    public function fkCategory(){
        return $this->belongsTo(Category::class,'id_kategori','id');
    }
}
