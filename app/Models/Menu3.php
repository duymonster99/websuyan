<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu3 extends Model
{
    protected $fillable = ['menu1_id', 'menu2_id', 'menu3', 'slug'];
    use HasFactory;
}
