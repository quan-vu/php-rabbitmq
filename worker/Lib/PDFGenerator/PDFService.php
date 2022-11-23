<?php

namespace Worker\Lib\PDFGenerator;

use Worker\Lib\Logger\Log;

class PDFService implements IPDFService
{
    public static function generate(string $filename, $data = null)
    {
        // TODO: Implement send() method.
        Log::info("[PDFService] Generated $filename.pdf");
    }
}