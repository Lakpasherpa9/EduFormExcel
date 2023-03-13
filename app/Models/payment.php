<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $table= 'payments';
    protected $fillable = ['name', 'address', 'email','faculty','program','semester','amount'];
    
    // protected $primaryKey = 'id';

    // public function userLogin()
    // {
    //     return $this->belongsTo(payment::class, 'userId', 'studentid');
    // }
}

