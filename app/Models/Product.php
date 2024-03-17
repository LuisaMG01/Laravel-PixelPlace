<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /*
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['image'] - string - contains the route of the directory with the image
     * $this->attributes['brand'] - string - contains the product brand
     * $this->attributes['keywords'] - json - contains the product keywords
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['stock'] - int - contains the product stock
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['category_id'] - int - contains the ID of the associated category
     */

    protected $fillable = ['name', 'image', 'brand', 'keywords', 'price', 'stock', 'description', 'category_id'];

    public function getId(): int
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

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand(string $brand): void
    {
        $this->attributes['brand'] = $brand;
    }

    public function getKeywords(): array
    {
        return json_decode($this->attributes['keywords'], true);
    }

    public function setKeywords($keywords): void
    {
        $this->attributes['keywords'] = $keywords;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getCategoryId(): int
    {
        return $this->attributes['category_id'];
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->attributes['category_id'] = $categoryId;
    }


    /* Model relations */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /* Special methods*/
    public function getRating(): float
    {
        $reviews = $this->review;
        $totalReviews = $reviews->count();

        if ($totalReviews === 0) {
            return 0;
        }

        $totalRating = $reviews->sum('rating');

        $averageRating = $totalRating / $totalReviews;

        return round($averageRating, 1);
    }

    public function checkStock(int $id, int $quantity, $cartProductData): void
    {
        $product = Product::findOrFail($id);
        $stock = $product->getStock();
        if ($stock < $quantity) {
            $cartProductData[$id] = $quantity;
        }
    }
}
