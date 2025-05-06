@extends('orders.customer')

@section('title', 'Create Order')

@section('content')
    <div class="max-w-lg mx-auto">
        <!-- Heading -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Create New Order</h1>

        <!-- Form -->
        <div class="bg-white shadow-lg rounded-lg p-6 animate-fade-in opacity-0 translate-y-4 transition-all duration-300">
            <form method="POST" action="{{ route('orders.store') }}" id="order-form">
                @csrf
                <div class="mb-4">
                    <label for="product_id" class="block text-sm font-medium text-gray-700 mb-1">Product</label>
                    <select name="product_id" id="product_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('product_id') border-red-500 @enderror" required>
                        <option value="" disabled selected>Select a product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->unit_price }}">{{ $product->name }} (${{ number_format($product->unit_price, 2) }})</option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                    <input type="number" name="quantity" id="quantity" min="1" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('quantity') border-red-500 @enderror" value="{{ old('quantity', 1) }}" required>
                    @error('quantity')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="total_price" class="block text-sm font-medium text-gray-700 mb-1">Total Price</label>
                    <input type="text" id="total_price" class="w-full border-gray-300 rounded-lg shadow-sm bg-gray-100" readonly value="$0.00">
                </div>
                <div class="mb-4">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes (Optional)</label>
                    <textarea name="notes" id="notes" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('notes') border-red-500 @enderror">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex space-x-4">
                    <button type="submit" class="flex-1 bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition transform hover:-translate-y-1">
                        <i class="fas fa-save mr-1"></i> Submit Order
                    </button>
                    <a href="{{ route('orders.index') }}" class="flex-1 bg-gray-600 text-white py-2 rounded-lg hover:bg-gray-700 transition transform hover:-translate-y-1 text-center">
                        <i class="fas fa-arrow-left mr-1"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Real-time total price calculation
            function updateTotalPrice() {
                const productId = $('#product_id').val();
                const quantity = parseInt($('#quantity').val()) || 0;
                const price = $('#product_id option:selected').data('price') || 0;
                const total = (price * quantity).toFixed(2);
                $('#total_price').val(`$${total}`);
            }

            $('#product_id, #quantity').on('change input', updateTotalPrice);

            // Initial calculation
            updateTotalPrice();

            // Form validation feedback
            $('#order-form').on('submit', function(e) {
                let isValid = true;
                if (!$('#product_id').val()) {
                    $('#product_id').addClass('border-red-500');
                    isValid = false;
                } else {
                    $('#product_id').removeClass('border-red-500');
                }
                if ($('#quantity').val() < 1) {
                    $('#quantity').addClass('border-red-500');
                    isValid = false;
                } else {
                    $('#quantity').removeClass('border-red-500');
                }
                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields correctly.');
                }
            });
        });
    </script>
@endsection