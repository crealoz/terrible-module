# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**Crealoz_TerribleModule** is a Magento 2 FAQ module that intentionally contains anti-patterns and code quality issues. It serves as a test fixture for the [EasyAudit](https://github.com/crealoz/easy-audit-free) static analysis tool.

**Important**: This module deliberately implements poor practices to validate EasyAudit's detection capabilities. Do not "fix" the intentional issues unless specifically requested.

## Development Commands

### Module Installation (in Magento 2 project)
```shell
# Add repository
composer config repositories.crealoz-terrible-module vcs https://github.com/crealoz/terrible-module.git

# Install module
composer require crealoz/terrible_module

# Enable and setup
bin/magento module:enable Crealoz_TerribleModule
bin/magento setup:upgrade
```

### Run EasyAudit Scan Locally
```shell
# Using Docker
docker run --rm -v $(pwd):/app ghcr.io/crealoz/easyaudit:latest scan \
  --format=sarif \
  --output=/app/report.sarif \
  /app \
  --exclude="vendor,generated,var,pub/static,pub/media"
```

## Architecture

### Module Structure
- **API Layer** (`Api/`): Data interfaces (`FaqInterface`, `FaqSearchResultsInterface`) and repository contract
- **Model Layer** (`Model/`): `Faq` model, `FaqRepository`, and resource models for database operations
- **Controllers**: Frontend (`Index/`) and Admin (`Adminhtml/Question/`) controllers
- **Blocks**: `RandomFaq`, `FaqProduct`, `FaqCategories`, `LatestFaq` (4 blocks demonstrating high block ratio)
- **ViewModel**: `FaqList` (1 ViewModel to demonstrate Block vs ViewModel imbalance)
- **Plugins**: Three plugins demonstrating before/after/around patterns on `FaqRepository`, `AgreementsConfigProvider`, and `Customer`
- **Console**: `MakeThingsTerrible` command (`crealoz:terrible:things`)

### Database
Single table `crealoz_terrible_module_faq` with columns: `faq_id`, `question`, `answer`, `is_active`, `created_at`, `updated_at`

### UI Components
Admin grid (`crealoz_faq_listing.xml`) and form (`crealoz_faq_form.xml`) using Magento UI Components

## Intentional Anti-Patterns

These issues are deliberate test cases for EasyAudit (16/16 processors covered):

| File | Issue |
|------|-------|
| `Block/RandomFaq.php` | SQL injection, Registry usage, heavy class without proxy |
| `Block/FaqProduct.php` | Direct ObjectManager instantiation |
| `Block/FaqCategories.php`, `Block/LatestFaq.php` | Logic in Block instead of ViewModel, unused ObjectManager import |
| `Console/MakeThingsTerrible.php` | Bitwise OR instead of logical OR, no proxy |
| `Controller/Index/CustomerFaq.php` | Direct echo output (violates MVC) |
| `Plugin/CustomerPlugin.php` | Around plugins, hardcoded values |
| `Plugin/FaqRepositoryPlugin.php` | Same-module plugin |
| `etc/frontend/di.xml` | Duplicate preference for FaqInterface |
| `view/frontend/layout/faq_index_index.xml` | cacheable="false" block |
| `view/frontend/templates/faq.phtml` | Helper usage in template |
| `Model/FaqExporter.php` | N+1 query: repository getById() inside foreach loop |
| `etc/di.xml` + `Plugin/ProductViewPlugin.php` | Plugin on frontend Block in global di.xml (wrong scope) |

## CI/CD

GitHub Actions workflow (`.github/workflows/easyaudit-scan.yml`) runs EasyAudit on every push/PR and uploads SARIF results to GitHub Code Scanning.