<?php
/**
 * Usage: php worker/invoice_worker.php
 */

require_once(__DIR__ . '/autoload.php');

use Worker\Modules\Invoice\InvoiceWorker;

$invoiceWorker = new InvoiceWorker();
$invoiceWorker->listen();