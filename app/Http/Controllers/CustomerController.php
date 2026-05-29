<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sale;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        $customers = $customers->map(function ($customer) {

            $total = Sale::where('customer_id', $customer->id)
                ->sum(\DB::raw('quantity * unit_price'));

            $customer->total = $total;

            return $customer;
        });

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate(
        [
            'name' => 'required|max:255',
            'phone' => 'nullable|max:255',
            'memo' => 'nullable|max:1000',
        ],
        [],
        [
            'name' => '顧客名',
            'phone' => '電話番号',
            'memo' => 'メモ',
        ]
    );

    Customer::create($validated);

    return redirect()
        ->route('customers.index')
        ->with('success', '顧客を登録しました');
}
    public function show(Customer $customer)
    {
        $sales = Sale::with('product')
            ->where('customer_id', $customer->id)
            ->latest()
            ->get();

        $total = $sales->sum(function ($sale) {
            return $sale->quantity * $sale->unit_price;
        });

        $purchaseCount = $sales->count();

        return view('customers.show', compact(
            'customer',
            'sales',
            'total',
            'purchaseCount',
        ));
    }
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'phone' => 'nullable|max:255',
                'memo' => 'nullable|max:1000',
            ],
            [],
            [
                'name' => '顧客名',
                'phone' => '電話番号',
                'memo' => 'メモ',
            ]
        );

        $customer->update($validated);

        return redirect()
            ->route('customers.show', $customer->id)
            ->with('success', '顧客情報を更新しました');
    }
}