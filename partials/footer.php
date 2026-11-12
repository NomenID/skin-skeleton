<?php /*
 * Copyright (c) 2025-2026 Your Name
 * Licensed under the Apache License, Version 2.0.
 * See the LICENSE file in this repository for the full text.
 * Project: https://nomenid.org/
 */

/**
 * @var array $brand
 * @var array $links
 * @var string $layout
 */
?>
<footer class="sk-foot">
    <div class="sk-shell">
        <?php if (!empty($links)): ?>
            <nav>
                <?php foreach ($links as $link): ?>
                    <a href="<?= htmlspecialchars((string)$link['url']) ?>"><?= htmlspecialchars((string)$link['label']) ?></a>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>
        <?php if (($brand['copyright'] ?? '') !== ''): ?>
            <p><?= \Nomen\Src\Brand::copyrightHtml() ?></p>
        <?php endif; ?>
        <?php if (!empty($brand['powered_by'])): ?>
            <p><a href="/special/version" data-project-url="https://nomenid.org/" class="powered-by">Powered by Nomen</a></p>
        <?php endif; ?>
        <p class="sk-foot-note"><?= htmlspecialchars(t('Built with the skeleton skin.')) ?></p>
    </div>
</footer>
