<?php

namespace App\Controllers;

class ErrorController {
    /**
     * @param 404 Resource Not Found
     * 
     * @return void
     */
    public static function notFound($message = 'Resource not found')
    {
        http_response_code(404);

        loadView('error', [
            'status' => '404',
            'message' => $message
        ]);
    }

    public static function unauthorized($message = 'You are not authorized to access this page')
    {
        http_response_code(403);

        loadView('error', [
            'status' => '403',
            'message' => $message
        ]);
    }
}