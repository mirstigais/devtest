<?php

namespace App\Services\Purchase;

use App\Events\PurchaseSuccess;
use App\Events\PurchaseFailed;
use App\Models\Product;
use App\Models\User;

class PurchaseService
{
    const MAX_PURCHASE_PRICE = 50;

    /**
     * @var Product
     */
    protected $productModel;

    /**
     * @var User
     */
    protected $userModel;

    /**
     * @param Product $productModel
     * @param User $userModel
     */
    public function __construct(Product $productModel, User $userModel)
    {
        $this->productModel = $productModel;
        $this->userModel = $userModel;
    }

    /**
     * @return array
     */
    public function list()
    {
        return $this->productModel->list()->toArray();
    }


    public function purchase($userId, $productId)
    {
        $user = $this->userModel->getUserById($userId);
        $product = $this->productModel->getProductById($productId);

        if (!isset($user) || !isset($product)){
            return ['Related data not found'];
        }

        if ($product->price >= self::MAX_PURCHASE_PRICE) {
            PurchaseFailed::dispatch($product, $user);
            return ['Fail'];
        }

        $user->products()->save($product);
        PurchaseSuccess::dispatch($product, $user);
        return ['Success'];
    }
}
