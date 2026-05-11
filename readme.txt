=== Moare RG ===
Contributors: antoniofelices
Tags: research group, custom post types, acf, fse, block templates
Requires at least: 6.7
Tested up to: 6.8
Requires PHP: 8.3
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Plugin URI: https://github.com/antoniofelices/moare-rg

Research-group content structure: CPTs, Year taxonomy, ACF Pro field groups, FSE templates, and a Publications by Year dynamic block.

== Description ==

Moare RG registers the full content model for a research-group WordPress site:

* **Project**, **Publication**, and **Researcher** custom post types.
* **Year** hierarchical taxonomy attached to Publication.
* ACF Pro field groups for all three post types.
* FSE block templates for archive and single views of all three CPTs.
* A server-rendered dynamic block (`moare-rg/publications-by-year`) that lists publications grouped by year.

Requires ACF Pro to be active. If it is not, a persistent admin notice is displayed.

== Installation ==

1. Upload the `moare-rg` folder to `/wp-content/plugins/`.
2. Activate the plugin through the Plugins screen, or network-activate it.
3. Make sure ACF Pro is active on the same site.

== Changelog ==

= 1.0.0 =
* Initial release.
