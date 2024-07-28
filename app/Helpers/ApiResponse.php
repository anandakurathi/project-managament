<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * In all successfully cases use this for return response back
     *
     * @param string $message
     * @param int $code
     * @param array $data
     * @return JsonResponse
     */
    public static function success(array $data = [], string $message = 'success', int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * In case of failure / error occurs use this for response back
     *
     * @param string $message
     * @param int $code
     * @param $data
     * @return JsonResponse
     */
    public static function error(string $message = 'error', int $code = 400, $data = null): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
