<?php

namespace Worker\Lib\Mailer;


interface IMailService {
    public static function send(string $from, string $to, ?array $data = null);
}