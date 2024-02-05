<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\StoreTransactionRequest;
use App\Http\Requests\Transaction\UpdateTransactionRequest;
use App\Http\Resources\Transaction\TransactionResource;
use App\Models\Transaction;
use App\Services\ImageService\ImageServiceProvider;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class TransactionController extends Controller
{
    public function index()
    {
        return TransactionResource::collection(Transaction::paginate(25));
    }

    /**
     * Display the specified resource.
     * @param  Transaction  $transaction
     * @return TransactionResource
     */
    public function show(Transaction $transaction)
    {
        return TransactionResource::make($transaction);
    }

    /**
     * Store a newly created resource in storage.
     * @param  StoreTransactionRequest  $request
     * @return TransactionResource
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(StoreTransactionRequest $request)
    {
        $transaction = Transaction::create([
            'amount' => $request->validated('amount'),
            'details' => $request->validated('details'),
            'factors_id' => $request->validated('factor_id')
        ]);
        ImageServiceProvider::storeImage($transaction, $request->file('image'));

        return TransactionResource::make($transaction);
    }

    /**
     * @param  UpdateTransactionRequest  $request
     * @param  Transaction  $transaction
     * @return TransactionResource
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());
        return TransactionResource::make($transaction);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Transaction  $transaction
     * @return Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->noContent();
    }
}
