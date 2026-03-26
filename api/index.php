<?php

define('LARAVEL_START', microtime(true));

// Use /tmp for writable paths in serverless environment
$tmpPath = '/tmp/storage';
if (!is_dir($tmpPath)) {
    mkdir($tmpPath, 0755, true);
    mkdir($tmpPath . '/framework/cache/data', 0755, true);
    mkdir($tmpPath . '/framework/sessions', 0755, true);
    mkdir($tmpPath . '/framework/views', 0755, true);
    mkdir($tmpPath . '/logs', 0755, true);
}

$_ENV['APP_STORAGE'] = $tmpPath;

require __DIR__ . '/../public/index.php';
