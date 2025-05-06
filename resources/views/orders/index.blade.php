@extends('orders.customer')

@section('title', 'My Orders')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Heading and Filter -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">My Orders</h1>
            <div class="flex space-x-4 mt-4 sm:mt-0">
                <select id="status-filter" class="border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="all">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                </select>
                <a href="{{ route('orders.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition transform hover:-translate-y-1">
                    <i class="fas fa-plus mr-1"></i> Create New Order
                </a>
            </div>
        </div>

        <!-- Orders Grid -->
        <div id="orders-grid" class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($orders as $order)
                <div class="bg-white shadow-lg rounded-lg p-6 animate-fade-in opacity-0 translate-y-4 transition-all duration-300 hover:shadow-xl order-card" data-status="{{ $order->status }}">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Order #{{ $order->id }}</h3>
                        <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full
                            {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Product:</strong> {{ $order->product->name }}</p>
                    <p class="text-gray-600 mb-2"><strong>Quantity:</strong> {{ $order->quantity }}</p>
                    <p class="text-gray-600 mb-2"><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
                    <p class="text-gray-600"><strong>Notes:</strong> {{ $order->notes ?? '-' }}</p>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-8">
                    No orders found. <a href="{{ route('orders.create') }}" class="text-indigo-600 hover:underline">Create one now!</a>
                </div>
            @endforelse
        </div>

        {{-- <!-- Pagination -->
        <div class="mt-8">
            {{ $orders->links('vendor.pagination.tailwind') }}
        </div> --}}
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Status filter
            $('#status-filter').on('change', function() {
                const status = $(this).val();
                $('.order-card').each(function() {
                    const cardStatus = $(this).data('status');
                    if (status === 'all' || cardStatus === status) {
                        $(this).fadeIn(300);
                    } else {
                        $(this).fadeOut(300);
                    }
                });
            });

            // Smooth scroll for pagination links
            $('a.page-link').on('click', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');
                window.location.href = url;
                $('html, body').animate({ scrollTop: 0 }, 300);
            });
        });
    </script>
@endsection