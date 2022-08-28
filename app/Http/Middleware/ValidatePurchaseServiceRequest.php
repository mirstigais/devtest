<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidatePurchaseServiceRequest
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed|null
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->route()->parameters(),[
            'userId' => 'required|numeric',
            'productId' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response(['Invalid Request parameters provided'], 403);
        }

        return $next($request);
    }
}
