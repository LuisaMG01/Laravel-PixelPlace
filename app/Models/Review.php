<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    /*
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['description'] - string - contains the description of the review
     * $this->attributes['rating'] - int - contains the comment rating
     * $this->product - Product - contains of the associated product
     * $this->user - User - contains the user who made the review
     * $this->attributes['created_at'] - datetime - contains the record creation timestamp
     * $this->attributes['updated_at'] - datetime - contains the record last update timestamp
     */
    protected $fillable = ['description', 'rating', 'product_id', 'user_id'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating(int $rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getProduct(): Product
    {
        return $this->attributes['product_id'];
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /* Model relations */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
