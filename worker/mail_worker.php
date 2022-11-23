<?php
require_once(__DIR__ . '/autoload.php');

use Worker\Modules\Mail\MailWorker;

$mailWorker = new MailWorker();
$mailWorker->listen();