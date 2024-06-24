<?php

namespace App\Http\Controllers\Api\ClashRoyale;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class Playercontroller extends Controller
{
    protected $token;
    protected $playerTag;

    public function __construct()
    {
        $this->token = config('clashroyale.api_key');
        $this->playerTag = config('clashroyale.player_tag');
    }

    public function getPlayer()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$this->token}",
        ])->get("https://api.clashroyale.com/v1/players/{$this->playerTag}");

        $player = $response->json();

        dd($player);
    }

    public function getChestCycle()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$this->token}",
        ])->get("https://api.clashroyale.com/v1/players/{$this->playerTag}/upcomingchests");

        $chestCycle = $response->json()["items"]; // ["items] because the response is wrapped;

        dd($chestCycle);
    }

    public function getBattleLog()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$this->token}",
        ])->get("https://api.clashroyale.com/v1/players/{$this->playerTag}/battlelog");

        $battleLog = $response->json();

        dd($battleLog);
    }
}
