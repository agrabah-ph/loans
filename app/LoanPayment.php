<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class LoanPayment extends Model
{
    protected $appends = [
        'loan_detail'
    ];


    public function toArray()
    {
        $array = parent::toArray();
        $array['paid_date_formatted'] = Carbon::parse($this->due_date)->toFormattedDateString();
        $array['payment_method'] = ucfirst($this->payment_method);
        return $array;
    }

    public function getLoanDetailAttribute()
    {
        $data = Loan::select('id', 'loan_product_id')->with('product')->find($this->attributes['loan_id']);
        return $data;
    }
}
