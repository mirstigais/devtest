<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ValidateUserServiceRequest
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed|null
     * @throws ValidationException
     */
    public function handle(Request $request, Closure $next)
    {
       $validator = Validator::make($request->route()->parameters(),[
           'id' => 'required|numeric'
        ]);

       if ($validator->fails()) {
           return response(['Invalid Request parameters provided'], 403);
       }

        return $next($request);
    }
}
