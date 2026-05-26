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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'nullable|max:255',
            'memo' => 'nullable|max:1000',
        ]);

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

        return view('customers.show', compact(
            'customer',
            'sales',
            'total'
        ));
    }
}