<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use Notifiable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'content',
        'type',
        'data',
        'is_hidden',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => AsArrayObject::class
    ];

    /**
     * Get the parent commentable model (post or video).
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Get the ower of this comment
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getReadAttribute() {
        $commentable = $this->commentable;

        if (!isset($commentable->read_until_comment_id)) {
            return false;
        }

        return $commentable->read_until_comment_id >= $this->id;
    }

    public function getCreatedAtHumanAttribute() {
        $diffInDays = $this->created_at->diffInDays(Carbon::now());

        if ($diffInDays > 3) {
           return $this->created_at->format('d/m/Y (h:i)');
        }
        
        return $this->created_at->diffForHumans();
    }
}
