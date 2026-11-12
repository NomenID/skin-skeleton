<?php /*
 * Copyright (c) 2025-2026 Your Name
 * Licensed under the Apache License, Version 2.0.
 * See the LICENSE file in this repository for the full text.
 * Project: https://nomenid.org/
 */ ?>
<?php $brand = \Nomen\Src\Brand::all(); ?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars(\Nomen\Src\I18n::code()) ?>" dir="<?= \Nomen\Src\I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title><?php $pageTitle = $title ?? $brand['name']; echo htmlspecialchars($pageTitle === $brand['name'] ? $pageTitle : "$pageTitle - " . $brand['name']); ?></title>
    <link rel="stylesheet" href="/css/style.css?v=k2f9xw6t">
    <?php foreach (\Nomen\Src\Plugins::styles() as $href): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($href) ?>">
    <?php endforeach; ?>
    <link rel="icon" href="<?= htmlspecialchars($brand['logo']) ?>">
    <?= \Nomen\Src\Hooks::filter('layout.head', '', 'app') ?>
</head>
<body class="skin-skeleton">
    <?= \Nomen\Src\Hooks::filter('layout.body.start', '', 'app') ?>
    <?= $content ?>
    <script src="<?= \Nomen\Src\I18n::catalogUrl() ?>"></script>
    <?= \Nomen\Src\ViteAssets::entry('src/entries/app.js') ?>
    <?php foreach (\Nomen\Src\Plugins::scripts() as $src): ?>
        <script src="<?= htmlspecialchars($src) ?>"></script>
    <?php endforeach; ?>
    <?= \Nomen\Src\Hooks::filter('layout.body.end', '', 'app') ?>
</body>
</html>
