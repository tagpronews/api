<?php namespace TagProNews\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesCommands, ValidatesRequests;

    public function simple($content)
    {
        $content = ['data' => $content];

        return response()->json($content);
    }

    public function error($errors, $code = 500)
    {
        $errors = (array)$errors;

        return response()->json($errors, $code);
    }
}
