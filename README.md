# Skeleton skin

写 Nomen 皮肤的最小起点：三个布局、一个页脚片段、一条译文。复制这个目录，改成你要的 slug 就能开工。

```
skeleton/
├── skin.json               名字、版本、描述、许可
├── layouts/
│   ├── default.php         普通页面（首页、登录、文档、特殊页）
│   ├── app.php             登录后的应用区（Vue SPA 外壳）
│   └── admin-app.php       后台（Vue SPA 外壳）
├── partials/footer.php     页脚，Footer::render() 找的就是它
├── i18n/                   皮肤词条，25 份（en 母键，其余先放英文）
└── LICENSE                 Apache-2.0
```

**三个布局都得有。** 少一个的时候不会回退到核心，只会回退到**默认皮肤**的同名布局；如果这个皮肤自己就是默认皮肤，那个页面直接 500。

## 装上看看

```bash
cp -r skeleton /path/to/nomen/skins/example
```

1. 把 `skin.json` 的 `name`、`version`、`description` 改掉。
2. 目录名（slug）写进 `config/skins.php` 的 `enabled`；想让它成为默认就把 `default` 也改过去。
3. 用户的皮肤选择存在 `users.skin`，登录后设置页能换；未登录访客用 `default`。

```bash
php bin/nomen doctor      # 会检查皮肤目录和清单是否可读
```

## 布局里不能少的四样

```php
<?= \Nomen\Src\Hooks::filter('layout.head', '', 'default') ?>       // head 末尾
<?= \Nomen\Src\Hooks::filter('layout.body.start', '', 'default') ?>  // body 开头
<?= $content ?>                                                      // 页面正文
<?= \Nomen\Src\Hooks::filter('layout.body.end', '', 'default') ?>    // body 末尾
```

`layout.head` 那个钩子还负责输出核心的 generator / 版本 / 皮肤 / 语言 meta，漏了它这些标签就没了。

## 这里没有的东西

- 模板覆盖：想改登录页就把 `templates/login.php` 放进皮肤目录，同名就顶掉核心的。
- 皮肤自己的 CSS / JS：`assets/`，部署时放到站点的 `public/assets/skins/<slug>/`；也可以像本骨架一样先写在布局的 `<style>` 里。
- 插件模板覆盖：`templates/@<插件>/<模板>.php`。

完整约定见 Nomen 仓库的 `docs/skin-dev/`。
