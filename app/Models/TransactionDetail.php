<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transaction_id',
        'book_id',
        'qty'
    ];

    //relasi balik ke header transaction
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    //relasi ke data buku
    public function book(): BelongsTo
    {
        return $this->belongsTo(book::class);
    }
}
