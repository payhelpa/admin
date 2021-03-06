<?php

namespace App\Exports;

use App\Models\User;
use App\Models\IndividualDetail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $users = DB::table('users')
        ->join('individual_details', 'users.id', '=', 'individual_details.user_id')
        ->select('users.name', 'users.email', 'individual_details.phone_number')
        ->get();
        
    }


}
