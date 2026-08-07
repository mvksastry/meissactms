<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrimAndNullStrings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Recursively trim and convert empty strings to null
        $request->merge(
            $this->cleanArray($request->all())
        );

        return $next($request);
    }

    /**
     * Recursively trim strings and convert empty strings to null.
     */
    protected function cleanArray(array $array): array
    {
        return array_map(function ($value) {
            if (is_array($value)) {
                return $this->cleanArray($value);
            }

            if (is_string($value)) {
                $trimmed = trim($value);
                return $trimmed === '' ? null : $trimmed;
            }

            return $value;
        }, $array);
    }



}
