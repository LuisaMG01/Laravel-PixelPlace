<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Represents a user's progress in a challenge.
 */
class ChallengeUser extends Model
{
    /**
     * CHALLENGE USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key (id) of the challenge user
     * $this->attributes['progress'] - int - contains the user's progress in the challenge
     * $this->attributes['checked'] - bool - indicates whether the user's progress is checked
     */
    protected $fillable = ['progress', 'checked', 'created_at', 'updated_at'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (! isset($this->attributes['progress'])) {
            $this->attributes['progress'] = 0;
        }
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getProgress(): int
    {
        return $this->progress;
    }

    public function setProgress(int $progress): void
    {
        $this->progress = $progress;
    }

    public function getChecked(): bool
    {
        return $this->checked;
    }

    public function setChecked(bool $checked): void
    {
        $this->checked = $checked;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
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

    public function changeProgress(string $userId, string $productId, int $amount): void
    {
        $user = User::findOrFail($userId);
        $product = Product::findOrFail($productId);

        $category = $product->getCategoryId();

        $challenges = $category->challenge;

        foreach ($challenges as $challenge) {
            $challengeUser = ChallengeUser::where('user_id', $user->getId())
                ->where('challenge_id', $challenge->getId())
                ->first();

            if (! $challengeUser) {
                $challengeUser = new ChallengeUser();
                $challengeUser->user_id = $user->getId();
                $challengeUser->challenge_id = $challenge->getId();
            }

            $challengeUser->setProgress($challengeUser->getProgress() + $amount);

            if ($challengeUser->getProgress() >= $challenge->getCategoryQuantity()) {
                $challengeUser->setChecked(true);
            } else {
                $challengeUser->setChecked(false);
            }

            $challengeUser->save();

            if ($challengeUser->getProgress() >= $challenge->getCategoryQuantity()) {
                $challengeUser->setChecked(true);
                $challengeUser->save();
            }
        }
    }
}
