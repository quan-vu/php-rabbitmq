<?php
require_once(__DIR__ . '/../autoload.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$topicName = 'topic_mail';
$routing_key = 'user.registered';

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();
$channel->exchange_declare($topicName, 'topic', false, false, false);

// Prepare data (faked)
$userId = time();
$user = [
    "id" => $userId,
    "first_name" => "Quan",
    "last_name" => "Vu",
    "email" => "quan-vu-$userId@example.com"
];

// Send message
$data = json_encode($user);
$msg = new AMQPMessage(
    $data,
    array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
);
$channel->basic_publish($msg, 'topic_mail', $routing_key);

echo " [x] Sent: topic=$topicName, routing_key=$routing_key, data=$data \n";
$channel->close();
$connection->close();