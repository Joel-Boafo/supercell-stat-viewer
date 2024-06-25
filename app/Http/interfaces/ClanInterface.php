<?php

namespace App\Http\Interfaces;

interface ClanInterface
{
    public function getClan(): array;

    public function getClanMembers(): array;

    
}
