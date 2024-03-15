<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => 'string',
    ];

    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getBalance(): string
    {
        return $this->attributes['balance'];
    }

    public function setBalance(string $balance): void
    {
        $this->attributes['balance'] = $balance;
    }

    /** Model relations */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function challengeUser(): HasMany
    {
        return $this->hasMany(ChallengeUser::class);
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }

    public function checkBalance(string $id, int $orderTotal): false|true
    {
        $user = User::findOrFail($id);
        $balance = $user->getBalance();
        if ($balance < $orderTotal) {
            return false;
        } else {
            return true;
        }
    }
}
