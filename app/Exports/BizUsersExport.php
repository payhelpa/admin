<?php

namespace App\Exports;

use App\Models\IndividualDetail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class BizUsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $users = DB::table('users')
        ->join('business_details', 'users.id', '=', 'business_details.user_id')
        ->select('users.name', 'users.email', 'business_details.phone_number')
        ->get();
    }
}
