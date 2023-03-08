<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ExcelModel;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
// use DB;
// use App\Http\Requests;
// use Illuminate\Validation\ValidationException;
// use App\Models\Import;


class ExcelController extends Controller
{
    // public function index(){
    //     $users = DB::select('select * from users');
    //     return view('viewfile',['users'=>$users]);
    //     }


    public  function importView(Request $request){

        $userData=ExcelModel::all();
        return view('importFile',['usersData'=>$userData]);//line 18 ko $usersData nai Frontend ko php text use garera dekhaune ho not $userData

        }   
    
    
    public function import(Request $request){
        $excelData=Excel::import(new UsersImport, $request->file('file')->store("import.xlsx"));
        // Excel::import(new UsersImport, $request->file('file')->store("import.xlsx"));
      //  return redirect()->back();
      if ($excelData){
         return redirect()->back()->with('success', 'Your Data Has been Exported.');
      }
      else{
        return redirect()->back()->withErrors($errors);
      }
    }
}   
    //Delete Excel Data
    // function delete(){
    //     // $userData=Import::find('id');
    //     // $userData->delete();

    //     // return redirect('import');
    //     $row = User::find($id);

    //      DB::table('users')->where('id',$id)->delete();
    //     // $row->delete();
    //     return redirect()->back()->with('success', 'Imported data deleted successfully.');
    // }
   
