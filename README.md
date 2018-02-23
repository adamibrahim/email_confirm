# Laravel 5.6 Email confirmation

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel 5.6 Natively Email confirmation Package Using Queue to send Emails

## Demo

You can see working [demo](https://www.emailconfirm.hostato.com)

## Install

#####  Laravel fresh installation

``` bash
$ laravel new yourappname
```

##### Create / configure .env file
- database access
- QUEUE_DRIVER=database
- Email configuration 

##### Install the package Via Composer

``` bash
$ composer require adamibrahim/email_confirm
```

###### If you installing at laravel 5.5 or higher then you may go directly to Publish other wise you will need to edit composer.json and register the Service Provider

##### composer.json

Add this code to your composer.json under the autoload at your main directory

``` bash
"psr-4": {
            "Adam\\EmailConfirm\\": "vendor/adamibrahim/email_confirm/src"
        }
```

##### Service Provider

At file config/app.php register service provider under * Package Service Providers...

``` bash
Adam\EmailConfirm\EmailConfirmServiceProvider::class,
```

##### Publishing

###### This will overwrite your User.php model 

``` bash
$ php artisan vendor:publish --tag=emailConfirm --force
```

##### Database Migrating

run the Artisan migration command 

``` bash
$ php artisan migrate
```

##### Job Queues

I'm Using Queues to send emails (speed up the app) 
however if you don't wish to use it you can change at your .env file

```
QUEUE_DRIVER=sync
```


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Hostato](http://wwww.hostato.com)
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/adamibrahim/email_confirm
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/adamibrahim/email_confirm
[link-author]: https://github.com/adamibrahim
[link-contributors]: ../../contributors