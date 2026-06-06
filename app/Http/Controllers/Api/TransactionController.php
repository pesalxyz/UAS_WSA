<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionStoreRequest;
use App\Http\Requests\TransactionUpdateRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TransactionController extends Controller
{
    /**
     * @group Transaksi
     *
     * Menampilkan daftar transaksi dengan pagination.
     *
     * @authenticated
     * @queryParam status string Filter by transaction status. Example: paid
     * @queryParam per_page integer Number of items per page. Example: 10
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $transactions = Transaction::query()
            ->with(['user', 'product.category'])
            ->when($request->filled('status'), function ($query) use ($request): void {
                $query->where('status', $request->string('status')->toString());
            })
            ->latest()
            ->paginate($request->integer('per_page', 10))
            ->withQueryString();

        return TransactionResource::collection($transactions);
    }

    /**
     * @group Transaksi
     *
     * Menyimpan transaksi baru.
     *
     * @authenticated
     * @bodyParam user_id integer required User id. Example: 1
     * @bodyParam product_id integer required Product id. Example: 1
     * @bodyParam quantity integer required Quantity purchased. Example: 2
     * @bodyParam status string Transaction status. Example: paid
     */
    public function store(TransactionStoreRequest $request): JsonResponse
    {
        $payload = $request->validated();
        $product = Product::query()->findOrFail($payload['product_id']);

        $payload['unit_price'] = $product->price;
        $payload['total_price'] = bcmul((string) $product->price, (string) $payload['quantity'], 2);

        $transaction = Transaction::create($payload)->load(['user', 'product.category']);

        return response()->json([
            'message' => 'Transaction created successfully.',
            'data' => new TransactionResource($transaction),
        ], 201);
    }

    /**
     * @group Transaksi
     *
     * Menampilkan detail transaksi.
     *
     * @authenticated
     */
    public function show(Transaction $transaction): JsonResponse
    {
        return response()->json([
            'data' => new TransactionResource($transaction->load(['user', 'product.category'])),
        ]);
    }

    /**
     * @group Transaksi
     *
     * Memperbarui status atau jumlah transaksi.
     *
     * @authenticated
     * @bodyParam quantity integer Quantity purchased. Example: 3
     * @bodyParam status string Transaction status. Example: paid
     */
    public function update(TransactionUpdateRequest $request, Transaction $transaction): JsonResponse
    {
        $payload = $request->validated();

        if (array_key_exists('product_id', $payload)) {
            $product = Product::query()->findOrFail($payload['product_id']);
            $payload['unit_price'] = $product->price;
        } else {
            $product = $transaction->product;
        }

        if (array_key_exists('quantity', $payload) || array_key_exists('product_id', $payload)) {
            $quantity = $payload['quantity'] ?? $transaction->quantity;
            $payload['total_price'] = bcmul((string) ($payload['unit_price'] ?? $transaction->unit_price), (string) $quantity, 2);
        }

        $transaction->update($payload);

        return response()->json([
            'message' => 'Transaction updated successfully.',
            'data' => new TransactionResource($transaction->fresh()->load(['user', 'product.category'])),
        ]);
    }

    /**
     * @group Transaksi
     *
     * Menghapus transaksi.
     *
     * @authenticated
     */
    public function destroy(Transaction $transaction): JsonResponse
    {
        $transaction->delete();

        return response()->json([
            'message' => 'Transaction deleted successfully.',
        ]);
    }
}
