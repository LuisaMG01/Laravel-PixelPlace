<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['description'] - string - contains the description of the review
     * $this->attributes['rating'] - int - contains the comment rating
     * $this->attributes['product_id'] - int - contains the ID of the associated product
     * $this->attributes['user_id'] - int - contains the ID of the user who made the review
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

    public function setDescription($description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    /** Model relations */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
