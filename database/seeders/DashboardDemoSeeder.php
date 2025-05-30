<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class DashboardDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a demo user
        $user = User::factory()->create([
            'name' => 'Demo Customer',
            'email' => 'customer@example.com',
        ]);

        // Create 10 products
        $products = Product::factory()->count(10)->create();

        // Create orders and order items for each product
        foreach ($products as $index => $product) {
            $order = Order::factory()->create([
                'user_id' => $user->id,
                'total' => $product->price * ($index + 1),
            ]);
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $index + 1, // 1, 2, ..., 10
                'price' => $product->price,
            ]);
        }
    }
}
