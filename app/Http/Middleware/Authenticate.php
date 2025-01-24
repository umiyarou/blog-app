<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * ユーザーが認証されていない場合のリダイレクト先を指定。
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            return route('login'); // ログインページへリダイレクト
        }

        return null;
    }
}