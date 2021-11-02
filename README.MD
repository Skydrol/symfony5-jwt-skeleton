# Symfony 5 JWT Skeleton

This is a simple JWT skeleton in symfony 5.

## Installation

Use the package manager [composer](https://getcomposer.org/) to install and set up the packages.

The steps are listed below.

### 1 - Run this command in the root folder to install the packages: 
```bash
composer install
```

### 2 - Create the database. (The mySQL server must be running (xampp etc)):
```bash
php bin/console doctrine:database:create
```

### 3 - Create a migration file, which will be used to create the tables on database:
```bash
php bin/console doctrine:migrations:diff
```

### 4 - This command use the migration file and create the tables with its columns:
```bash
php bin/console doctrine:migrations:migrate
```

### 5 - This command will generate the keypairs to be used on JWT. Inside config/jwt must be 2 files after run this command: private.pem and public.pem:
```bash
php bin/console lexik:jwt:generate-keypair
```
