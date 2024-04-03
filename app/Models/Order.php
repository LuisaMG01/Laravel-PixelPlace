<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Order extends Model
{
    /*
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['created_at'] - datetime - contains the record creation timestamp
     * $this->attributes['updated_at'] - datetime - contains the record last update timestamp
     * $this->attributes['total_coins'] - int - contains the total value of the order
     * $this->attributes['user_id'] - int - contains the referenced user id
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

    public function getItems(): Collection
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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public static function filters(Request $request): object
    {
        $orders = Order::query();

        if ($request->filled('date_before') && $request->filled('date_after')) {
            $orders->whereDate('created_at', '>=', $request->date_after)
                ->whereDate('created_at', '<=', $request->date_before);
        } elseif ($request->filled('date_before')) {
            $orders->whereDate('created_at', '<=', $request->date_before);
        } elseif ($request->filled('date_after')) {
            $orders->whereDate('created_at', '>=', $request->date_after);
        }

        return $orders;
    }

    public static function calculateTotalAndSummary(array $productsInSession): array
    {
        $total = 0;
        $productsSummary = [];

        $productsInCart = Product::findMany(array_keys($productsInSession));

        foreach ($productsInCart as $product) {
            $quantity = ($productsInSession[$product->getId()] > 0) ? $productsInSession[$product->getId()] : 1;
            $subtotal = $product->getPrice() * $quantity;
            $total += $subtotal;
            $productsSummary[$product->getId()] = [$product, $subtotal, $quantity];
        }

        return [
            'total' => $total,
            'productsSummary' => $productsSummary,
        ];
    }
}
