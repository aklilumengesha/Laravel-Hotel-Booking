<?php
/**
 * Database Seeder Helper for InfinityFree
 * Upload this file to your root directory and visit it once
 * DELETE THIS FILE AFTER USE!
 */

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "<h2>Seeding Database...</h2>";
echo "<pre>";

try {
    $kernel->call('db:seed', ['--force' => true]);
    echo "\n✅ Database seeded successfully!";
} catch (Exception $e) {
    echo "\n❌ Error: " . $e->getMessage();
}

echo "</pre>";
echo "<p><strong>⚠️ IMPORTANT: Delete this file immediately after use!</strong></p>";
