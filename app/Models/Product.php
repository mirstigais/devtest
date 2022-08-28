<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @param string $name
 * @param float $price
 * @param int $id
 */
class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price'
    ];

    /**
     * @return Collection
     */
    public function list (): Collection
    {
        return $this->all();
    }

    /**
     * @param int|string $id
     * @return mixed
     */
    public function getProductById(int | string $id)
    {
        return $this->where('id', '=', $id)->get(['id', 'name', 'price'])->first();
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
