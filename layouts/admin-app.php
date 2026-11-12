<?php /*
 * Copyright (c) 2025-2026 Your Name
 * Licensed under the Apache License, Version 2.0.
 * See the LICENSE file in this repository for the full text.
 * Project: https://nomenid.org/
 */ ?>
<?php $brand = \Nomen\Src\Brand::all(); ?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars(\Nomen\Src\I18n::code()) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title><?= htmlspecialchars($brand['name']) ?> <?= htmlspecialchars(\Nomen\Src\I18n::t('Admin')) ?></title>
    <link rel="stylesheet" href="/css/style.css?v=k2f9xw6t">
    <link rel="stylesheet" href="/css/admin.css?v=q7m2vx9k">
    <?php foreach (\Nomen\Src\Plugins::styles() as $href): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($href) ?>">
    <?php endforeach; ?>
    <link rel="icon" href="<?= htmlspecialchars($brand['logo']) ?>">
    <script src="<?= \Nomen\Src\I18n::catalogUrl() ?>"></script>
    <?= \Nomen\Src\Hooks::filter('layout.head', '', 'admin') ?>
</head>
<body class="admin-body">
    <?= \Nomen\Src\Hooks::filter('layout.body.start', '', 'admin') ?>
    <?= $content ?>
    <?= \Nomen\Src\ViteAssets::entry('src/entries/admin.js') ?>
    <?php foreach (\Nomen\Src\Plugins::scripts() as $src): ?>
        <script src="<?= htmlspecialchars($src) ?>"></script>
    <?php endforeach; ?>
    <?= \Nomen\Src\Hooks::filter('layout.body.end', '', 'admin') ?>
</body>
</html>
