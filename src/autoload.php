<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ .'/../');
$dotenv->load();

define('HOST', $_ENV['RABBITMQ_HOST']);
define('PORT', $_ENV['RABBITMQ_PORT']);
define('USER', $_ENV['RABBITMQ_USER']);
define('PASS', $_ENV['RABBITMQ_PASS']);
define('VHOST', $_ENV['RABBITMQ_VHOST'] ?? '/');
define('AMQP_DEBUG', (bool) $_ENV['AMQP_DEBUG']);

// Be sure config is load from .env file
print_r(['HOST'=> HOST, 'PORT' => PORT, 'USER' => USER, 'PASS' => PASS, 'VHOST' => VHOST, 'AMQP_DEBUG' => AMQP_DEBUG]);
