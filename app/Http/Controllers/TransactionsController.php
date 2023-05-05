<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Transaction;
use App\Http\Requests\StoreTransactionsRequest;
use App\Http\Requests\UpdateTransactionsRequest;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('transaction.index', [
            'transaction' => Transaction::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->get(),
            'categories' => Category::where('user_id', auth()->id())->get(),
        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|mixed
     */
    public function create()
    {
        $categories = Category::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->get();
        return view('transaction.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionsRequest  $request
     * @return \Illuminate\Http\Response|mixed
     */
    public function store(StoreTransactionsRequest $request)
    {
        $transaction = new Transaction();
        $transaction->amount = $request->amount;
        $transaction->description = $request->description;
        $transaction->user_id = auth()->user()->id;
        $transaction->category_id = $request->category;
        $transaction->save();
        return redirect(route('transaction.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response|mixed
     */
    public function edit($transaction)
    {
        return view('transaction.edit', [
            'transaction' => Transaction::where('id', $transaction)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionsRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response|mixed
     */
    public function update(UpdateTransactionsRequest $request, Transaction $transaction)
    {
        $transaction->amount = $request->amount;
        $transaction->description = $request->description;
        $transaction->save();
        return redirect(route('transaction.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response|mixed
     */
    public function destroy($transaction)
    {
        Transaction::destroy($transaction);
        return redirect(route('transaction.index'))->with('message','Transaction deleted!');
    }
}
