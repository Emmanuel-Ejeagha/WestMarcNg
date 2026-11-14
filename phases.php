<?php
// Phase 2: Scan and list project images from wp-content/uploads/2026/11/
$dir = 'wp-content/uploads/2026/11/';
$files = glob($dir . '*.jpg') + glob($dir . '*.jpeg') + glob($dir . '*.webp') + glob($dir . '*.png');
$project_images = [];

foreach ($files as $f) {
    $basename = basename($f, pathinfo($f, PATHINFO_EXTENSION));
    // Only include clearly project-related images (not logos, not WhatsApp generic)
    $lower = strtolower($basename);
    $include = false;
    // Greenland Estate images
    if (strpos($lower, 'greenland') !== false) $include = true;
    // Kayfarm images
    if (strpos($lower, 'kayfarm') !== false) $include = true;
    // Triangle Mall images
    if (strpos($lower, 'triangle') !== false) $include = true;
    // Urban Tola render (already in feature section, skip for slideshow)
    if (strpos($lower, 'urban-render') !== false || strpos($lower, 'urban-exterior') !== false) $include = false;
    // WhatsApp images are generic construction shots - skip
    if (strpos($lower, 'whatsapp') !== false) $include = false;
    // New logo files - skip
    if (strpos($lower, 'westmarc logo') !== false) $include = false;
    
    if ($include) {
        $project_images[] = [
            'file' => $f,
            'basename' => $basename,
            'path' => $dir . $f
        ];
    }
}

// Sort: Greenland, Kayfarm, Triangle (existing order), then any others
usort($project_images, function($a, $b) {
    $order = ['greenland', 'kayfarm', 'triangle'];
    $pa = strpos($order, strtolower(pathinfo($a['basename'], PATHINFO_EXTENSION) . '-' . strtolower($a['basename'])));
    $pb = strpos($order, strtolower(pathinfo($b['basename'], PATHINFO_EXTENSION) . '-' . strtolower($b['basename'])));
    return ($pa ?? 999) - ($pb ?? 999);
});

echo "Project images found: " . count($project_images) . "\n";
foreach ($project_images as $i => $img) {
    echo ($i+1) . ". " . $img['basename'] . "\n";
});
