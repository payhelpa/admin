<?php

namespace App\Exports;

use App\Models\User;
use App\Models\IndividualDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $phone = IndividualDetail::select('phone_number')->first();
        // User::select('name', 'email')->get();
        return User::select('name', 'email')->get();
    }


}
