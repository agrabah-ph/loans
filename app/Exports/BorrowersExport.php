<?php

namespace App\Exports;

use App\Loan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BorrowersExport implements FromCollection, WithMapping, WithHeadings
{
    protected $status;

    function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Loan::with('borrower')->get();
    }

    /**
     * @param mixed $borrower
     * @return array
     */
    public function map($data): array
    {
        return [
            $this->status,
            $data->borrower->profile->first_name,
            $data->borrower->profile->middle_name,
            $data->borrower->profile->last_name,
            $data->borrower->profile->dob,
            $data->borrower->profile->civil_status,
            $data->borrower->profile->gender,
            $data->borrower->profile->landline,
            $data->borrower->profile->mobile,
            $data->borrower->profile->tin,
            $data->borrower->profile->sss_gsis,
            $data->borrower->profile->education,
            $data->borrower->profile->secondary_info[0][2],
            $data->borrower->profile->secondary_info[1][2],
            $data->borrower->profile->secondary_info[2][2],
        ];
    }

    public function headings(): array
    {
        return [
            'Status',
            'First Name',
            'Middle Name',
            'Last Name',
            'Date of Birth',
            'Civil Status',
            'Gender',
            'Land line',
            'Mobile',
            'TIN ID#',
            'SSS/GSIS #',
            'Educational Attainment',
            'Current Address',
            'Years of Stay',
            'Address Status',
        ];
    }
}
