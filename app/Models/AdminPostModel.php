<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPostModel extends Model
{
    use HasFactory;

    protected $table='posts';
    protected $fillable=['title','body'];
}
