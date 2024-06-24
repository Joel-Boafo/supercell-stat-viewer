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

    public function getPlayer(): array
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$this->token}",
        ])->get("https://api.clashroyale.com/v1/players/{$this->playerTag}");

        $player = $response->json();

        return $player;
    }

    public function getChestCycle(): array
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$this->token}",
        ])->get("https://api.clashroyale.com/v1/players/{$this->playerTag}/upcomingchests");

        $chestCycle = $response->json()["items"]; // ["items] because the response is wrapped;

        return $chestCycle;
    }

    public function getBattleLog(): array
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$this->token}",
        ])->get("https://api.clashroyale.com/v1/players/{$this->playerTag}/battlelog");

        $battleLog = $response->json();

        return $battleLog;
    }
}
