<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserStats;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'referral_code' => ['nullable', 'exists:' . User::class . ',own_referral_code'],
        ]);

        $referralCode = Str::random(8);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'own_referral_code' => $referralCode,
            'referral_code' => $request->referral_code,

        ]);


        $userStats = UserStats::create([
            'user_id' => $user->id,
            'own_referral_code' => $referralCode,
        ]);


        if ($request->has('referral_code')) {
            $referringUser = User::where('own_referral_code', $request->referral_code)->first();
            if ($referringUser) {

                $userStats->update([
                    'referral_by' => $referringUser->id,
                ]);


                $referringUser->stats()->increment('earnings', 150);


                $referringUserParent = User::find($referringUser->referral_by);
                if ($referringUserParent) {

                    $referringUserParent->stats()->increment('earnings', 100);


                    $referringUserGrandParent = User::find($referringUserParent->referral_by);
                    if ($referringUserGrandParent) {

                        $referringUserGrandParent->stats()->increment('earnings', 50);
                    }
                }


                $referringUser->stats()->increment('total_referrals');


                $referralCount = $referringUser->stats()->whereNotNull('referral_by')->count();
                $level = 0;
                switch ($referralCount) {
                    case ($referralCount >= 2 && $referralCount < 30):
                        $level = 1;
                        break;
                    case ($referralCount >= 30 && $referralCount < 60):
                        $level = 2;
                        break;
                    case ($referralCount >= 60 && $referralCount < 100):
                        $level = 3;
                        break;
                    case ($referralCount >= 100 && $referralCount < 130):
                        $level = 4;
                        break;
                    case ($referralCount >= 130 && $referralCount < 160):
                        $level = 5;
                        break;
                    case ($referralCount >= 160 && $referralCount < 200):
                        $level = 6;
                        break;
                    case ($referralCount >= 200 && $referralCount < 250):
                        $level = 7;
                        break;
                    case ($referralCount >= 250 && $referralCount < 300):
                        $level = 8;
                        break;
                    case ($referralCount >= 300 && $referralCount < 400):
                        $level = 9;
                        break;
                    case ($referralCount >= 400 && $referralCount < 500):
                        $level = 10;
                        break;
                    case ($referralCount >= 500 && $referralCount < 600):
                        $level = 11;
                        break;
                    case ($referralCount >= 600):
                        $level = 12;
                        break;
                }


                $referringUser->stats()->update(['level' => $level]);
            }
        }

        Auth::login($user);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
