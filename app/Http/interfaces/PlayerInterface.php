<?php

namespace App\Http\Interfaces;

interface PlayerInterface
{
    public function getPlayer(): array;

    public function getChestCycle(): array;

    public function getBattleLog(): array;
}
