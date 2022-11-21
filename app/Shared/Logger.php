<?php

namespace App\Shared;

use App\Shared\Patterns\Singleton;

class Logger extends Singleton
{
    private string $connection;

    public function settings($connection = null)
    {
        $this->connection = $connection ?? '/var/logs/filename.log';
    }

    public function error(string $message)
    {
        // TODO: Implement Logger -> error
    }

    public function warn(string $message)
    {
        // TODO: Implement Logger -> warn
    }
}