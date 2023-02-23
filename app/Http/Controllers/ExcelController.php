<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;

class ExcelController extends Controller
{
    public function index(){
        $users = DB::select('select * from users');
        return view('viewfile',['users'=>$users]);
        }
}
