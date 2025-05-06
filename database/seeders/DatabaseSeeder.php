<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 1 Admin
        User::factory()->create([
            'name' => 'Admin Kriingg',
            'email' => 'admin@kriingg.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create 2 Customers
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@kriingg.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
        ]);

        User::factory()->create([
            'name' => 'Jane Smith',
            'email' => 'jane@kriingg.com',
            'password' => bcrypt('password'),
            'role' => 'customer',
        ]);

        // Create 3 Products
        Product::factory()->create([
            'name' => 'Smartphone',
            'unit_price' => 99.99,
        ]);

        Product::factory()->create([
            'name' => 'Laptop',
            'unit_price' => 499.99,
        ]);

        Product::factory()->create([
            'name' => 'Headphones',
            'unit_price' => 29.99,
        ]);

        // Create 3 Orders
        Order::factory()->create([
            'user_id' => User::where('email', 'john@kriingg.com')->first()->id,
            'product_id' => Product::where('name', 'Smartphone')->first()->id,
            'quantity' => 2,
            'unit_price' => 99.99,
            'total_price' => 99.99 * 2,
            'status' => 'pending',
            'notes' => 'Please deliver before weekend.',
            'admin_notes' => null,
        ]);

        Order::factory()->create([
            'user_id' => User::where('email', 'jane@kriingg.com')->first()->id,
            'product_id' => Product::where('name', 'Laptop')->first()->id,
            'quantity' => 1,
            'unit_price' => 499.99,
            'total_price' => 499.99,
            'status' => 'processing',
            'notes' => null,
            'admin_notes' => 'Awaiting stock confirmation.',
        ]);

        Order::factory()->create([
            'user_id' => User::where('email', 'john@kriingg.com')->first()->id,
            'product_id' => Product::where('name', 'Headphones')->first()->id,
            'quantity' => 3,
            'unit_price' => 29.99,
            'total_price' => 29.99 * 3,
            'status' => 'completed',
            'notes' => 'Gift wrap requested.',
            'admin_notes' => 'Delivered on time.',
        ]);
    }
}
