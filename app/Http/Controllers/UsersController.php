<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Models\User;

class UsersController extends Controller
{
    //
  
      // public  function importView(Request $request){
      //       $userData=User::get();
      //       return view('importFile',['usersData'=>$userData]);//line 18 ko $usersData nai Frontend ko php text use garera dekhaune ho not $userData
      //   }
        
      //   public function import(Request $request){
      //       Excel::import(new UsersImport, $request->file('file')->store("import.xlsx"));
      //     //  return redirect()->back();
      //     return redirect()->back()->with('success', 'Your Data Has been Exported.');
      //   }


        // public function Userslist(){
        //   $users=User::get();
        //   return view('importFile',['UserData'=>$userData]);
        // }
        
        // public function export(Request $request){
        //     return Excel::download(new UsersExport, 'exports.xlsx');
        // }
}

?>