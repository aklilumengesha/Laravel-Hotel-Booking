<?php
/**
 * Cache Clear Helper for InfinityFree
 * Upload this file to your root directory and visit it when needed
 * DELETE THIS FILE AFTER USE!
 */

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "<h2>Clearing All Caches...</h2>";
echo "<pre>";

try {
    echo "Clearing config cache...\n";
    $kernel->call('config:clear');
    
    echo "Clearing application cache...\n";
    $kernel->call('cache:clear');
    
    echo "Clearing view cache...\n";
    $kernel->call('view:clear');
    
    echo "Clearing route cache...\n";
    $kernel->call('route:clear');
    
    echo "\n✅ All caches cleared successfully!";
} catch (Exception $e) {
    echo "\n❌ Error: " . $e->getMessage();
}

echo "</pre>";
echo "<p><strong>⚠️ IMPORTANT: Delete this file after use!</strong></p>";
