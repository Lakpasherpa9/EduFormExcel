<?php

namespace App\Imports;

use App\Models\User;
use App\Models\ExcelModel;

use Illuminate\Validation\Rule;
// use Illuminate\Validation\Rules\Importable;
use Illuminate\Validation\Rules\Unique;
use Maatwebsite\Excel\Concerns\Importable as ImportableTrait;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;



class ExportsUser implements ToModel, WithHeadingRow
{
    use Importable, ImportableTrait;

    public function model(array $row)
    {
        return new User([
            'studentid'=>$row['studentid'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
        //  $user= new User([
        //     // 'studentid'=>$row['studentId'],
        //     'email' => $row['email'],
        //     'name' => $row['name'],
        //     'password' => Hash::make($row['password']),
        // ]);
        // $user->save();

    }

    // // public function rules(): array
    // // {
    // //     return [
    // //         'email' => ['required', 'email', Rule::unique('users')],
    // //     ];
    // }
}
