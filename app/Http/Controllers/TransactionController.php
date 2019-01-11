<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionHead;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$transaction_type)
    {
        if($transaction_type=='Income' || $transaction_type== 'Expense') {
            $data['title'] = 'Transactions';
            $data['heading'] = $transaction_type.' '.'Details';
            $transactions = new Transaction();
            $transactions = $transactions->with('relTransactionHead','relUser');
            $transactions = $transactions->where('type', $transaction_type);
            $render = [];
            if (isset($request->transaction_id)) {
                $transactions = $transactions->where('transaction_id', 'like', '%' . $request->transaction_id . '%');
                $render['transaction_id'] = $request->transaction_id;
            }
            if (isset($request->client_name)) {
                $transactions = $transactions->where('client', 'like', '%' . $request->client_name . '%');
                $render['client_name'] = $request->client_name;
            }
            if (isset($request->transaction_head_id)) {
                $transactions = $transactions->where('transaction_head_id', $request->transaction_head_id);
                $render['transaction_head_id'] = $request->transaction_head_id;
            }
            $transactions = $transactions->orderBy('id', 'DESC');
            $transactions = $transactions->paginate(2);
            $transactions = $transactions->appends($render);
            $data['transactions'] = $transactions;
            $data['serial'] = $this->managePagination($transactions);
            $data['transaction_heads'] = TransactionHead::where('type', $transaction_type)->where('status', 'Active')->pluck('name', 'id');
            $data['transaction_type'] = $transaction_type;
            return view('admin.transaction.index', $data);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($transaction_type)
    {
        if($transaction_type=='Income' || $transaction_type== 'Expense') {
            $data['title'] = 'Add new ' . $transaction_type;
            $data['transaction_heads'] = TransactionHead::where('type', $transaction_type)->where('status', 'Active')->pluck('name', 'id');
            $data['transaction_type'] = $transaction_type;
            return view('admin.transaction.create', $data);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$transaction_type)
    {
        if($transaction_type=='Income' || $transaction_type== 'Expense') {
            $request->validate([
                'transaction_head_id' => 'required',
                'client_name' => 'required',
                'description' => 'required',
                'date' => 'required',
                'amount' => 'required'
            ]);
            $transaction = new Transaction();
            if ($transaction_type == 'Income') {
                $transaction->transaction_id = 'IN' . time();
            } elseif ($transaction_type == 'Expense') {
                $transaction->transaction_id = 'EX' . time();
            }
            $transaction->transaction_head_id = $request->transaction_head_id;
            $transaction->client = $request->client_name;
            $transaction->type = $transaction_type;
            $transaction->description = $request->description;
            $transaction->date = $request->date;
            $transaction->amount = $request->amount;
            $transaction->save();
            session()->flash('success', $transaction_type . ' Added Successfully');
            return redirect()->route('transaction.index', $transaction_type);
        }else{
            return redirect()->back();
        }
    }


    function managePagination($obj)
    {
        $serial=1;
        if($obj->currentPage()>1)
        {
            $serial=(($obj->currentPage()-1)*$obj->perPage())+1;
        }
        return $serial;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
