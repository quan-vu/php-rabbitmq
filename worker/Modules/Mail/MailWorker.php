<?php

namespace Worker\Modules\Mail;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class MailWorker
{
    const USER_REGISTERED_EVENT = 'user.registered';
    const USER_SUBSCRIPTION_PAID_EVENT = 'user.subscription.paid';

    public function listen()
    {
        $topicName = 'topic_mail';
        $routing_key = 'user.registered';

        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->exchange_declare($topicName, 'topic', false, false, false);

        list($queue_name, ,) = $channel->queue_declare("", false, false, true, false);

        $binding_keys = ["#"];
        if (empty($binding_keys)) {
            file_put_contents('php://stderr', "Usage:  [binding_key]\n");
            exit(1);
        }

        foreach ($binding_keys as $binding_key) {
            $channel->queue_bind($queue_name, $topicName, $binding_key);
        }

        echo " [*] Waiting for events. To exit press CTRL+C\n";

        $callback = function ($msg) {
            echo ' [x] ', $msg->delivery_info['routing_key'], ':', $msg->body, "\n";
        };

        $channel->basic_consume($queue_name, '', false, true, false, false, $callback);

        while ($channel->is_open()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }

    /**
     * Send welcome email for user is registered
     * @return void
     */
    private function handleUserRegisteredEvent()
    {

    }
}