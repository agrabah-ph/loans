<?php

namespace App\Exports;

use App\Loan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class BorrowersExportView implements FromView
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     */
    public function view() : View
    {
        return view('loan.loan-provider.report.export', [
            'data' => $this->data
        ]);
    }


}
