<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["stt", "menu_id", "banner", "status_banner", "title",
    "meta_description", "appendix", "content", "image", "status_home", "status_page"];

    use HasFactory;
}
