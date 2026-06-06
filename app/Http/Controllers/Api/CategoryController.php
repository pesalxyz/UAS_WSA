<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * @group Kategori
     *
     * Menampilkan daftar kategori dengan pagination.
     *
     * @authenticated
     * @queryParam per_page integer Number of items per page. Example: 10
     */
    public function index(Request $request): JsonResponse
    {
        $categories = Category::query()
            ->latest()
            ->paginate($request->integer('per_page', 10));

        return response()->json($categories);
    }

    /**
     * @group Kategori
     *
     * Menyimpan kategori baru.
     *
     * @authenticated
     * @bodyParam name string required Category name. Example: Elektronik
     * @bodyParam description string Category description. Example: Kumpulan produk elektronik.
     */
    public function store(CategoryStoreRequest $request): JsonResponse
    {
        $category = Category::create([
            ...$request->validated(),
            'slug' => Str::slug($request->string('name')),
        ]);

        return response()->json([
            'message' => 'Category created successfully.',
            'data' => $category,
        ], 201);
    }

    /**
     * @group Kategori
     *
     * Memperbarui kategori.
     *
     * @authenticated
     * @bodyParam name string Category name. Example: Aksesoris
     * @bodyParam description string Category description. Example: Produk pelengkap gadget.
     */
    public function update(CategoryUpdateRequest $request, Category $category): JsonResponse
    {
        $payload = $request->validated();

        if (array_key_exists('name', $payload)) {
            $payload['slug'] = Str::slug($payload['name']);
        }

        $category->update($payload);

        return response()->json([
            'message' => 'Category updated successfully.',
            'data' => $category->fresh(),
        ]);
    }

    /**
     * @group Kategori
     *
     * Menghapus kategori.
     *
     * @authenticated
     */
    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully.',
        ]);
    }
}
