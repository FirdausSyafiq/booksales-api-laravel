<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Resource data not found',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data' => $transactions
        ], 200);
    }

    public function store (Request $request)
    {
        // Validator & check validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 422);
        }

        // Generate order number
        $uniqueCode = 'ORD-' . strtoupper(uniqid());

        // Ambil user yang sedang login & cek login (apakah ada data user?)
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        // Cek data buku dari request
        $book = Book::find($request->book_id);

        // Cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok barang tidak cukup!'
            ], 400);
        }

        // Hitung total harga = price * quantity
        $totalAmont = $book->price * $request->quantity;

        // Kurangi stok buku (update)
        $book->stock -= $request->quantity;
        $book->save();

        // Simpan data transaksi
        $transactions = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmont
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully',
            'data' => $transactions
        ], 201);
    }

    public function show($id)
    {
        $transaction = Transaction::with(['user', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Transaction retrieved successfully',
            'data' => $transaction
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
                'data' => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'book_id' => 'sometimes|exists:books,id',
            'quantity' => 'sometimes|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 422);
        }

        // Optional update book_id and recalculate
        if ($request->has('book_id') || $request->has('quantity')) {
            $book = Book::find($request->book_id ?? $transaction->book_id);
            $quantity = $request->quantity ?? 1;

            if ($book->stock < $quantity) {
                return response()->json([
                    'success' => false,
                    'message' => 'Insufficient stock'
                ], 400);
            }

            // Update book stock
            if ($request->has('quantity')) {
                // restore previous stock first
                $oldBook = Book::find($transaction->book_id);
                $oldBook->stock += $transaction->quantity ?? 1;
                $oldBook->save();

                // then deduct new book stock
                $book->stock -= $quantity;
                $book->save();
            }

            $transaction->book_id = $book->id;
            $transaction->total_amount = $book->price * $quantity;
        }

        $transaction->save();

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully',
            'data' => $transaction
        ], 200);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
                'data' => null
            ], 404);
        }

        // Restore stock before deleting
        $book = Book::find($transaction->book_id);
        if ($book) {
            $book->stock += $transaction->quantity ?? 1;
            $book->save();
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully'
        ], 200);
    }
}
