<?php

namespace Worker\Lib\Logger;

use Worker\Shared\Patterns\Singleton;
use const WORKER_PATH;

class Log extends Singleton
{
    private static string $connection = '/var/logs/filename.log';
    protected static $logName = 'worker';

    private const LOG_TYPE_INFO = 'info';
    private const LOG_TYPE_WARN = 'warn';
    private const LOG_TYPE_ERROR = 'error';

    public static function info(string $message)
    {
        self::write(self::LOG_TYPE_INFO, $message);
    }

    public static function warn(string $message)
    {
        self::write(self::LOG_TYPE_WARN, $message);
    }

    public static function error(string $message)
    {
        self::write(self::LOG_TYPE_ERROR, $message);
    }

    private static function write(string $type, string $message)
    {
        $fileName = WORKER_PATH.'/logs/worker.txt';
        $logContent  = "[".date('Y-m-d H:i:s')."] ".self::$logName.".".strtoupper($type).":" . $message . PHP_EOL;

        if (!file_exists($fileName)) {
            $logFile  = fopen($fileName, 'w') or die("Unable to open file!");
        } else{
            $logFile  = fopen($fileName, 'a') or die("Unable to open file!");
        }

        fwrite($logFile, $logContent);
        fclose($logFile);
    }
}