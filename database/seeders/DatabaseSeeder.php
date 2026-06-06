<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin UAS',
            'email' => 'admin@example.com',
            'password' => 'password',
            'is_admin' => true,
        ]);

        $customers = User::factory(4)->create();

        $categories = Category::factory(5)->create();

        Product::factory(30)->make()->each(function (Product $product) use ($categories): void {
            $product->category_id = $categories->random()->id;
            $product->save();
        });

        $users = $customers->prepend($admin);
        $products = Product::all();

        Transaction::factory(12)->make()->each(function (Transaction $transaction) use ($users, $products): void {
            $user = $users->random();
            $product = $products->random();
            $quantity = fake()->numberBetween(1, 3);

            $transaction->user_id = $user->id;
            $transaction->product_id = $product->id;
            $transaction->quantity = $quantity;
            $transaction->unit_price = $product->price;
            $transaction->total_price = bcmul((string) $product->price, (string) $quantity, 2);
            $transaction->save();
        });
    }
}
