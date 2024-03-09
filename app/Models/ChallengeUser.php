<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChallengeUser extends Model
{
    /**
     *  CHALLENGE USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key (id) of the challenge user
     * $this->attributes['progress'] - int - contains the user's progress in the challenge
     * $this->attributes['checked'] - bool - indicates whether the user's progress is checked
     */
    public function getProgress(): int
    {
        return $this->progress;
    }

    public function setProgress(int $progress): void
    {
        $this->progress = $progress;
    }

    public function isChecked(): bool
    {
        return $this->checked;
    }

    public function setChecked(bool $checked): void
    {
        $this->checked = $checked;
    }

    /** Model relations */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function challenge(): BelongsTo
    {
        return $this->belongsTo(Challenge::class);
    }
}
