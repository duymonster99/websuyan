<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu2 extends Model
{
    protected $fillable = ["menu1_id", "menu2", "slug"];

    public function post() {
        return $this->hasMany(Post::class, 'menu2_id');
    }
    use HasFactory;
}
