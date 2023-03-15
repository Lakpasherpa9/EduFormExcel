<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPostModel extends Model
{
    use HasFactory;

    protected $table='posts';
    protected $fillable=['AdminName','title','body'];
    //Posts ko title ko lagi
    
    
}
