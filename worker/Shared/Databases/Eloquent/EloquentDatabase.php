<?php

namespace Worker\Shared\Databases\Eloquent;

use Illuminate\Database\Capsule\Manager as Capsule;

class EloquentDatabase
{
    public static function load()
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => 'mysql',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'host' => $_ENV['DB_HOST'] ?? 'localhost',
            'port' => $_ENV['DB_PORT'] ?? 33096,
            'username' => $_ENV['DB_USERNAME'] ?? 'root',
            'password' => $_ENV['DB_PASSWORD'] ?? 'root',
            'database' => $_ENV['DB_DATABASE'] ?? 'test',
        ]);

        // Set the event dispatcher used by Eloquent models... (optional)
        //use Illuminate\Events\Dispatcher;
        //use Illuminate\Container\Container;
        //$capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
    }
}