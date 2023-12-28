<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu1 extends Model
{
    protected $fillable = ["menu1", "slug"];
    use HasFactory;
}
