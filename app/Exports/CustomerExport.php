<?php

namespace App\Exports;

use App\Models\InvoiceCustomer;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return InvoiceCustomer::all();
    }
}
