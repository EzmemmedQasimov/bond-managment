<?php

if (!function_exists('success')) {
    function success(array $data, $key, $code = 200)
    {
        return response()->json([
            'result' => "success",
            'message' => "",
            $key => $data
        ], $code);
    }
}

if (!function_exists('error')) {
    function error($msg = 'error', $error_msg = '', $code = 500)
    {
        return response()->json([
            'result' => $msg,
            'message' => $error_msg
        ], $code);
    }
}