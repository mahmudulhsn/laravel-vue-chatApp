<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = ["chat_room_id", "user_id", "message"];

    /**
     * Get the room associated with the ChatMessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function room(): HasOne
    {
        return $this->hasOne(ChatRoom::class, 'id', "chat_room_id");
    }

    /**
     * Get the user associated with the ChatMessage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
