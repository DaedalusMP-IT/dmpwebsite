<?php

namespace App;

class Application extends \Illuminate\Foundation\Application
{
    public function bootstrapPath($path = '')
    {
        $tmpDir = '/tmp/laravel-bootstrap';

        if (!is_dir($tmpDir . '/cache')) {
            mkdir($tmpDir . '/cache', 0755, true);
        }

        // Copy pre-generated cache files to /tmp on first request
        $sourceDir = dirname(__DIR__) . '/bootstrap/cache';
        if (is_dir($sourceDir)) {
            foreach (glob($sourceDir . '/*.php') as $file) {
                $dest = $tmpDir . '/cache/' . basename($file);
                if (!file_exists($dest)) {
                    copy($file, $dest);
                }
            }
        }

        return $tmpDir . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }

    public function storagePath($path = '')
    {
        $tmpStorage = '/tmp/laravel-storage';

        if (!is_dir($tmpStorage . '/framework/views')) {
            mkdir($tmpStorage . '/framework/views', 0755, true);
        }
        if (!is_dir($tmpStorage . '/framework/cache/data')) {
            mkdir($tmpStorage . '/framework/cache/data', 0755, true);
        }
        if (!is_dir($tmpStorage . '/logs')) {
            mkdir($tmpStorage . '/logs', 0755, true);
        }

        // Copy pre-compiled views to /tmp
        $sourceViews = dirname(__DIR__) . '/storage/framework/views';
        $destViews = $tmpStorage . '/framework/views';
        if (is_dir($sourceViews)) {
            foreach (glob($sourceViews . '/*.php') as $file) {
                $dest = $destViews . '/' . basename($file);
                if (!file_exists($dest)) {
                    copy($file, $dest);
                }
            }
        }

        return $tmpStorage . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
