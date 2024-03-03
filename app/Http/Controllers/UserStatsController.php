<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserStatsController extends Controller
{
    public function index()
    {

        $userStats = UserStats::all();
        return view('user-stats.index', ['userStats' => $userStats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(UserStats $userStats)
    {

        $reviewEarnings = $userStats->user->reviews()->count() * 10;


        $totalEarnings = $userStats->earnings + $reviewEarnings;

        return view('user-stats.show', ['userStats' => $userStats, 'totalEarnings' => $totalEarnings]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, UserStats $userStats)
    {

        $userStats->update($request->all());
        return redirect()->route('user-stats.index');
    }

    public function destroy(UserStats $userStats)
    {

        $userStats->delete();
        return redirect()->route('user-stats.index');
    }


    public function updateEarnings(User $user)
    {

        $userStats = $user->stats;


        if ($userStats && Carbon::now()->diffInDays($user->created_at) <= 7) {
            $userStats->increment('earnings', 150);
            $referringUser = User::find($userStats->referral_by);
            if ($referringUser) {
                $referringUser->stats()->increment('earnings', 100);


                $referringUserParent = User::find($referringUser->referral_by);
                if ($referringUserParent) {
                    $referringUserParent->stats()->increment('earnings', 50);
                }
            }
        } else {

            if ($userStats) {
                $userStats->update(['earnings' => 0]);
            } else {
                UserStats::create([
                    'user_id' => $user->id,
                    'own_referral_code' => $user->own_referral_code,
                    'earnings' => 0,
                ]);
            }
        }


        $reviewsEarnings = $user->reviews()->count() * 10;
        $userStats->increment('earnings', $reviewsEarnings);

        return redirect()->route('user-stats.index');
    }



    public function resetEarnings(User $user)
    {

        $userStats = $user->stats;
        if ($userStats) {
            $userStats->update(['earnings' => 0]);
        }
        return redirect()->route('user-stats.index');
    }



    // Referral user

  

    public function referralUsers()
    {
        // Get the referral code of the logged-in user
        $referralCode = Auth::user()->referral_code;

        // Get all users
        $allUsers = User::all();

        // Filter users who registered with the user's referral code
        $referralUsers = $allUsers->filter(function ($user) use ($referralCode) {
            return $user->referral_code === $referralCode;
        });

        return view('user-stats.referral-users', compact('referralUsers', 'allUsers'));
    }

}
