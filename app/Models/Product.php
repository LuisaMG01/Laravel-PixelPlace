<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['image'] - string - contains the route of the directory with the image
     * $this->attributes['brand'] - string - contains the product brand
     * $this->attributes['keywords'] - json - contains the product keywords
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['stock'] - int - contains the product stock
     * $this->attributes['description'] - string - contains the product description
    */
    protected $fillable = ['name', 'image', 'brand', 'keywords', 'price', 'stock', 'description'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage($image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand($brand): void
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

    public function setPrice($price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock($stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    /** Model relations */
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

    public function challenge(): HasMany
    {
        return $this->hasMany(Challenge::class);
    }
}
