<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
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
        return ChatMessage::with("user")->where("chat_room_id", $roomID)->oldest()->get();
    }

    public function createMessage(MessageRequest $request, $roomID)
    {
        $newMessage = ChatMessage::create($request->validated());

        if ($newMessage instanceof ChatMessage && $request->has("image") && file_exists($request->image)) {
            $newMessage->addMedia($request->image)->toMediaCollection('chat-image');
        }

        $message = ChatMessage::with("user")->latest()->first();

        broadcast(new NewChatMessage($message))->toOthers();

        return $message;
    }
}
