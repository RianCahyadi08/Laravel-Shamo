<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;

class TransactionItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'products_id',
        'transactions_id',
        'quantity'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'users_id', 'id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'products_id', 'id');
    }

    public function transactions()
    {
        return $this->hasOne(Transaction::class, 'transactions_id', 'id');
    }

}
