<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Challenge extends Model
{
    /**
     * CHALLENGE ATTRIBUTES
     * $this->attributes['id'] - string - contains the challenge primary key (string)
     * $this->attributes['name'] - string - contains the challenge name
     * $this->attributes['description'] - string - contains the challenge description
     * $this->attributes['checked'] - bool - contains the challenge status
     * $this->attributes['reward_coins'] - int - contains the challenge reward
     * $this->attributes['max_users'] - int - contains the challenge maximum users
     * $this->attributes['current_users'] - int - contains the challenge current users
     * $this->attributes['expiration_date'] - datetime - contains the challenge expiration date
     * $this->attributes['category_id'] - int - contains the challenge category id
     * $this->attributes['category_quantity'] - int - contains the challenge category quantity
     */
    protected $fillable = ['name', 'description', 'checked', 'reward_coins', 'max_users', 'current_users', 'expiration_date', 'category_id', 'category_quantity'];

    protected static function booted()
    {
        static::creating(function ($challenge) {
            $challenge->current_users = 0;
            $challenge->checked = 0;
        });
    }

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getChecked(): bool
    {
        return $this->attributes['checked'];
    }

    public function setChecked(bool $checked): void
    {
        $this->attributes['checked'] = $checked;
    }

    public function getRewardCoins(): int
    {
        return $this->attributes['reward_coins'];
    }

    public function setRewardCoins(int $rewardCoins): void
    {
        $this->attributes['reward_coins'] = $rewardCoins;
    }

    public function getMaxUsers(): int
    {
        return $this->attributes['max_users'];
    }

    public function setMaxUsers(int $maxUsers): void
    {
        $this->attributes['max_users'] = $maxUsers;
    }

    public function getCurrentUsers(): int
    {
        return $this->attributes['current_users'];
    }

    public function setCurrentUsers(int $currentUsers): void
    {
        $this->attributes['current_users'] = $currentUsers;
    }

    public function getExpirationDate(): string
    {
        return $this->expiration_date;
    }

    public function setExpirationDate(DateTime $expirationDate): void
    {
        $this->attributes['expiration_date'] = $expirationDate;
    }

    public function getCategoryId(): int
    {
        return $this->attributes['category_id'];
    }

    public function getCategoryQuantity(): int
    {
        return $this->attributes['category_quantity'];
    }

    public function setCategoryQuantity(int $categoryQuantity): void
    {
        $this->attributes['category_quantity'] = $categoryQuantity;
    }

    /** Model relations */
    public function challengeUser(): HasMany
    {
        return $this->hasMany(ChallengeUser::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
