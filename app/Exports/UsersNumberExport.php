<?php

namespace App\Exports;

use App\Models\IndividualDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersNumberExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IndividualDetail::select('phone_number')->whereNotNull('phone_number_verified_at')->get();
    }
}
