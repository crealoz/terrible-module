# Crealoz_TerribleModule

A Magento 2 module that intentionally implements anti-patterns and code quality issues. It serves as a test fixture for the [EasyAudit CLI](https://github.com/crealoz/easyaudit-cli) static analysis tool.

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

## EasyAudit CLI Processor Coverage

This module tests the following [EasyAudit CLI](https://github.com/crealoz/easyaudit-cli) processors:

### ✅ Tested Processors (14/16)

| Processor | Triggered By | File(s) |
|-----------|--------------|---------|
| **AdvancedBlockVsViewModel** | Helper used in phtml template | `view/frontend/templates/faq.phtml` |
| **AroundPlugins** | Two `around` methods that could be before/after | `Plugin/CustomerPlugin.php` |
| **BlockViewModelRatio** | 4 Blocks vs 1 ViewModel (80% ratio) | `Block/*.php`, `ViewModel/FaqList.php` |
| **Cacheable** | Block with `cacheable="false"` | `view/frontend/layout/faq_index_index.xml` |
| **HardWrittenSQL** | Raw SQL with string concatenation | `Block/RandomFaq.php` |
| **Helpers** | Helper extending AbstractHelper + helper usage in phtml | `Helper/FaqList.php`, `view/frontend/templates/faq.phtml` |
| **MagentoFrameworkPlugin** | Plugins on Magento core classes | `Plugin/CustomerPlugin.php`, `Plugin/ConfigProviderPlugin.php` |
| **NoProxyInCommands** | Command without proxy for dependencies | `Console/MakeThingsTerrible.php` |
| **Preferences** | Duplicate preference for FaqInterface | `etc/di.xml`, `etc/frontend/di.xml` |
| **ProxyForHeavyClasses** | Registry and ResourceModel without proxy | `Block/RandomFaq.php`, `Model/FaqRepository.php` |
| **SameModulePlugins** | Plugin on class within same module | `Plugin/FaqRepositoryPlugin.php` |
| **SpecificClassInjection** | ResourceModel injected directly | `Model/FaqRepository.php` |
| **UseOfObjectManager** | Direct ObjectManager instantiation + unused import | `Block/FaqProduct.php`, `Block/LatestFaq.php` |
| **UseOfRegistry** | Usage of deprecated Registry | `Block/RandomFaq.php` |

### ❌ Not Tested Processors (2/16)

| Processor | Reason |
|-----------|--------|
| **PaymentInterfaceUseAudit** | No payment classes - would require adding a payment method extending `AbstractMethod` |
| **UnusedModules** | Requires Magento installation context (runtime dependent) |

## Anti-Patterns Reference

### Block/RandomFaq.php
- SQL injection via string concatenation (line 34)
- Deprecated `Registry` usage
- Heavy class without proxy

### Block/FaqProduct.php
- Direct `ObjectManager` injection and usage

### Block/LatestFaq.php
- Unused `ObjectManager` import (useless import warning)

### Plugin/CustomerPlugin.php
- Around plugins that should be before/after
- Hardcoded values

### Plugin/FaqRepositoryPlugin.php
- Plugin on same module class (should use preference)

### Console/MakeThingsTerrible.php
- No proxy for injected model
- Bitwise OR instead of logical OR (line 44)

### Helper/FaqList.php
- Extends deprecated `AbstractHelper`

### view/frontend/templates/faq.phtml
- Uses `$block->helper()` instead of ViewModel

### view/frontend/layout/faq_index_index.xml
- Block with `cacheable="false"` that degrades FPC performance

### etc/frontend/di.xml
- Duplicate preference for `FaqInterface` (also defined in `etc/di.xml`)

### Block/FaqCategories.php & Block/LatestFaq.php
- Business logic in Block instead of ViewModel (contributes to high Block ratio)