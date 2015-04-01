<?php namespace TagProNews\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

abstract class Request extends FormRequest
{
    public function userHasPermission($permissions)
    {
        return Auth::check() && Auth::user()->hasPermission($permissions);
    }
}
