<?php

namespace App\Imports;
use Illuminate\Http\Request;
use App\Models\ExcelModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Validators\ValidationException;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $users;
    public function __construct(){
        $this->users= ExcelModel::select('id','Student_Id','name','email')-> get();

    }

    public function rules():array{
        return [
            'email'=>['required', 'email', Rule::unique('users','email')],
            'file'=>'mimes:xls,xlsx',
        ];    
    }

    public function model(array $row)
    {
        //chaining -> operater bata garna parxa #Remainder 
        $users=   $this->users->where('name',$row['name'])->where('email',$row['email'])->first();

        //Validation of the email
        $validator = Validator::make($row,$this->rules() );
        // [
        //     'email' => [
        //         'required',
        //         'email',
        //         Rule::unique('users', 'email'),
        //     ],
        // ]);

        if ($validator->fails()){
            throw new ValidationException($validator);
        }

        return new ExcelModel([
            //
           // 'Student_Id' => $row['Student_Id'],
            'name'     => $row['name'],
           'email'    => $row['email'], 
           'password' => Hash::make($row['password']),
        ]);
    }
}
