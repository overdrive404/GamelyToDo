<?php

namespace App\Http\Controllers\User\Settings;

use Illuminate\Http\Request;

class SettingsController
{

    public function index()
    {
        $user = auth()->user();
        $avatars = array_diff(scandir(public_path('assets/images/faces')), ['..', '.']);
        return view('settings.main', compact('user', 'avatars'));
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|string',
        ]);
        $selectedAvatar = $request->input('avatar');
        auth()->user()->update(['avatar' => $selectedAvatar]);
        return redirect()->back()->with('success', 'Аватарка успешно изменена!');
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $name = $request->input('name');
        $user = auth()->user();
        $user->update(['name' => $name]);
        $character = $user->getCharacter;
        $character->update(['name' => $name]);
        return redirect()->back()->with('success', 'Имя успешно изменено!');
    }

}
