<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function removeLikeFromPost(Post $post) {
        $likeref = auth()->user()->getLikes()->where('post_id', $post->id)->first();
        $likeref->delete();

        return redirect()->back();
    }

    public function addLikeToPost(Post $post) {
        $newLike = new Like();

        $newLike->user_id = auth()->user()->id;
        $newLike->post_id = $post->id;

        $newLike->save();

        return redirect()->back();
    }

    public function createPost(Request $request) {
        $newPost = new Post();

        $request->validate([
            'postimg' => 'required|image|max:3000',
        ]);

        $filename = auth()->user()->id . '-' . uniqid() . '.jpg';

        $imgData = Image::make($request->file('postimg'))->fit(600, 400)->encode('jpg');
        Storage::put('public/posts/' . $filename, $imgData);

        $newPost->captions = $request->caps;
        $newPost->imagesrc = $filename;
        $newPost->user_id = auth()->user()->id;

        $newPost->save();

        return redirect()->to('/');
    }
}
