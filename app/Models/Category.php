<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;

class Category extends Model
{
    /*
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the category primary key (id)
     * $this->attributes['name'] - string - contains the category name
     * $this->products - Product[] - contains the associated products
     * $this->challenges - Challenge[] - contains the associated challenges
     * $this->attributes['created_at'] - datetime - contains the record creation timestamp
     * $this->attributes['updated_at'] - datetime - contains the record last update timestamp
     */

    protected $fillable = ['name'];

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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getProducts(): Collection
    {
        return $this->products()->get();
    }

    public function setProducts(Collection $products): void
    {
        $this->products()->saveMany($products);
    }

    public function getChallenges(): Collection
    {
        return $this->challenges()->get();
    }

    public function setChallenges(Collection $challenges): void
    {
        $this->challenges()->saveMany($challenges);
    }

    /**Model relations */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function challenges(): HasMany
    {
        return $this->hasMany(Challenge::class);
    }
}
