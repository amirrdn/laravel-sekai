<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register()
    {
        $this->renderable(function (Throwable $exception, $request) {
            // Pastikan respons selalu dalam format JSON untuk API
            if ($request->expectsJson()) {
                // Jika terjadi error autentikasi
                if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Unauthenticated.',
                    ], 401);
                }

                // Jika terjadi error validasi
                if ($exception instanceof \Illuminate\Validation\ValidationException) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Validation Error',
                        'errors' => $exception->errors(),
                    ], 422);
                }

                // Error lainnya
                return response()->json([
                    'status' => 'error',
                    'message' => $exception->getMessage(),
                ], 500);
            }

            return parent::render($request, $exception);
        });
    }
}
