<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @var User
     */
    protected User $userModel;

    /**
     * @var Product
     */
    protected Product $productModel;

    /**
     * @param User $userModel
     * @param Product $productModel
     */
    public function __construct(User $userModel, Product $productModel)
    {
        $this->userModel = $userModel;
        $this->productModel = $productModel;
    }

    /**
     * @return Application|Factory|View
     */
    public function show()
    {
       $users = $this->userModel->get(['firstname', 'lastname', 'id'])->all();

       return view('users')->with('users', $users);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function showProfile($id)
    {
        $user = $this->userModel->getUserById($id);
        $product = $this->productModel->where('user_id', null)->orWhere('user_id', $user->id)->get();

        return view('userProfile')->with('user', $user)->with('products', $product);
    }
}
