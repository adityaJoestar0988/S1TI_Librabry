<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data transaksi milik user yang sedang login
        $transactions = \App\Models\Transaction::with('transactionDetails.book')
                        ->where('user_id', Auth::id())
                        ->latest()
                        ->get();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengambil semua buku untuk dipilih di form
        $books = Book ::all();
        return view('transactions.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // 1. Validasi input
        $request->validate([
            'return_date' => 'required|date|after:today',
            'book_ids'    => 'required|array', 
            // PERBAIKAN TYPO: 'book_ids.*' (pake titik) dan 'exists' (pake s, bukan ;)
            'book_ids.*'  => 'exists:books,id', 
        ]);

        // Proses simpan db
        DB::beginTransaction();
        try {
            // A. Simpan ke tabel transactions (Header)
            $transaction = Transaction::create([
                'user_id'     => Auth::id(), 
                'borrow_date' => now(),
                'return_date' => $request->return_date,
                'status'      => 'borrowed',
            ]);

            // B. Simpan ke tabel transaction_details (Banyak Buku)
            foreach ($request->book_ids as $book_id) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'book_id'        => $book_id,
                    'qty'            => 1, 
                ]);
            }

            // Simpan permanen
            DB::commit();

            // C. Redirect ke halaman riwayat (index)
            return redirect()->route('transactions.index')->with('success', 'Peminjaman berhasil dicatat!');
            
        } catch (\Exception $e) {
            // Batalkan jika gagal
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
