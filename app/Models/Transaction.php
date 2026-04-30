<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 
        'borrow_date', 
        'return_date',
        'actual_return_date', 
        'status', 
        'created_at', 
        'updated_at'
    ];
    //Relasi transasi milik
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //relasi
    public function details(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function transactionDetails()
{
    return $this->hasMany(TransactionDetail::class);
}
}