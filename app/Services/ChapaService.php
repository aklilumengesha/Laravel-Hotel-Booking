<?php
namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ChapaService
{
    protected $baseUrl = 'https://api.chapa.co/v1';
    protected $secretKey;

    public function __construct()
    {
        $this->secretKey = config('services.chapa.secret');
    }

    public function initialize(array $data)
    {
        $response = Http::withToken($this->secretKey)
            ->post("{$this->baseUrl}/transaction/initialize", $data);

        return $response->json();
    }

    public function verify($txRef)
    {
        $response = Http::withToken($this->secretKey)
            ->get("{$this->baseUrl}/transaction/verify/{$txRef}");

        return $response->json();
    }
}
