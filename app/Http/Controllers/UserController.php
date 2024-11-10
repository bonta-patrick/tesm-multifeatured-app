<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function loginUser(Request $request) {
        $incomingFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['username' => $incomingFields['username'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate(); //we create a cookie in a session so that the browser can tell if we had logged in the past
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function loginPage() {
        return view('login');
    }

    public function saveAvatar(Request $request) {
        $request->validate([
            'avatar' => 'required|image|max:3000',
        ]);

        $user = auth()->user();

        $filename = auth()->user()->id . '-' . uniqid() . '.jpg';

        $imgData = Image::make($request->file('avatar'))->fit(120)->encode('jpg');
        Storage::put('public/avatars/' . $filename, $imgData);

        $oldAvatar = $user->avatarsrc;

        $newPath = "/storage/avatars/" . $filename;

        $user->avatarsrc = $newPath;
        $user->save();

        if($oldAvatar != '/fallback-avatar.jpg') {
            Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
        }

        return redirect()->to('/profile');
    }

    public function registerUser(Request $request) {
        $incomingFields = $request->validate([
            'username' => ['required', 'min: 3', 'max: 20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min: 8']
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'avatarsrc' => '/fallback-avatar.jpg'
        ]);
        auth()->login($user);

        return redirect()->to('/');
    }

    public function showCorrectHomePage() {
        if(!auth()->check()) {
            return view('home');
        }
        else {
            $posts = Post::all();
            $users = User::all();
            return view('homepage', ['posts' => $posts, 'users' => $users]);
        }
    }
}
