<?php

namespace App\Http\Controllers;

use App\Loan;
use App\LoanProduct;
use App\LoanType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoanProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = LoanProduct::where('loan_provider_id', auth()->user()->loan_provider->id)
            ->where('active', 1)
            ->get();

        return view('loan.product.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = LoanType::pluck('display_name','id');

        return view('loan.product.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request);
        $loanProviderId = auth()->user()->loan_provider->id;
        $request->request->add(['service_fee' => loanServiceFee()]);
        $array = $request->all();


        if ($file = $request->file('attachment')) {
//            $destinationPath = '/public/loan-product/attachments/';
//            $pdf = $file->getClientOriginalName();
//            Storage::put($destinationPath, $pdf.'.pdf');
//            Storage::putFileAs('avatars', $request->file('avatar'), $request->user()->id);
//            $array['attachment'] = public_path('storage/'.$destinationPath.''.$pdf);

            $destinationPath = '/loan-product/attachments/';
            $fileName = stringSlug($request->input('name').' attachment').'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/'.$destinationPath, $file, $fileName);
            $array['attachment'] = '/storage'.$destinationPath.''.$fileName;
        }


        $array['loan_provider_id'] = $loanProviderId;
        $array['loan_type_id'] = $array['type'];
        $array['amount'] = floatval(preg_replace('/,/','', $array['amount']));
        unset($array['token']);
        unset($array['type']);
        LoanProduct::create($array);


        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loanProduct = LoanProduct::find($id);
        $types = LoanType::pluck('display_name','id');
        return response()->view('loan.product.edit', compact( 'loanProduct', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanProduct $loan)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loanProduct = LoanProduct::find($id);
        $request->request->add(['service_fee' => loanServiceFee()]);
        $array = $request->all();
        $array['loan_type_id'] = $array['type'];
        $array['amount'] = floatval(preg_replace('/,/','', $array['amount']));
        unset($array['token']);
        unset($array['type']);
        $loanProduct->update($array);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loanProduct = LoanProduct::find($id);
        $loanProduct->active = 0;
        $loanProduct->save();

//        Loan::where('loan_product_id', $id)->delete();
        return redirect()->route('products.index')->with('success','Successfully Deleted!');
    }
}
