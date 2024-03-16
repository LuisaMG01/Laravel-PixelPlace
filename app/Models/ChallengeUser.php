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
     *  CHALLENGE USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the primary key (id) of the challenge user
     * $this->attributes['progress'] - int - contains the user's progress in the challenge
     * $this->attributes['checked'] - bool - indicates whether the user's progress is checked
     */
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
    
        // Obtener la categoría del producto
        $category = $product->category;
    
        // Verificar si la categoría existe
        if (!$category) {
            throw new \Exception("El producto no tiene una categoría asociada.");
        }
    
        $challenges = $category->challenges;
    
        foreach ($challenges as $challenge) {
            $challengeUser = ChallengeUser::where('user_id', $user->getId())
                                          ->where('challenge_id', $challenge->getId())
                                          ->first();
    
            if ($challengeUser) {
                $challengeUser->setProgress($challengeUser->getProgress() + $amount);
                $challengeUser->save();
    
                if ($challengeUser->getProgress() >= $challenge->getCategoryQuantity()) {
                    $challengeUser->setChecked(true);
                    $challengeUser->save();
                }
            }
        }
    }
    
}
