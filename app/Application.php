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
}
