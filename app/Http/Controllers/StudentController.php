<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExcelModel;

class StudentController extends Controller
{
//     public function viewStudents(Request $request)
// {
//     $faculty = $request->input('faculty');
//     $program = $request->input('program');
//     $semester = $request->input('semester');
    
//     $students = ExcelModel::where('faculty', $faculty)
//                     ->where('program', $program)
//                     ->where('semester', $semester)
//                     ->get();

//                     return view('adminHome', compact('students'));
// }

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
        
        // dd($faculties);
        $datas = ExcelModel::where('faculty', $faculties)
                        ->where('program', $programs)
                        ->where('semester', $semesters)
                        ->get();
                        // dd($data);
                        return view('adminHome', [
                            'faculties' => $faculties,
                            'programs' => $programs,
                            'semesters' => $semesters,
                            'datas' => $datas,
                        ]);
  }


}
