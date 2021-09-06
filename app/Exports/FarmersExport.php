<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FarmersExport implements FromView
{
    protected $datas;

    public function __construct($datas)
    {
        $this->datas = $datas;
    }

    public function view(): View
    {
        return view('loan.loan-provider.report.borrowers-data', [
            'data' => $this->datas
        ]);
    }
}
