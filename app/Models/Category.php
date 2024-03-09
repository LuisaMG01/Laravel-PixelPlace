<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * CATEGORY ATTRIBUTES
     * $this->attributes['id'] - int - contains the category primary key (id)
     * $this->attributes['created_at'] - datetime - contains the record creation timestamp
     * $this->attributes['updated_at'] - datetime - contains the record last update timestamp
     * $this->attributes['name'] - string - contains the category name
     */

    protected $fillable = ['name'];


    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attribute['id'] = $id;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName($name): void
    {
        $this->attribute['name'] = $name;
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
