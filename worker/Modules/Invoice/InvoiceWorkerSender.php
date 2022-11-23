<?php

namespace Worker\Modules\Invoice;

use Exception;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class InvoiceWorkerSender
{
    /**
     * Sends an invoice generation task to the workers
     *
     * @param int $invoiceNum
     * @throws Exception
     */
    public function execute(int $invoiceNum)
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        // Create queue
        $channel->queue_declare(
            'invoice_queue',
            false,
            true,
            false,
            false
        );

        // Prepare data
        $data = $invoiceNum;

        // Send message
        $msg = new AMQPMessage(
            $data,
            array(
                'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT # make message persistent, so it is not lost if server crashes or quits
            )
        );
        
        $channel->basic_publish(
            $msg,
            '',
            'invoice_queue'
        );

        echo ' [x] Sent ', $data, "\n";

        $channel->close();
        $connection->close();
    }
}