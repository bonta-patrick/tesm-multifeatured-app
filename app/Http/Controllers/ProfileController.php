<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showUserProfile(User $user) {
        $allUserPosts = $user->getAllPosts()->latest()->get();
        $userchannels = auth()->user()->getAllMemberships();
        if($user->id == auth()->user()->id) {
            return view('profile-page', ['user_posts' => $allUserPosts]);
        }
        else {
            return view('profile-user-page', ['profile' => $user, 'user_posts' => $allUserPosts, 'userchannels' => $userchannels]);
        }
    }

    public function showProfilePage() {
        $allUserPosts = auth()->user()->getAllPosts()->latest()->get();
        return view('profile-page', ['user_posts' => $allUserPosts]);
    }
}
