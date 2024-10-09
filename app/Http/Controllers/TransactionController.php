<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::included()->get();
        return response()->json($transaction);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function     store(Request $request)
    {

        $request -> validate([
            'monto' => 'required',
            'fecha' => 'required',
            'motivo' => 'required',
            'type_id' => 'required|exists:types,id'
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json($transaction);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::find($id);

        $request->validate([
         'monto' => 'required',
         'fecha' => 'required',
         'motivo' => 'required',
         'type_id' => 'required|exists:types,id'
        ]);

        $transaction->update($request->all());
        return response()->json($transaction);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return  response()->json(['message' => 'Transaction deleted']);
    }
}
