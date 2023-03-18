<?php

namespace App\Imports;
use Illuminate\Http\Request;
use App\Models\ExcelModel;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule\In;
// use Maatwebsite\Excel\Validators\ValidationException;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\ValidationException;


class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct(){
        // $this->users= ExcelModel::select('id','studentId','name','email')-> get();
         $this->users= ExcelModel::select('id','studentid','name','email','faculty','program','semester','password')-> get();
    

    }

    //Method to count the number of rows.
    public function countRows():int{
        return ExcelModel::count();
    }

    public function rules():array{
        return [
           'studentid' =>['required','unique:excels,studentid'],
            'email'=>[
                'required', 
                'email', 
                Rule::unique('users','email')],
            'faculty'=>[
                'required',
                'in:Science and Technology,Management,science and technology,management'
                //'in:mixed,Science and Technology','Management'
            ],
            'program'=>[
                'required',
                'in:BE Computer,BE Civil,BBA,BIT,BCA,be computer,be civil,bba,bca,bit'
                 //'in:mixed,BE Computer,BE Civil,BBA,BIT,BCA'
            ],
            'semester'=>['required','in:1,2,3,4,5,6,7,8'] 
        ];    
    }

    public function model(array $row)
    {
      //  dd($row);
        //chaining -> operater bata garna parxa #Remainder 
        // $users=   $this->users->where('studentid',$row['studentid']) 
        //             ->where('name',$row['name'])
        //             ->where('email',$row['email'])
        //             ->where('faculty',$row['faculty'])
        //             ->where('program',$row['program'])
        //             ->where('semester',$row['semester'])
        //             ->first();

             //check if the studentId field is there or not
                // if (isset($row['studentid'])){
                //     $users->where('studentid',$row['studentid']);
                // }       

                // $import=$users->first();
                    
                    // ->where('studentId',$row['studentId'])


           //Existing user vayo vane k garne tw starts here
           $existingData= ExcelModel::where('email',$row['email'])->first();
           if ($existingData){
               return null;
           }//Existing user vayo vane k garne tw Ends here
      
           
        //Validation of the email
      
            $validator = Validator::make($row,$this->rules() );

            if ($validator->fails()){
                throw new ValidationException($validator);
            }

     
        return new ExcelModel([
            //
          
          'studentid' => $row['studentid'],
            'name'     => $row['name'],
           'email'    => $row['email'], 
           'faculty'    => $row['faculty'], 
           'program'    => $row['program'], 
           'semester'    => $row['semester'],
           'password' => Hash::make($row['password']),
           //'password' => Hash::make($row['password']),
            ]);
       

           
    }
}
