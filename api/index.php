<?php

// Force serverless-compatible settings before Laravel boots
putenv('LOG_CHANNEL=stderr');
$_ENV['LOG_CHANNEL'] = 'stderr';
putenv('CACHE_DRIVER=array');
$_ENV['CACHE_DRIVER'] = 'array';
putenv('SESSION_DRIVER=cookie');
$_ENV['SESSION_DRIVER'] = 'cookie';

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
putenv('APP_STORAGE=' . $tmpPath);

require __DIR__ . '/../public/index.php';
