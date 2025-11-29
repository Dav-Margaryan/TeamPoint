<?php
class Logger{
    public static function logDebugInformation($message = null): void
    {
        if($message != null) {
            $logs = "logs/logs.log";
            $current = file_get_contents($logs);
            $message = (is_string($message) ? $message : print_r($message, 1));
            $t = debug_backtrace();
            $message = "\n" . date('Y-m-d H:i:s') . ', Dir: ' . $t[0]['file'] . ', Line: ' . $t[0]['line'] . "\n" . $message . "\n";
            $current .= $message;
            file_put_contents($logs, $current);
        }
    }
}