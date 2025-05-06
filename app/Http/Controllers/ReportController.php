<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $orders = collect();
        if ($request->has(['start_date', 'end_date'])) {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);
            $orders = Order::with(['user', 'product'])
                ->whereBetween('created_at', [$request->start_date, $request->end_date])
                ->get();
        }
        return view('admin.reports.index', compact('orders'));
    }

    public function export(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        return Excel::download(
            new OrdersExport($request->start_date, $request->end_date),
            'orders_' . $request->start_date . '_to_' . $request->end_date . '.xlsx'
        );
    }
}
