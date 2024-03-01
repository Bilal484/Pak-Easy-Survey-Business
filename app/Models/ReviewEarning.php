<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewEarning extends Model
{
    use HasFactory;

    protected $table = 'review_earnings';

    protected $fillable = [
        'user_id',
        'product_count',
        'earnings',
    ];
}
