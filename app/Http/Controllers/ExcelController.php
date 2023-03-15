<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ExcelModel;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
// use DB;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\DB;



class ExcelController extends Controller
{
 
    public  function importView(Request $request){

        $userData=ExcelModel::all();
        return view('importFile',['usersData'=>$userData]);//line 18 ko $usersData nai Frontend ko php text use garera dekhaune ho not $userData

        }   
    
    
    public function import(Request $request){
      //to check to file is present or not
      if (!$request->hasFile('file')) {
        throw ValidationException::withMessages([
            'file' => 'A file is required.',
        ]);
      }//ends here
      $rowBefore=DB::table('excels')->count();
      //to check whether the file have extension .xls or xlsx starts here
          try {
              Excel::import(new UsersImport, $request->file('file'));
          } 
          catch (NoTypeDetectedException $e) 
          {
              return redirect()->back()->withErrors(['file' => 'Invalid file type. Only .xls and .xlsx files are allowed.']);
          }
          catch(ValidationException $e){
            return redirect()->back()->withErrors($e->errors());
          }//ends here
       
        //After exporting the excel file starts here
       $excelData=Excel::import(new UsersImport, $request->file('file')->store("import.xlsx"));
       
     if ($excelData){
        if(!empty($excelData)){
        //  return redirect()->back()->with('message','The files has already been uploaded');
            $countBefore= new UsersImport();
          //  $rowBefore= $countBefore->countRows();
            
            $rowAfter= ExcelModel::query()->count();
            if ($rowAfter> $rowBefore){
              $count=$rowAfter-$rowBefore;
              $countMessage= $count." new rows has been added ";
            }else{
              $countMessage='No new row has been added';
            }
            return redirect()->back()->with(['msg'=>$countMessage]);
        }
       //  return redirect()->back()->with('success', 'Your Data Has been Exported.');
      }
      else{
        return redirect()->back()->withErrors($errors);
      }
    }//After exporting the excel file ends here

    //Update the existing row data of the excel
    public function update($id){
        $excelUpdateRow= ExcelModel::find($id);
        $name =request('name');
        $email=request('email');

        $existingRowData= ExcelModel::where(function($query) use ($name,$email){
                  $query->where('name',$name)
                  ->orWhere('email',$email);
        })->where('id','!=',$id)->first();

      if($existingRowData){
        return redirect()->back()->with('message','Data Already exists in the excel data couldnot change the existed data');
      }

        $excelUpdateRow->name=$name;
        $excelUpdateRow->email=$email;
        $excelUpdateRow->save();
        return redirect()->back()->with('message','Row updated succesfully');

      }//ends here

    //Delete excel data for each single row
    public function destroy($id){
        $excelrow = ExcelModel::find($id);
        $excelrow->delete();
        return redirect()->back()->with('success', 'Student Data has been deleted!');
        }//ends here
      

        //searching function
public function search(Request $request)
{
    $querys = $request->input('query');


    // $results = DB::table('excels')
    //     ->whereRaw('LOWER(name) = ? OR UPPER(name) = ?', [strtolower($query), strtoupper($query)])
    //     ->get();
    
    $results = ExcelModel::where(function ($query) use ($querys) {
      $query->where('name', 'like', '%'.$querys.'%')
          ->orWhere('email', 'like', '%'.$querys.'%');
  })->get();
    // Filter the results to find the matching user by name
    // $users = $results->firstWhere('name', $query);

    return view('search', ['results'=>$results]);
}

//Viewing and searching students
public function viewStudents(Request $request)
{
    $faculty = $request->input('faculty');
    $program = $request->input('program');
    // $semester = $request->input('semester');
    
    // $datas = ExcelModel::where('faculty', $faculty)
    //                 ->where('program', $program)
    //                 ->where('semester', $semester)
    //                 ->get();

    // return view('adminHome', compact('data'));
    // View::share('data', $data);
    // return view('adminHome',$data);
    // return view('adminHome')->with('datas', $datas);

        $faculties = ExcelModel::select($faculty)->distinct()->get();
        $programs = ExcelModel::where('faculty', $faculty)->where('program', $program)->distinct()->get();
        // $semesters = ExcelModel::select('semester')->distinct()->get();
        $semesters = ExcelModel::where('faculty', $faculty)
        ->where('program', $program)
        ->select('semester')
        ->distinct()
        ->get();
        // $faculty = $request->input('faculty');
        // $program = $request->input('program');
        // $semester = $request->input('semester');
        
        $data = ExcelModel::where('faculty', $faculties)
                        ->where('program', $programs)
                        ->where('semester', $semesters)
                        ->get();
                        dd($data);
                        return view('adminHome')->with('data', $data)
                        ->with('faculty', $faculties)
                        ->with('programs', $programs)
                        ->with('semesters', $semesters);
  }
}   
  
