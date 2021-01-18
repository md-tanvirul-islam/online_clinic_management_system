<?php

namespace App\Exports;

use App\Models\BillForTest;
use Maatwebsite\Excel\Concerns\FromCollection;

class BillForTestExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BillForTest::all();
    }
}
