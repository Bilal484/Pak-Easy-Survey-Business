<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserStats;
use Illuminate\Http\Request;

class UserStatsController extends Controller
{
    public function index()
    {
        // Implement logic to fetch and return all user stats
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
        // Implement logic to show a specific user's stats
        return view('user-stats.show', ['userStats' => $userStats]);
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
        // Implement logic to update user stats
        $userStats->update($request->all());
        return redirect()->route('user-stats.index');
    }

    public function destroy(UserStats $userStats)
    {
        // Implement logic to delete user stats
        $userStats->delete();
        return redirect()->route('user-stats.index');
    }


    public function updateEarnings(User $user)
    {
        // Update earnings for the user and their parent user
        $userStats = $user->stats;

        // Check if the user has not referred a new user within the last 7 days
        if ($userStats && Carbon::now()->diffInDays($user->created_at) <= 7) {
            $userStats->increment('earnings', 150); // Give 150 rupees to the user
            $referringUser = User::find($userStats->referral_by);
            if ($referringUser) {
                $referringUser->stats()->increment('earnings', 100); // Give 100 rupees to the parent user

                // Get the second parent user
                $referringUserParent = User::find($referringUser->referral_by);
                if ($referringUserParent) {
                    $referringUserParent->stats()->increment('earnings', 50); // Give 50 rupees to the second parent user
                }
            }
        } else {
            // If user has not referred a new user within 7 days, set earnings to zero
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

        return redirect()->route('user-stats.index');
    }

    public function resetEarnings(User $user)
    {
        // Reset earnings for the user
        $userStats = $user->stats;
        if ($userStats) {
            $userStats->update(['earnings' => 0]);
        }
        return redirect()->route('user-stats.index');
    }
}
