<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExcelModel;

class StudentController extends Controller
{
    public function viewStudents(Request $request)
{
    $faculty = $request->input('faculty');
    $program = $request->input('program');
    $semester = $request->input('semester');
    
    $students = ExcelModel::where('faculty', $faculty)
                    ->where('program', $program)
                    ->where('semester', $semester)
                    ->get();
                     
        //  $students = ExcelModel::select($faculty)->distinct()->get();
                    //   dd($program);
                    return view('adminHome', compact('students'));  
}

//Viewing and searching students
public function viewStudent(Request $request)
{
        $faculty = $request->input('faculty');
        $program = $request->input('program');
        $semester = $request->input('semester');
    
    // $datas = ExcelModel::where('faculty', $faculty)
    //                 ->where('program', $program)
    //                 ->where('semester', $semester)
    //                 ->get();

    

        $faculties = ExcelModel::select('faculty',$faculty)->distinct()->get();
        $programs = ExcelModel::where('faculty', $faculty)->select('program', $program)->distinct()->get();
        // $semesters = ExcelModel::select('semester')->distinct()->get();
        $semesters = ExcelModel::where('faculty', $faculty)
        ->where('program', $program)
        ->select('semester')
        ->distinct()
        ->get();
        
        
        // dd($faculties);
        $students = ExcelModel::where('faculties', $faculties)
                        ->where('programs', $programs)
                        ->where('semesters', $semesters)
                        ->get();
                        // dd($data);
                        return view('adminHome', [
                            'faculties' => $faculties,
                            'programs' => $programs,
                            'semesters' => $semesters,
                            'studentss' => $students
                        ]);
  }

//   public function viewStudents(Request $request)
// {
//     $faculties = ExcelModel::select('faculty')->distinct()->get();
//     $programs = ExcelModel::select('program')->distinct()->get();
//     $semesters = ExcelModel::select('semester')->distinct()->get();

//     return view('adminHome')->with([    'faculties' => $faculties,        'programs' => $programs,        'semesters' => $semesters,    ]);
//     $faculty = $request->input('faculty');
//     $program = $request->input('program');
//     $semester = $request->input('semester');


// }
}