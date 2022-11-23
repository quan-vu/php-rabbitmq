<?php
require_once(__DIR__ . '/../autoload.php');

use Worker\Modules\Invoice\InvoiceWorkerSender;

$invoiceNo = time();

$sender = new InvoiceWorkerSender();
$sender->execute($invoiceNo);