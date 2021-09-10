<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_datetime',
        'user_id',
        'user_category_id',
        'transaction_type',
        'summary',
        'source_user_fund_id',
        'destination_user_fund_id',
        'amount',
        'cashback',
        'transfer_fee',
        'notes',
    ];
}
