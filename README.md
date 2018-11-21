# Snippet Plugin for [Flextype](http://flextype.org/)
![version](https://img.shields.io/badge/version-1.0.1-brightgreen.svg?style=flat-square)
![Flextype](https://img.shields.io/badge/Flextype-0.7.0-green.svg?style=flat-square)
![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)

Snippet plugin provides a basic way to work with code snippets and saved with `.php` extension in the folder `/site/snippets/`

## Installation
Unzip plugin to the folder `/site/plugins/`

## Usage in page content

```
[snippet name=snippet-name]
```

## Usage in the template

Define Flextype namespace in the template if it is not defined yet.
```
<?php namespace Flextype; ?>
```

Display block content
```
<?php echo Snippet::get('snippet-name'); ?>
```

## Settings

```yaml
enabled: true # or `false` to disable the plugin
```

## License
See [LICENSE](https://github.com/flextype-plugins/snippet/blob/master/LICENSE.txt)
