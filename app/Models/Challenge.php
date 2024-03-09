<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{

    /**
     * CHALLENGE ATTRIBUTES
     * $this->attributes['id'] - int - contains the challenge primary key (id)
     * $this->attributes['name'] - string - contains the challenge name
     * $this->attributes['description'] - string - contains the challenge description
     * $this->attributes['checked'] - bool - contains the challenge status
     * $this->attributes['reward_coins'] - int - contains the challenge reward
     * $this->attributes['max_users'] - int - contains the challenge maximum users
     * $this->attributes['current_users'] - int - contains the challenge current users
     * $this->attributes['expiration_date'] - datetime - contains the challenge expiration date
     * $this->attributes['product_name'] - string - contains the challenge product name
     * $this->attributes['product_quantity'] - int - contains the challenge product quantity
     */

    protected $fillable = [
        'name',
        'description',
        'checked',
        'reward_coins',
        'max_users',
        'current_users',
        'expiration_date',
        'product_name',
        'product_quantity',
    ];

    // Getters and Setters for the Challenge attributes

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

    public function getExpirationDate(): date
    {
        return $this->attributes['expiration_date'];
    }

    public function setExpirationDate(date $expirationDate): void
    {
        $this->attributes['expiration_date'] = $expirationDate;
    }

    public function getProductName(): string
    {
        return $this->attributes['product_name'];
    }

    public function setProductName(string $productName): void
    {
        $this->attributes['product_name'] = $productName;
    }

    public function getProductQuantity(): int
    {
        return $this->attributes['product_quantity'];
    }

    public function setProductQuantity(int $productQuantity): void
    {
        $this->attributes['product_quantity'] = $productQuantity;
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
