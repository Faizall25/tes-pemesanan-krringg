<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     * - Admins see all orders with search and status filters (SB Admin 2 UI).
     * - Customers see only their orders (Tailwind CSS UI).
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status', 'all');

        // Base query: Admins see all orders, customers see only theirs
        $query = Auth::user()->role === 'admin'
            ? Order::query()
            : Order::where('user_id', Auth::id());

        // Apply search and status filters
        $orders = $query
            ->when($search, function ($query, $search) {
                $query->where('id', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->when($status !== 'all', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->with(['user', 'product'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Render appropriate view based on role
        $view = Auth::user()->role === 'admin' ? 'admin.orders.index' : 'orders.index';
        return view($view, compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     * - Accessible to customers (Tailwind CSS UI).
     * - Admins can also create orders (SB Admin 2 UI).
     */
    public function create()
    {
        $products = Product::all();
        $view = Auth::user()->role === 'admin' ? 'admin.orders.create' : 'orders.create';
        return view($view, compact('products'));
    }

    /**
     * Store a newly created order.
     * - Accessible to customers and admins.
     * - Validates product, quantity, and notes.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:1000',
        ]);

        $product = Product::findOrFail($data['product_id']);
        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
            'unit_price' => $product->unit_price,
            'total_price' => $product->unit_price * $data['quantity'],
            'status' => 'pending',
            'notes' => $data['notes'],
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Show the form for editing an order.
     * - Admin-only (SB Admin 2 UI).
     */
    public function edit(Order $order)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update an existing order.
     * - Admin-only: Updates status and admin notes.
     */
    public function update(Request $request, Order $order)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $data = $request->validate([
            'status' => 'required|in:pending,processing,completed',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $order->update($data);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }
}
