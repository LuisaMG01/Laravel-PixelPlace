<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['created_at'] - datetime - contains the record creation timestamp
     * $this->attributes['updated_at'] - datetime - contains the record last update timestamp
     * $this->attributes['total_coins'] - int - contains the total value of the order
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->user - User - contains the associated User
     * $this->items - Item[] - contains the associated items
     */
    protected $fillable = ['total_coins', 'user_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotalCoins(): int
    {
        return $this->attributes['total_coins'];
    }

    public function setTotalCoins(int $totalCoins): void
    {
        $this->attributes['total_coins'] = $totalCoins;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
