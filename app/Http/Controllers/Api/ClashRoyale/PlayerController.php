<?php

namespace App\Http\Controllers\Api\ClashRoyale;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class Playercontroller extends Controller
{
    // WIP: make token and playertag either env or config variables OR get via user input.
    protected $token;
    protected $playerTag;

    public function __construct()
    {
        $this->token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjBjNTgxNzMxLTUwMGItNGMyMy1iNDc1LWE1NmJiYTZiMzdkZSIsImlhdCI6MTcxODg2ODQyMSwic3ViIjoiZGV2ZWxvcGVyL2Y5MTdhMzlkLTk2MmMtM2QzMi0xMjczLTc1YjRjOTk2YTE4YSIsInNjb3BlcyI6WyJyb3lhbGUiXSwibGltaXRzIjpbeyJ0aWVyIjoiZGV2ZWxvcGVyL3NpbHZlciIsInR5cGUiOiJ0aHJvdHRsaW5nIn0seyJjaWRycyI6WyI5Mi42NS44My4xMzEiXSwidHlwZSI6ImNsaWVudCJ9XX0.ZzSjO6yrOLu9PvEvpNsLUyhV0Of6K8FvhAH7oxm5J5yV6f5kJhtI2cu4VJUoxVUg9ON9FGdXHxyr_3-gee3vOw";
        $this->playerTag = "%23202UCV92J";  
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
    
    public function getCards(): View
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$this->token}",
        ])->get('https://api.clashroyale.com/v1/cards');

        $cards = $response->json();

        return view('welcome', dd($cards));
    }
}
