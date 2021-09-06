<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FarmersExport implements FromView, ShouldAutoSize
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
