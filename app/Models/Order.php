<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['created_at'] - datetime - contains the record creation timestamp
     * $this->attributes['updated_at'] - datetime - contains the record last update timestamp
     * $this->attributes['total_coins'] - int - contains the total value of the order
     */
    public function getTotalCoins(): int
    {
        return $this->attributes['total_coins'];
    }

    public function setTotalCoins(int $totalCoins): void
    {
        $this->attributes['total_coins'];
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
