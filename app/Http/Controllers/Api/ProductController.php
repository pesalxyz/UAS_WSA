<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * @group Produk
     *
     * Menampilkan daftar produk dengan pagination dan relasi kategori.
     *
     * @authenticated
     * @queryParam search string Search by product name or description. Example: laptop
     * @queryParam per_page integer Number of items per page. Example: 10
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $products = Product::query()
            ->with('category')
            ->when($request->filled('search'), function ($query) use ($request): void {
                $search = $request->string('search')->toString();

                $query->where(function ($builder) use ($search): void {
                    $builder
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate($request->integer('per_page', 10))
            ->withQueryString();

        return ProductResource::collection($products);
    }

    /**
     * @group Produk
     *
     * Menyimpan produk baru.
     *
     * @authenticated
     * @bodyParam category_id integer required Category id. Example: 1
     * @bodyParam name string required Product name. Example: Laptop Gaming
     * @bodyParam description string Product description. Example: Laptop untuk kebutuhan gaming dan editing.
     * @bodyParam price number required Product price. Example: 15000000
     * @bodyParam stock integer required Product stock. Example: 12
     * @bodyParam image file Product image file.
     */
    public function store(ProductStoreRequest $request): JsonResponse
    {
        $payload = $request->safe()->except('image');
        $payload['slug'] = Str::slug($request->string('name')).'-'.Str::lower(Str::random(6));

        if ($request->hasFile('image')) {
            $payload['image'] = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($payload)->load('category');

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => new ProductResource($product),
        ], 201);
    }

    /**
     * @group Produk
     *
     * Menampilkan detail produk beserta relasi kategori.
     *
     * @authenticated
     */
    public function show(Product $product): JsonResponse
    {
        return response()->json([
            'data' => new ProductResource($product->load('category')),
        ]);
    }

    /**
     * @group Produk
     *
     * Memperbarui produk.
     *
     * @authenticated
     * @bodyParam category_id integer Category id. Example: 2
     * @bodyParam name string Product name. Example: Keyboard Mechanical
     * @bodyParam description string Product description. Example: Keyboard mechanical dengan switch tactile.
     * @bodyParam price number Product price. Example: 750000
     * @bodyParam stock integer Product stock. Example: 20
     * @bodyParam image file New product image file.
     */
    public function update(ProductUpdateRequest $request, Product $product): JsonResponse
    {
        $payload = $request->safe()->except('image');

        if (array_key_exists('name', $payload)) {
            $payload['slug'] = Str::slug($payload['name']).'-'.Str::lower(Str::random(6));
        }

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $payload['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($payload);

        return response()->json([
            'message' => 'Product updated successfully.',
            'data' => new ProductResource($product->fresh()->load('category')),
        ]);
    }

    /**
     * @group Produk
     *
     * Menghapus produk beserta file gambarnya.
     *
     * @authenticated
     */
    public function destroy(Product $product): JsonResponse
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully.',
        ]);
    }
}
