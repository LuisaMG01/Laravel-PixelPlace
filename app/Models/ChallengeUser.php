<?php

namespace App\Models;
use App\Models\User; 
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
    protected $fillable = ['progress', 'checked', 'created_at', 'updated_at', 'user_id', 'challenge_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (!isset($this->attributes['progress'])) {
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

    public static function changeProgress(string $userId, string $productId, int $amount): void
    {
        $user = User::find($userId);
        $product = Product::find($productId);
 
        $category_id = $product->getCategoryId();
        $category = Category::findOrFail($category_id);
        $challenges = $category->challenges;

        foreach ($challenges as $challenge) 
        {

            $challengeUser = ChallengeUser::where('user_id', $user->getId())
                ->where('challenge_id', $challenge->getId())
                ->first();

            if (!$challengeUser) 
            {
                $challengeUser = new ChallengeUser();
                $challengeUser->user_id = $user->getId();
                $challengeUser->challenge_id = $challenge->getId();
            }

            $challengeUser->setProgress($challengeUser->getProgress() + $amount);

            if ($challengeUser->getProgress() >= $challenge->getCategoryQuantity() && $challengeUser->getChecked() === false)
            {
                $challengeUser->setChecked(true);
                $challenge->setCurrentUsers($challenge->getCurrentUsers() + 1);
                $challenge->save();
                $user->setBalance($user->getBalance() + $challenge->getRewardCoins());
                $user->save();
            } 
            else 
            {
                $challengeUser->setChecked(false);
            }

            $challengeUser->save();
            
            if($challenge->getCurrentUsers() >= $challenge->getMaxUsers())
            {
                $challenge->setChecked(true);
                $challenge->save();
            }
            if ($challengeUser->getProgress() >= $challenge->getCategoryQuantity()) 
            {
                $challengeUser->setChecked(true);
                $challengeUser->save();
            }
        }
    }

    public static function asignToUsers(string $id): void
    {
        $users = User::pluck('id');
    
        $users->each(function ($userId) use ($id) 
        {
            $challengeUserData = [
                'user_id' => $userId,
                'challenge_id' => $id,
                'progress' => 0,
                'checked' => false,
            ];
    
            ChallengeUser::create($challengeUserData);
        });
    }

    public static function asignChallenges(string $id): void
    {
        $challenges = Challenge::where('checked', 0)->pluck('id');
    
        $challenges->each(function ($challengeId) use ($id) 
        {
            $challengeUserData = [
                'user_id' => $id,
                'challenge_id' => $challengeId,
                'progress' => 0,
                'checked' => false,
            ];
    
            ChallengeUser::create($challengeUserData);
        });
    }
}
