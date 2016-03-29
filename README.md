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

__account:close__ - Close a existing bank account.
```php bank.php account:close ```

__account:withdraw__ - Withdraw amount from existing bank account. 

```php bank.php account:withdraw```

__account:deposit__ - Deposit amount to existing bank account.
```php bank.php account:deposit```

__account:balance__ - Check the balance amount from existing bank account.
```php bank.php account:balance```


### Unit Tests

To run this command from the root directory:

``` ./vendor/bin/phpunit ```