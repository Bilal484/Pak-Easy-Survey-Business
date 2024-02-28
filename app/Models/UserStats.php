<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStats extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'own_referral_code', 'referral_by', 'total_referrals',
        'team_size', 'earnings','level', 'referral_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referralByUser()
    {
        return $this->belongsTo(User::class, 'referral_by');
    }
}
