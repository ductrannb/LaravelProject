<?php

namespace App\Services;

class ResponseService
{
    public function response(bool $success, string $message)
    {
        return array('success' => $success, 'message' => $message);
    }
}