<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $users;
    public function __construct(){
        $this->users= User::select('id','name','email')-> get();

    }
    public function model(array $row)
    {
        //chaining -> operater bata garna parxa #Remainder 
        $users=   $this->users->where('name',$row['name'])->where('email',$row['email'])->first();
        return new User([
            //
            'name'     => $row['name'],
           'email'    => $row['email'], 
           'password' => Hash::make($row['password']),
        ]);
    }
}
