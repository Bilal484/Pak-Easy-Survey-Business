<?php

namespace App\Http\Controllers;

use App\Models\UserStats;
use App\Models\ReviewEarning;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('review.index');
    }

    public function submitReview(Request $request)

    {

        $user = auth()->user();
        $userStats = UserStats::where('user_id', $user->id)->first();

        // Check if the user has reached the weekly members requirement for the current level
        if ($userStats->weekly_members >= $this->getWeeklyMembersRequirement($userStats->level)) {
            $userStats->level += 1;
            $userStats->weekly_members = 0; // Reset weekly members count
            $userStats->save();
        }

        // Check if the user is at level 1 and has not added a referral user within a week
        if ($userStats->level == 1 && $userStats->last_referral_added_at && $userStats->last_referral_added_at->diffInDays(now()) >= 7) {
            $userStats->earnings = 0; // Set earnings to zero
        }

        // Calculate earnings based on the user's current level and the number of products reviewed
        $earnings = $this->calculateEarnings($userStats->level, $request->product_count);

        // Update user's earnings
        $user->earnings += $earnings;
        $user->save();

        // Update user's referral status if needed
        // Your logic for updating referral status goes here


        $userStats->last_referral_added_at = now();
        $userStats->save();


        ReviewEarning::create([
            'user_id' => $user->id,
            'product_count' => $request->product_count,
            'earnings' => $earnings
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    private function calculateEarnings($level, $productCount)
    {
        switch ($level) {
            case 0:
                return $productCount * 30;
            case 1:
                return $productCount * 50;
            case 2:
                return $productCount * 70;
            case 3:
                return $productCount * 100;
            case 4:
                return $productCount * 150;
            case 5:
                return $productCount * 200;
            case 6:
                return $productCount * 260;
            case 7:
                return $productCount * 300;
            case 8:
                return $productCount * 400;
            case 9:
                return $productCount * 500;
            case 10:
                return $productCount * 600;
            case 11:
                return $productCount * 700;
            case 12:
                return $productCount * 1200;
            default:
                return 0;
        }
    }

    private function getWeeklyMembersRequirement($level)
    {
        switch ($level) {
            case 0:
            case 1:
            case 2:
                return 1;
            case 3:
            case 4:
            case 5:
            case 6:
                return 2;
            case 7:
            case 8:
            case 9:
                return 4;
            case 10:
                return 5;
            case 11:
                return 10;
            case 12:
                return 12;
            default:
                return 0;
        }
    }
}
