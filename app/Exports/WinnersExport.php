<?php

namespace App\Exports;

use App\Winner;
use Maatwebsite\Excel\Concerns\FromCollection;

class WinnersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Winner::all();
    }
}
