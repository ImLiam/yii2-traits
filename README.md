# Yii2 Traits

[![Latest Version on Packagist](https://img.shields.io/packagist/v/imliam/yii2-traits.svg)](https://packagist.org/packages/imliam/yii2-traits)
[![Total Downloads](https://img.shields.io/packagist/dt/imliam/yii2-traits.svg)](https://packagist.org/packages/imliam/yii2-traits)
[![License](https://img.shields.io/github/license/imliam/yii2-traits.svg)](LICENSE.md)

A collection of miscellaneous traits to extend parts of Yii2.

<!-- TOC -->

- [Yii2 Traits](#yii2-traits)
    - [💾 Installation](#💾-installation)
    - [📝 Usage](#📝-usage)
        - [`yii\db\Migration`](#yii\db\migration)
            - [Migration@fillColumn(string $table, string $column, $value)](#migrationfillcolumnstring-table-string-column-value)
        - [`yii\db\ActiveRecord`](#yii\db\activerecord)
            - [ActiveRecord@firstOrCreate(array $attributes, array $values = []): self](#activerecordfirstorcreatearray-attributes-array-values---self)
            - [ActiveRecord@create(array $attributes): self](#activerecordcreatearray-attributes-self)
            - [ActiveRecord@make(array $attributes): self](#activerecordmakearray-attributes-self)
            - [ActiveRecord@deleteIfExists(array $attributes)](#activerecorddeleteifexistsarray-attributes)
            - [ActiveRecord@first(string $orderBy = null)](#activerecordfirststring-orderby--null)
    - [✅ Testing](#✅-testing)
    - [🔖 Changelog](#🔖-changelog)
    - [⬆️ Upgrading](#⬆️-upgrading)
    - [🎉 Contributing](#🎉-contributing)
        - [🔒 Security](#🔒-security)
    - [👷 Credits](#👷-credits)
    - [♻️ License](#♻️-license)

<!-- /TOC -->

## 💾 Installation

You can install the package with [Composer](https://getcomposer.org/) using the following command:

```bash
composer require imliam/yii2-traits:^1.0.0
```

Once installed, you can then `use` the traits in your existing classes.

## 📝 Usage

### `yii\db\Migration`

#### Migration@fillColumn(string $table, string $column, $value)

Set the default value of an existing column.

```php
<?php

use yii\db\Migration;
use ImLiam\Yii2Traits\MigrationHelpers;

class m180524_091606_run_migration extends Migration
{
    use MigrationHelpers;

    public function safeUp()
        $this->addColumn('users', 'country', 'string');
        $this->fillColumn('users', 'country', 'GB');
    }
}
```

### `yii\db\ActiveRecord`

#### ActiveRecord@firstOrCreate(array $attributes, array $values = []): self

Get the first record matching the attributes or create it. Perfect for handling pivot models.

```php
<?php

use yii\db\ActiveRecord;
use ImLiam\Yii2Traits\ActiveRecordHelpers;

class User extends ActiveRecord
{
    use ActiveRecordHelpers;
}

$user = User::firstOrCreate(['id' => 1], ['username' => 'Admin']);
// Returns user ID 1 if it exists in the database, or creates
// a new user with the ID of 1 and username of 'Admin'
```

#### ActiveRecord@create(array $attributes): self

Create a new instance of the model and persist it.

```php
<?php

use yii\db\ActiveRecord;
use ImLiam\Yii2Traits\ActiveRecordHelpers;

class User extends ActiveRecord
{
    use ActiveRecordHelpers;
}

$user = User::create(['username' => 'Admin']);
// Creates and returns a new user with the username of 'Admin'
```

#### ActiveRecord@make(array $attributes): self

Create a new instance of the model without persisting it.

```php
<?php

use yii\db\ActiveRecord;
use ImLiam\Yii2Traits\ActiveRecordHelpers;

class User extends ActiveRecord
{
    use ActiveRecordHelpers;
}

$user = User::make(['username' => 'Admin']);
// Makes a new user with the username of 'Admin' but does NOT save it to the database
```

#### ActiveRecord@deleteIfExists(array $attributes)

Delete a model matching the given attributes.

```php
<?php

use yii\db\ActiveRecord;
use ImLiam\Yii2Traits\ActiveRecordHelpers;

class User extends ActiveRecord
{
    use ActiveRecordHelpers;
}

User::deleteIfExists(['username' => 'Admin']);
// Deletes all users with the username of 'Admin'
```

#### ActiveRecord@first(string $orderBy = null)

Get the first instance of a model.

```php
<?php

use yii\db\ActiveRecord;
use ImLiam\Yii2Traits\ActiveRecordHelpers;

class User extends ActiveRecord
{
    use ActiveRecordHelpers;
}

$user = User::first();
// Returns the first user in the database
```

## ✅ Testing

``` bash
composer test
```

## 🔖 Changelog

Please see [the changelog file](CHANGELOG.md) for more information on what has changed recently.

## ⬆️ Upgrading

Please see the [upgrading file](UPGRADING.md) for details on upgrading from previous versions.

## 🎉 Contributing

Please see the [contributing file](CONTRIBUTING.md) and [code of conduct](CODE_OF_CONDUCT.md) for details on contributing to the project.

### 🔒 Security

If you discover any security related issues, please email liam@liamhammett.com instead of using the issue tracker.

## 👷 Credits

- [Liam Hammett](https://github.com/imliam)
- [All Contributors](../../contributors)

## ♻️ License

The MIT License (MIT). Please see the [license file](LICENSE.md) for more information.
