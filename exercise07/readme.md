# Instalation instructions

It is assumed that you have globaly installed Composer and web server. In this guide, location of this document is considered as document root, and will be reffered as `<document_root>`. Therefore, `<document_root>/readme.md` would display this document and `<document_roor>/seedDb.php` will seed your database with fake data.

## Database

1. Create database **test**. You can use any other name, but remember it, as we will use it later
2. Run DDL queries defined in _dbstructure.sql_ in your database. This will create db tables needed and three users: _user01_, _user02_, _user03_, and their passwords will be _pass01_, _pass02_, _pass03_
3. Install faker library by composer
        `composer require fakerphp/faker`
4. In _seedDb.php_, in **Database configuration section** enter proper connection data for your database.
5. Run `<document_roor>/seedDb.php` to seed database with fake data.