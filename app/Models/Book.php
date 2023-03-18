<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name' ,'description','price' ,'image','updated_at','created_at'];
// protected $guarded = []
}
