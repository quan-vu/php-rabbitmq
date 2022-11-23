<?php

namespace Worker\Lib\PDFGenerator;

interface IPDFService
{
    public static function generate(string $filename, array $data = []);
}