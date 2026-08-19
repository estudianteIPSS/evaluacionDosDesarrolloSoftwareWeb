<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;
use Throwable;

class UfService
{
    private const API_URL = 'https://mindicador.cl/api';

    public function getTodayValue(): ?float
    {
        try {
            $response = Http::timeout(5)
                ->withoutVerifying()
                ->get(self::API_URL);

            if ($response->failed()) {
                return null;
            }

            $value = $response->json('uf.valor');

            if (!is_numeric($value)) {
                return null;
            }

            return (float) $value;

        } catch (Throwable) {
            return null;
        }
    }
}