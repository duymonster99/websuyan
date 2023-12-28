<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "accounts";
    protected $fillable = ["email", "fullname", "password", "acc_type", "reset_token", "status"];
    use HasFactory;
}
