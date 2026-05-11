# Moare RG

A WordPress plugin that provides the complete content structure for a research-group site.

## What it provides

- **Custom post types:** `project`, `publication`, `researcher` — all public, REST-enabled, with archive support.
- **Custom taxonomy:** `year` — hierarchical, attached to `publication`, REST-enabled.
- **ACF Pro field groups:** placeholder text fields for all three CPTs (10 for project, 5 for publication, 10 for researcher). Replace placeholders with real fields as needed.
- **FSE block templates:** archive and single templates for all three CPTs, wired to the correct post types via `register_block_template()`.
- **Dynamic block** `moare-rg/publications-by-year`: server-rendered, lists all publications grouped by year term in descending order.

## Requirements

- WordPress 6.7+
- PHP 8.3+
- **ACF Pro** (already active on the network). If ACF Pro is not active, a persistent admin notice is shown and field groups are not registered.

## Installation

1. Upload the `moare-rg` folder to `/wp-content/plugins/`.
2. Network-activate or site-activate the plugin.
3. Ensure ACF Pro is active on the same site.

## File structure

```
moare-rg/
├── moare-rg.php                  Main plugin file
├── index.php                     Silence stub
├── composer.json
├── phpcs.xml.dist
├── .editorconfig
├── .gitignore
├── CHANGELOG.md
├── README.md
├── readme.txt
├── admin/
│   └── notices.php               Admin notice when ACF Pro is missing
├── blocks/
│   └── publications-by-year/
│       ├── block.json
│       ├── render.php
│       └── style.css
├── includes/
│   ├── acf-fields/
│   │   ├── project.php
│   │   ├── publication.php
│   │   └── researcher.php
│   ├── register-acf-fields.php
│   ├── register-blocks.php
│   ├── register-cpts.php
│   ├── register-taxs.php
│   └── register-templates.php
├── languages/
│   └── .gitkeep
└── templates/
    ├── archive-project.html
    ├── archive-publication.html
    ├── archive-researcher.html
    ├── single-project.html
    ├── single-publication.html
    └── single-researcher.html
```

## Development

```bash
composer install
vendor/bin/phpcs
```
