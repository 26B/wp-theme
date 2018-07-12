# WP-Theme

All you need to start creating a theme for WordPress.

## Getting started

### Find and Replace

This project is a skeleton, so it has a bunch of keys that need to be replaced with values specific to your project.

For these changes, you should use the "Find and Replace" feature of your editor. Later there will be more options to this. Below you can find the table with the keys and their respective description, along with an example for the possible value.

| Key                      | Description                                                         | Example value                         |
| ------------------------ | ------------------------------------------------------------------- | ------------------------------------- |
| `[vendor_name]`          | Your username or company name: no spaces                            | `26B`                                 |
| `[theme_name]`           |                                                                     | `Foo Bar`                             |
| `[theme_description]`    | Description for the theme                                           | `A WordPress theme starter.`          |
| `[theme_url]`            | Theme URL                                                           | `https://github.com/26B/wp-theme`     |
| `[theme_slug]`           | Theme slug                                                          | `foo-bar`                             |
| `[initial_version]`      | Version to start the theme with                                     | `1.0.0`                               |
| `[author_name]`          | Author name                                                         | `Pedro Duarte`                        |
| `[author_url]`           | Author URL                                                          | `https://github.com/xipasduarte`      |
| `[text_domain]`          | Text domain                                                         | `foo-bar`                             |
| `[composer_vendor]`      | Your username, company or project name: lowercase and no spaces     | `26b`                                 |
| `[composer_name]`        | Theme identifier: usually the `[theme_name]` in dash-case            | `foo-bar`                             |
| `[namespace]`            | Desired PHP namespace                                               | `26B\WP\Theme\FooBar`                 |
| `[autoload_psr_4]`       | [PSR-4 autoload][1] for `[namespace]`                               | `26B\\WP\\Theme\\FooBar\\`            |
| `[autoload_tests_psr_4]` | [PSR-4 autoload][1] for `[namespace_tests]`                         | `26B\\WP\\Theme\\FooBar\\Tests\\`     |

[1]: https://getcomposer.org/doc/04-schema.md#psr-4

### Run composer

After all of the changes don't forget to run `composer install` to have the dependencies load and the autoload built. (Without this your theme will break.)
