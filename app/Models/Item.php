<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
 
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['created_at'] - datetime - contains the record creation timestamp
     * $this->attributes['updated_at'] - datetime - contains the record last update timestamp
     * $this->attributes['acquire_price_coins'] - int - contains the acquire price coins value
     * $this->attributes['amount'] - float - contains the amount value
     */

    public function getAcquirePriceCoins(): int
    {
        return $this->attributes['acquire_price_coins'];
    }

    public function setAcquirePriceCoins(int $acquire_price_coins): void
    {
        $this->attributes['acquire_price_coins'];
    }

    public function getAmount(): float
    {
        return $this->attributes['amount'];
    }

    public function setAmount(float $amount): void
    {
        $this->attributes['amount'];
    }

    /**Model relations */
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
