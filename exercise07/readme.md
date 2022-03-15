# Instalation instructions

It is assumed that you have globaly installed Composer and web server. In this guide, location of this document is considered as document root, and will be reffered as `<document_root>`. Therefore, `<document_root>/readme.md` would display this document and `<document_roor>/seedDb.php` will seed your database with fake data.
Also, it is asumed that _symfony-cli_ is properly installed.

## Database

1. Create database **test**. You can use any other name, but remember it, as we will use it later
2. Run DDL queries defined in _dbstructure.sql_ in your database. This will create db tables needed and three users: _user01_, _user02_, _user03_, and their passwords will be _pass01_, _pass02_, _pass03_
3. Install faker library by composer
        `composer require fakerphp/faker`
4. In _seedDb.php_, in **Database configuration section** enter proper connection data for your database.
5. Run `<document_roor>/seedDb.php` to seed database with fake data.

## Application

Create new Symfony3 application by running
> `symfony new exercise07 --version=3.4`

Configure DB connection. In .env file set

> `DATABASE_URL="mysql://<your_db_user>:<your_db_password>@127.0.0.1:3306/<your_database_name>?serverVersion=5.7"`


Add support for JWT, compatibile to the Symfony3
> `composer require lexik/jwt-authentication-bundle "1.*"`

Generate SSH keys, from your application root (`<document_root>/exercise07`) passphrase: neotech

```
$ mkdir -p var/jwt
$ openssl genrsa -out var/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in var/jwt/private.pem -out var/jwt/public.pem
```

Create `<document_root>/config/packages/lexik_jwt_authentication.yaml` file with following settings:

```
lexik_jwt_authentication:
    private_key_path: %env(resolve:JWT_SECRET_KEY)%
    public_key_path:  %env(resolve:JWT_PUBLIC_KEY)%
    pass_phrase:      %env(resolve:JWT_PASSPHRASE)%
    token_ttl:        %env(resolve:JWT_TOKEN_TTL)%

```

And define environment variables is .env:

```
###> lexik/jwt-authentication-bundle ###
JWT_SECRET_KEY=%kernel.project_dir%/config/jwt/private.pem
JWT_PUBLIC_KEY=%kernel.project_dir%/config/jwt/public.pem
JWT_PASSPHRASE=neotec
JWT_TOKEN_TTL=86400
###< lexik/jwt-authentication-bundle ###
```