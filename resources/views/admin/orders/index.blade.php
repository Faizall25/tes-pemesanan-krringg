@extends('layouts.app')

@section('title', 'Manage Orders')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Orders</h1>
            @if (Auth::user()->role === 'customer')
                <a href="{{ route('orders.create') }}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Create New Order
                </a>
            @endif
        </div>

        <!-- Search and Filter Form -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Search & Filter Orders</h6>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('orders.index') }}" id="filter-form">
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="search" class="font-weight-bold">Search by ID or Customer</label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control bg-light border-0 small" placeholder="Enter ID or customer name...">
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="status" class="font-weight-bold">Filter by Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="all" {{ request('status') === 'all' ? 'selected' : '' }}>All</option>
                                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-filter"></i> Apply
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="ordersTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Notes</th>
                                <th>Admin Notes</th>
                                @if (Auth::user()->role === 'admin')
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>${{ number_format($order->total_price, 2) }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>{{ $order->notes ?? '-' }}</td>
                                    <td>{{ $order->admin_notes ?? '-' }}</td>
                                    @if (Auth::user()->role === 'admin')
                                        <td>
                                            <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $orders->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#ordersTable').DataTable({
                "paging": false,
                "searching": false,
                "info": false
            });
        });
    </script>
@endsection