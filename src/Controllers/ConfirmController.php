<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ConfirmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        return view('auth.confirm-email')
            ->with('user', $user);
    }

    /**
     * Resend the confirmation email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function resendConfirm(Request $request)
    {
        $user = User::findOrFail($request->id);
        if ($user->confirmed > 0 ) {
            return redirect()
                ->route('login')->with('warning', trans('auth.yourEmailIsConfirmedYouMayLogin'));
        }
        $user->sendConfirmationEmail(route('confirm.token', $user->confirm_token));
        return redirect()
            ->back()
            ->with('success', trans('auth.resentSuccess'));
    }

    /**
     * user email confirm
     *
     * @param  string  $confirm_token
     * @return array
     */
    public function confirmEmail($confirm_token)
    {
        $user = User::where('confirm_token', $confirm_token)->firstOrFail();
        $user->confirm_token = null;
        $user->confirmed = true;
        $user->save();
        return redirect()->route('login')
            ->with('success', trans('auth.yourEmailIsConfirmedYouMayLogin'));
    }
}
