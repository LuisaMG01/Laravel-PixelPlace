<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

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
     * $this->category - Category - contains the associated category
     * $this->items - Item[] - contains the associated items
     * $this->reviews - Review[] - contains the associated reviews
     * $this->attributes['created_at'] - datetime - contains the record creation timestamp
     * $this->attributes['updated_at'] - datetime - contains the record last update timestamp
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

    public function setKeywords(array $keywords): void
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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
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

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /* Special methods*/

    public static function getTopSellingProducts(int $limit = 5): object
    {
        return static::withCount('items')->orderByDesc('items_count')->limit($limit)->get();
    }

    public static function filters(Request $request): object
    {
        $products = Product::query();

        if ($request->filled('category')) {
            $products->where('category_id', $request->category);
        }

        if ($request->filled('price')) {
            $price = $request->price;
            if ($price === '0-49') {
                $products->where('price', '<', 50);
            } elseif ($price === '301') {
                $products->where('price', '>', 300);
            } else {
                $priceRange = explode('-', $price);
                $products->whereBetween('price', [$priceRange[0], $priceRange[1]]);
            }
        }

        if ($request->filled('brand')) {
            $products->where('brand', 'like', '%' . $request->brand . '%');
        }

        if ($request->filled('name')) {
            $products->where('name', 'like', '%' . $request->name . '%');
        }

        return $products;
    }

    public function getRating(): float
    {
        $reviews = $this->reviews;
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
