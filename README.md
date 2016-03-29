# Simple Banking operation
A simple command line interface for simple bank operation

### Installation

git clone this repository.

Download composer: curl -s https://getcomposer.org/installer | php

Install dependencies, run this command from the root directory:

```php composer.phar install```

### Commands

*account*

__account:open__ - Open a new bank account. Set an overdraft. Deposit and withdraw from the account.

To run this command from the root directory: 

```php bank.php account:open ```
```php bank.php account:close ```
```php bank.php account:withdraw```
```php bank.php account:deposit```
```php bank.php account:balance```


### Unit Tests

To run this command from the root directory:

``` ./vendor/bin/phpunit ```