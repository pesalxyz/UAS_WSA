<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_get_paginated_products_with_search_and_category(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create(['name' => 'Elektronik', 'slug' => 'elektronik']);

        Product::factory()->create([
            'category_id' => $category->id,
            'name' => 'Laptop Pro',
            'slug' => 'laptop-pro-123',
        ]);

        Product::factory()->create([
            'category_id' => $category->id,
            'name' => 'Meja Belajar',
            'slug' => 'meja-belajar-123',
        ]);

        $response = $this->actingAs($user, 'sanctum')
            ->getJson('/api/products?search=Laptop&per_page=5');

        $response
            ->assertOk()
            ->assertJsonPath('data.0.name', 'Laptop Pro')
            ->assertJsonPath('data.0.category.name', 'Elektronik')
            ->assertJsonStructure([
                'data',
                'links',
                'meta',
            ]);
    }

    public function test_authenticated_user_can_create_update_and_delete_product_with_image(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $category = Category::factory()->create();

        $createResponse = $this->actingAs($user, 'sanctum')
            ->post('/api/products', [
                'category_id' => $category->id,
                'name' => 'Mouse Wireless',
                'description' => 'Mouse nyaman dipakai.',
                'price' => 250000,
                'stock' => 8,
                'image' => UploadedFile::fake()->image('mouse.png'),
            ], ['Accept' => 'application/json']);

        $productId = $createResponse->json('data.id');
        $imagePath = $createResponse->json('data.image');

        $createResponse
            ->assertCreated()
            ->assertJsonPath('data.category.id', $category->id);

        Storage::disk('public')->assertExists($imagePath);

        $updateResponse = $this->actingAs($user, 'sanctum')
            ->post("/api/products/{$productId}", [
                'name' => 'Mouse Wireless Pro',
                'price' => 300000,
                'stock' => 10,
                'image' => UploadedFile::fake()->image('mouse-new.png'),
                '_method' => 'PUT',
            ], ['Accept' => 'application/json']);

        $newImagePath = $updateResponse->json('data.image');

        $updateResponse
            ->assertOk()
            ->assertJsonPath('data.name', 'Mouse Wireless Pro');

        Storage::disk('public')->assertMissing($imagePath);
        Storage::disk('public')->assertExists($newImagePath);

        $this->actingAs($user, 'sanctum')
            ->deleteJson("/api/products/{$productId}")
            ->assertOk();

        Storage::disk('public')->assertMissing($newImagePath);
        $this->assertDatabaseMissing('products', ['id' => $productId]);
    }
}
