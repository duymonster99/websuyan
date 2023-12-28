<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["stt", "menu1_id", "menu2_id", "menu3_id", "title",
    "meta_description", "content1", "content2", "content3", "image", "status_home", "status_page"];
    public function images()
    {
        return $this->hasMany(MultiImage::class);
    }

    public function menu_parent() {
        return $this->belongsTo(Menu1::class, 'menu1_id');
    }

    public function menu_child() {
        return $this->belongsTo(Menu2::class, 'menu2_id');
    }

    use HasFactory;
}
