<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function rooms()
    {
        return ChatRoom::all();
    }

    public function messages(Request $request, $roomID)
    {
        return ChatMessage::with("user")->where("chat_room_id", $roomID)->latest("created_at")->get();
    }

    public function createMessage(MessageRequest $request, $roomID)
    {
        $message = ChatMessage::create($request->validated());

        return $message;
    }
}
