# faq

A Magento 2 module meant to be used in demo purposes

## Installation

### Composer

First, you need to add GitHub repository to your `composer.json` file. You can do it with this command:
```shell
composer config repositories.crealoz-terrible-module vcs https://github.com/crealoz/terrible-module.git
```

Then, you can install the module with the following command:
```shell
composer require crealoz/terrible_module
```

### Magento Module installation

Then, you need to enable the module with the following command:
```shell
bin/magento module:enable Crealoz_TerribleModule
```

And finally, you need to upgrade the database with the following command:
```shell
bin/magento setup:upgrade
```
