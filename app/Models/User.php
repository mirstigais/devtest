<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @param int $id
 * @param string $name
 * @param string $email
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * @return Collection
     */
    public function list ()
    {
       return User::all(['id', 'firstname', 'lastname', 'email']);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getUserById(int $id)
    {
        return $this->where('id', $id)->get(['id', 'firstname', 'lastname', 'email'])->first();
    }

    /**
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
