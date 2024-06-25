<?php

namespace App\Http\Controllers\Api\ClashRoyale;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\CardsInterface;
use Illuminate\Support\Facades\Http;

class CardsController extends Controller implements CardsInterface
{
    protected $token;
    protected $playerTag;

    public function __construct()
    {
        $this->token = config('clashroyale.api_key');
        $this->playerTag = config('clashroyale.player_tag');
    }

    public function getCards(): array
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$this->token}",
        ])->get("https://api.clashroyale.com/v1/cards");

        $cards = $response->json();

        return $cards;
    }
}
