<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ["stt", "menu1_id", "menu2_id", "menu3_id", "image", "status", "slug"];
    use HasFactory;
}
