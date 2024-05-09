<?php

namespace App\Http\Controllers;

use App\Http\Requests\FactorCreateRequest;
use App\Http\Resources\Factor\FactorResource;
use App\Models\Factor;
use App\Models\User;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    public function index()
    {
        return FactorResource::make(auth()->user()->factors)->paginate();
    }

    public function show(Factor $factor)
    {
        return FactorResource::make($factor);
    }

    public function create(FactorCreateRequest $request, User $user)
    {
        $factor = $user->factors()->create([
            'amount_paid' => $request->amount_paid,
            'total_amount' => $request->amount_paid,
            'du_date' => $request->du_date
        ]);
        if (isset($request->amount_paid))
            $factor = TransactionController::createFromFactor('test', $request->amount_paid, $factor);
        return response()->json(FactorResource::make($factor));
    }

    public function update(Factor $factor)
    {

    }

    public function delete(Factor $factor)
    {
        $factor->delete();
        return response()->noContent();
    }
}
