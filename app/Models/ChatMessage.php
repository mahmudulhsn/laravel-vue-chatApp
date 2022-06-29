<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ChatMessage extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ["chat_room_id", "user_id", "message"];

    protected $casts = [
        'created_at' => "datetime:d, M Y h:i a",
    ];


    protected $appends = ['small_url', 'large_url'];

    public function getSmallUrlAttribute()
    {
        return $this->getFirstMediaUrl('chat-image', 'chat-small');
    }
    public function getLargeUrlAttribute()
    {
        return $this->getFirstMediaUrl('chat-image', 'chat-large');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('chat-image')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('chat-small')
                    ->width(100)
                    ->height(200);

                $this->addMediaConversion('chat-large')
                    ->width(590)
                    ->height(590);
            });
    }

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
