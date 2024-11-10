<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Channel;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use App\Models\ChannelMessage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ChannelsController extends Controller
{
    public function getMessages(Channel $channel) {
        return response()->json($channel->getMessages()->with('user')->with('message_reactions')->get());
    }

    public function storeMessage(Request $request, Channel $channel, User $user) {
        $request->validate([
            'message_content' => 'required'
        ]);

        $message = new ChannelMessage();

        $message->user_id = $user->id;
        $message->content = $request->message_content;
        $message->type = "text";
        $message->channel_id = $channel->id;

        $message->save();

        $message = ChannelMessage::where('id', $message->id)->with('user')->first();

        broadcast(new NewMessage($message))->toOthers();

        return $message->toJson();
    }

    public function storeMediaMessage(Request $request, Channel $channel, User $user) {
        $request->validate([
            'message_image' => 'required'
        ]);

        $message = new ChannelMessage();

        $filename = $user->id . '-' . uniqid() . '.jpg';

        $imgData = Image::make($request->file('message_image'))->fit(450, 350)->encode('jpg');
        Storage::put('public/channel/' . $channel->id . '/' . $filename, $imgData);

        $message->user_id = $user->id;
        $message->type="mediaimages";
        $message->channel_id = $channel->id;

        $newPath = "/storage/channel/" . $channel->id . '/' . $filename;

        $message->content = $newPath;

        $message->save();

        $message = ChannelMessage::where('id', $message->id)->with('user')->first();

        event(new NewMessage($message));

        return $message->toJson();
    }

    public function joinChannel(Channel $channel) {
        $newMember = new Member();

        $newMember->user_id = auth()->user()->id;
        $newMember->channel_id = $channel->id;

        $newMember->save();

        return redirect()->back();
    }

    public function showChannel(Channel $channel) {
        $userChannels = auth()->user()->getAllMemberships();
        $allChannels = Channel::all();
        $members = $channel->getAllMembers()->get();
        return view('channels-user', ['refchannel' => $channel, 'allchannels' => $allChannels, 'user_channels' => $userChannels->get(), 'members' => $members]);
    }

    public function createNewChannel(Request $request) {
        $request->validate([
            'channel_image' => 'required|image|max:3000',
            'channel_name' => 'required',
            'channel_desc' => 'required'
        ]);

        $newChannel = new Channel();

        $filename = auth()->user()->id . '-' . uniqid() . '.jpg';

        $imgData = Image::make($request->file('channel_image'))->fit(120)->encode('jpg');
        Storage::put('public/channels/' . $filename, $imgData);
    
        $newChannel->user_id = auth()->user()->id;
        $newChannel->channel_image = $filename;
        $newChannel->channel_name = $request->channel_name;
        $newChannel->channel_description = $request->channel_desc;

        $newChannel->save();

        $newMember = new Member();

        $newMember->user_id = auth()->user()->id;
        $newMember->channel_id = $newChannel->id;

        $newMember->save();

        

        return redirect()->back();
    }

    public function showUserChannelsPage() {
        $channels = auth()->user()->getAllMemberships();
        $allChannels = Channel::all();
        if($channels->count()) {
          return view('channels-user-has', ['channels' => $channels->get()]);
        }
        else {
            return  view('channels-user-no-ch', ['allchannels' => $allChannels]);
        }
    }

    public function channelsPage() {
        return view('channels');
    }
}
