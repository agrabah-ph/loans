<?php

namespace App\Exports;

use App\Loan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class BorrowersExport implements FromCollection, WithMapping, WithHeadings, WithDrawings
{
    protected $status;

    public function __construct($status, $headings = [])
    {
        $this->status = $status;
        $this->headings = $headings;
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
        $info = array();
        array_push($info, $this->status);
        array_push($info, $data->borrower->profile->first_name);
        array_push($info, $data->borrower->profile->middle_name);
        array_push($info, $data->borrower->profile->last_name);
        array_push($info, $data->borrower->profile->dob);
        array_push($info, $data->borrower->profile->civil_status);
        array_push($info, $data->borrower->profile->gender);
        array_push($info, $data->borrower->profile->landline);
        array_push($info, $data->borrower->profile->mobile);
        array_push($info, $data->borrower->profile->tin);
        array_push($info, $data->borrower->profile->sss_gsis);
        array_push($info, $data->borrower->profile->education);

        foreach($data->borrower->profile->secondary_info as $sInfo){
            array_push($this->headings, $sInfo[1]);
            array_push($info, $sInfo[2]);
        }

        return $info;
    }

    public function headings(): array
    {
        $info = array();
        array_push($info, 'Status');
        array_push($info, 'First Name');
        array_push($info, 'Middle Name');
        array_push($info, 'Last Name');
        array_push($info, 'Date of Birth');
        array_push($info, 'Civil Status');
        array_push($info, 'Gender');
        array_push($info, 'Land line');
        array_push($info, 'Mobile');
        array_push($info, 'TIN ID#');
        array_push($info, 'SSS/GSIS #');
        array_push($info, 'Educational Attainment');
        array_push($info, $this->headings);
//        array_push($info, 'Current Address');
//        array_push($info, 'Years of Stay');
//        array_push($info, 'Address Status');
//        array_push($info, 'Dependents');


        return $info;
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/profile_small.jpg'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B3');

        return $drawing;
    }

}
