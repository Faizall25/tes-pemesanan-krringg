<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return Order::with(['user', 'product'])
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->get()
            ->map(function ($order) {
                return [
                    'Order ID' => $order->id,
                    'Customer' => $order->user->name,
                    'Product' => $order->product->name,
                    'Quantity' => $order->quantity,
                    'Total Price' => $order->total_price,
                    'Status' => $order->status,
                    'Notes' => $order->notes,
                    'Admin Notes' => $order->admin_notes,
                    'Created At' => $order->created_at,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Order ID',
            'Customer',
            'Product',
            'Quantity',
            'Total Price',
            'Status',
            'Notes',
            'Admin Notes',
            'Created At',
        ];
    }
}
