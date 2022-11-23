<?php

namespace Worker\Lib\Mailer;

use Worker\Lib\Logger\Log;

class MailService implements IMailService
{
    public static function send(string $from, string $to, $data = null)
    {
        // TODO: Implement send() method.
        Log::info("[MailService] Sent email from $from to $to");
    }
}