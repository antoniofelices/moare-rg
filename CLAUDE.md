# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Linting

```bash
# Install dependencies (first time)
composer install

# Run PHPCS
vendor/bin/phpcs

# Auto-fix what can be fixed
vendor/bin/phpcbf
```

There are no tests and no build step — the block (`moare-rg/publications-by-year`) is server-rendered PHP with no JS compilation.

## Architecture

### Entry point

`moare-rg.php` is the only file in the global namespace. It defines five constants (`MOARE_RG_VERSION`, `MOARE_RG_FILE`, `MOARE_RG_PATH`, `MOARE_RG_URL`, `MOARE_RG_BASENAME`), loads the textdomain on `init`, and `require_once`s every include in alphabetical order. All other PHP files declare their own namespace and must never be loaded directly.

### Namespace convention

Every included file uses `Moare_Rg\<PascalCase_Of_Filename>` as its namespace. Cross-file calls always use fully-qualified names:

```php
\Moare_Rg\Register_Cpts\register_cpts();
\Moare_Rg\Acf_Fields\Project\register_field_group();
```

### CPT and taxonomy slugs

All slugs are prefixed with `mrg_` to avoid collisions on the multisite network:

| Object            | Slug              |
| ----------------- | ----------------- |
| CPT — Project     | `mrg_project`     |
| CPT — Publication | `mrg_publication` |
| CPT — Researcher  | `mrg_researcher`  |
| Taxonomy — Year   | `mrg_year`        |

### ACF field keys and names

Field keys follow `field_mrg_{cpt}_{field_name}` and field names follow `mrg_{field_name}`. The orchestrator `includes/register-acf-fields.php` checks for `acf_add_local_field_group` before loading — do not gate this check inside the individual field-group files.

### ACF field groups

| File                                  | Group key                    | CPT               |
| ------------------------------------- | ---------------------------- | ----------------- |
| `includes/acf-fields/project.php`     | `group_moare_rg_project`     | `mrg_project`     |
| `includes/acf-fields/publication.php` | `group_moare_rg_publication` | `mrg_publication` |
| `includes/acf-fields/researcher.php`  | `group_moare_rg_researcher`  | `mrg_researcher`  |

Inside `acf_add_local_field_group()` arrays, align `=>` operators to the longest key in each array (`'conditional_logic'` / `'allow_in_bindings'` = 20 chars at field level, `'location'` = 10 chars at group level).

### Dynamic block

`blocks/publications-by-year/` — registered via `block.json` + `render.php`, no JS build. `render.php` uses PHP template-style output (`?> HTML <?php`), not `echo` strings. It queries `mrg_year` terms DESC, then per-term queries `mrg_publication` ordered by `mrg_authors` ASC. The `mrg_type` select field returns its key (`'article'`, `'book'`, `'book_chapter'`), not the label.

### FSE templates

Six `.html` files in `/templates/` are registered via `register_block_template()` in `includes/register-templates.php`. Content is loaded with `file_get_contents()`. The `archive-publication.html` template includes the `<!-- wp:moare-rg/publications-by-year /-->` block.

### Coding standards

- WPCS (`WordPress` + `WordPress-Extra`), PHP 8.3+, WP 6.7+.
- Text domain: `moare-rg`. Allowed global prefixes: `moare_rg`, `MOARE_RG`, `Moare_Rg`.
- Every PHP file: file-level DocBlock with `@package moare/moare-rg`, `ABSPATH` guard, namespace declaration.
- Escape at the point of output (`esc_html()`, `esc_url()`, `esc_attr()` inline — never pre-escape into a variable).
- Every subdirectory contains an `index.php` silence stub (server is a shared multisite).
