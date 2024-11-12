<?php

namespace App\Http\Controllers;

use App\Events\MessageSent2;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vistaUsuario()
    {
        return view('users.showAll');
    }


    public function vistaGame()
    {
        return view('users.showGame');
    }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }



    public function showChat()
    {
        return view('users.showChat');
    }

    public function mensajeRecibido(Request $request)
    {

        Log::info("llegaaa");
        $rules = [
            'message' => 'required'
        ];


        broadcast(new MessageSent2($request->user(), $request->message));

        return response()->json('Message broadcast');
    }


}
