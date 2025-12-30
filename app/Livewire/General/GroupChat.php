<?php

namespace App\Livewire\General;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Models\Common\Chat;
use App\Models\User;

//traits
use App\Traits\Base;

//Uuid import class
use Illuminate\Support\Str;

class GroupChat extends Component
{
    use Base;

    public $message;
    public $chats;
    public $chat_msg;
    public $contacts;

    public function render()
    {
        $this->chats = Chat::with('user')->where('is_seen', 0)->get();
        $this->contacts = User::select('name', 'email', 'id')->where('role','<>', 'supadmin')->get();
        foreach($this->chats as $chat)
        {
            $start = date('Y-m-d H:i:s');
            $end = $chat->created_at;
            $et = $this->elapsedTime($start, $end);
            $chat->time = $et;
        }
        return view('livewire.general.group-chat');
    }

    public function postChatMessage()
    {
        $validatedData     = $this->validate(
        [
            'chat_msg'           => 'required|string|regex:/^[A-Za-z0-9-_,. ]+$/|max:200',
        ],
        [
            'chat_msg.required'  => 'Error: The :attribute cannot be empty.',
            'chat_msg.chat_msg' => 'Error: The :attribute must be letters, dash and underscore only.',			
        ],
        [ 
            'chat_msg'           => 'To do item',
        ]);

        $this->updateIsSeen();

        $newChat = new Chat();
        $newChat->uuid = Str::uuid()->toString();
        $newChat->user_id = Auth::id();
        $newChat->message = $this->chat_msg;
        $newChat->is_seen = 0;
        //dd($newChat);
        $newChat->save();
        $newChat = Chat::all();
        $newChat = null;
        $this->chat_msg = null;
        
    }

    public function updateIsSeen()
    {
        foreach($this->chats as $chat)
        {
            $chat->is_seen = true;
            $chat->update();
        }
    }
}
