<?php
/**
 * Storage Link Helper for InfinityFree
 * Upload this file to your root directory and visit it once
 * DELETE THIS FILE AFTER USE!
 */

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "<h2>Creating Storage Link...</h2>";
echo "<pre>";

try {
    $kernel->call('storage:link');
    echo "\n✅ Storage link created successfully!";
} catch (Exception $e) {
    echo "\n❌ Error: " . $e->getMessage();
}

echo "</pre>";
echo "<p><strong>⚠️ IMPORTANT: Delete this file immediately after use!</strong></p>";
