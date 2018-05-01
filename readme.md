<p align="center"><a href="https://koselig.github.io/documentation/" target="_blank"><img src="https://i.imgur.com/qomjDtC.png"></a></p>

<p align="center">
<a href="https://travis-ci.org/koselig/library"><img src="https://travis-ci.org/koselig/library.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/koselig/library"><img src="https://poser.pugx.org/koselig/library/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/koselig/library"><img src="https://poser.pugx.org/koselig/library/v/unstable.svg" alt="Latest Stable Version"></a>
</p>

## What is this?

This is your standard [Laravel](https://laravel.com/) install but with a few little extras 😉. Koselig is your gateway to Wordpress from Laravel. When a user makes a request, Koselig will boot Wordpress and attempt to match the page Wordpress thinks its on with a Laravel route you define (Koselig provides route methods such as Template, Page Type, Post ID, etc). From that point on, you're in Laravel world but with full access to Wordpress and all the functions that Wordpress exposes.

But we know that's not good enough; Wordpress' API is straight up ugly and doesn't know which paradigm it's following. Koselig attempts to abstract Wordpress away from you, the developer, by providing a beautiful interface to call into Wordpress code. An [auth guard](https://laravel.com/docs/5.6/authentication) has been defined for Wordpress, Eloquent models for Wordpress have been setup and we have proxies for everything that doesn't make sense to rewrite to make them PSR2 compliant.

If you've never used Laravel before you should definitely read over their [docs](https://laravel.com/docs/master), it'll make your life as a PHP developer so much better. While we're on the topic of docs, [here's ours](https://koselig.github.io/documentation/) (they're not as good as Laravel's though sorry ☹️)

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com).

If you discover a security vulnerability within Koselig, please send an e-mail to Jordan Doyle via [jordan@doyle.la](mailto:jordan@doyle.la).

If you discover a security vulnerability within Wordpress, please report it on [Hackerone](https://hackerone.com/wordpress).

All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Koselig is licensed under the [WTFPL](http://www.wtfpl.net/).
