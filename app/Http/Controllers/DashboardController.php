<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'total_orders' => Order::count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total_price'),
            'monthly_revenue' => Order::where('status', 'completed')
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('total_price'),
        ];

        // Recent Transactions (last 5 orders)
        $recent_orders = Order::with(['user', 'product'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Data for Monthly Sales Chart (last 12 months)
        $monthly_sales = Order::where('status', 'completed')
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy(DB::raw('MONTH(created_at), YEAR(created_at)'))
            ->selectRaw('SUM(total_price) as total, MONTH(created_at) as month, YEAR(created_at) as year')
            ->get()
            ->mapWithKeys(function ($item) {
                return [sprintf('%d-%02d', $item->year, $item->month) => $item->total];
            });

        // Prepare data for chart
        $months = [];
        $sales = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $key = $date->format('Y-m');
            $months[] = $date->format('M Y');
            $sales[] = $monthly_sales->get($key, 0);
        }

        // Data for Pie Chart (Order Status Distribution)
        $status_distribution = [
            'Pending' => $stats['pending'],
            'Processing' => $stats['processing'],
            'Completed' => $stats['completed'],
        ];

        return view('admin.dashboard', compact('stats', 'recent_orders', 'months', 'sales', 'status_distribution'));
    }
}
