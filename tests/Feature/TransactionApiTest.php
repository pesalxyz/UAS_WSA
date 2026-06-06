<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_list_transactions_with_relations(): void
    {
        $this->seed();

        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->getJson('/api/transactions?per_page=5');

        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'user',
                        'product' => ['id', 'category'],
                    ],
                ],
                'links',
                'meta',
            ]);
    }

    public function test_authenticated_user_can_create_update_and_delete_transaction(): void
    {
        $buyer = User::factory()->create();
        $operator = User::factory()->create();
        $product = Product::factory()->create(['price' => 125000]);

        $createResponse = $this->actingAs($operator, 'sanctum')
            ->postJson('/api/transactions', [
                'user_id' => $buyer->id,
                'product_id' => $product->id,
                'quantity' => 2,
                'status' => 'pending',
            ]);

        $transactionId = $createResponse->json('data.id');

        $createResponse
            ->assertCreated()
            ->assertJsonPath('data.total_price', '250000.00')
            ->assertJsonPath('data.product.id', $product->id);

        $this->actingAs($operator, 'sanctum')
            ->putJson("/api/transactions/{$transactionId}", [
                'quantity' => 3,
                'status' => 'paid',
            ])
            ->assertOk()
            ->assertJsonPath('data.total_price', '375000.00')
            ->assertJsonPath('data.status', 'paid');

        $this->actingAs($operator, 'sanctum')
            ->deleteJson("/api/transactions/{$transactionId}")
            ->assertOk();

        $this->assertDatabaseMissing('transactions', ['id' => $transactionId]);
    }
}
