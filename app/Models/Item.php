<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public static function validate($request)
    {
        $request->validate([
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|gt:0',
            'product_id' => 'required|exists:products,id',
            'order_id' => 'required|exists:orders,id',
        ]);
    }

    protected $fillable = ['amount', 'acquire_price_coins', 'product_id', 'order_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getAcquirePriceCoins(): int
    {
        return $this->attributes['acquire_price_coins'];
    }

    public function setAcquirePriceCoins(int $acquirePriceCoins): void
    {
        $this->attributes['acquire_price_coins'] = $acquirePriceCoins;
    }

    public function getAmount(): int
    {
        return $this->attributes['amount'];
    }

    public function setAmount(int $amount): void
    {
        $this->attributes['amount'] = $amount;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($userId)
    {
        $this->attributes['product_id'] = $userId;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($userId)
    {
        $this->attributes['order_id'] = $userId;
    }

    /**Model relations */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
