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
    <link rel="canonical" href="<?= htmlspecialchars($brand['base_url']) ?><?= rtrim(strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/') ?: '/' ?>">
    <title><?php $pageTitle = $title ?? $brand['name']; echo htmlspecialchars($pageTitle === $brand['name'] ? $pageTitle : "$pageTitle - " . $brand['name']); ?></title>
    <link rel="stylesheet" href="/css/style.css?v=k2f9xw6t">
    <?php if (\Nomen\Src\I18n::isRtl()): ?>
        <link rel="stylesheet" href="/css/rtl.css?v=31472968">
    <?php endif; ?>
    <?php foreach (\Nomen\Src\Plugins::styles() as $href): ?>
        <link rel="stylesheet" href="<?= htmlspecialchars($href) ?>">
    <?php endforeach; ?>
    <link rel="icon" href="<?= htmlspecialchars($brand['logo']) ?>">
    <style>
        .sk-shell { max-width: 960px; margin: 0 auto; padding: 0 1.25rem; }
        .sk-header { border-bottom: 1px solid var(--color-border, #e5e7eb); }
        .sk-header-inner { display: flex; align-items: center; gap: 1rem; min-height: 4rem; }
        .sk-nav { display: flex; align-items: center; gap: 1rem; margin-left: auto; font-size: .9rem; }
        .sk-main { padding: 2rem 0 4rem; }
        .sk-foot { border-top: 1px solid var(--color-border, #e5e7eb); padding: 1.5rem 0; font-size: .85rem; }
    </style>
    <?= \Nomen\Src\Hooks::filter('layout.head', '', 'default') ?>
</head>
<body class="skin-skeleton">
    <?= \Nomen\Src\Hooks::filter('layout.body.start', '', 'default') ?>
    <?php
    $navUserId = \Nomen\Src\Session::get('user_id');
    $navUserId = $navUserId ? (int)$navUserId : null;
    $navItems = \Nomen\Src\Nav::items($navUserId);
    ?>
    <header class="sk-header">
        <div class="sk-shell sk-header-inner">
            <a href="/" class="sk-logo">
                <img src="<?= htmlspecialchars($brand['logo']) ?>" alt="" width="28" height="28">
                <span><?= htmlspecialchars($brand['name']) ?></span>
            </a>
            <nav class="sk-nav">
                <?php foreach ($navItems as $item): ?>
                    <a href="<?= htmlspecialchars($item['href']) ?>"><?= htmlspecialchars($item['label']) ?></a>
                <?php endforeach; ?>
                <?php if ($navUserId): ?>
                    <button type="button" onclick="handleLogout()"><?= t('Sign out') ?></button>
                <?php else: ?>
                    <a href="/login"><?= t('Sign in') ?></a>
                    <a href="/register"><?= t('Sign up') ?></a>
                <?php endif; ?>
                <?php if (\Nomen\Src\I18n::switchingAllowed()): require \Nomen\Src\Skins::template('_lang_picker'); endif; ?>
            </nav>
        </div>
    </header>

    <main class="sk-shell sk-main">
        <?= $content ?>
    </main>

    <?php \Nomen\Src\Footer::render('default'); ?>

    <script src="<?= \Nomen\Src\I18n::catalogUrl() ?>"></script>
    <script src="/js/app.js?v=kbjnj594"></script>
    <?php foreach (\Nomen\Src\Plugins::scripts() as $src): ?>
        <script src="<?= htmlspecialchars($src) ?>"></script>
    <?php endforeach; ?>
    <?= \Nomen\Src\Hooks::filter('layout.body.end', '', 'default') ?>
    <?= \Nomen\Src\Csrf::field() ?>
</body>
</html>
