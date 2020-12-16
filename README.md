# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jzpeepz/eloquent-search.svg?style=flat-square)](https://packagist.org/packages/jzpeepz/eloquent-search)
[![Build Status](https://img.shields.io/travis/jzpeepz/eloquent-search/master.svg?style=flat-square)](https://travis-ci.org/jzpeepz/eloquent-search)
[![Quality Score](https://img.shields.io/scrutinizer/g/jzpeepz/eloquent-search.svg?style=flat-square)](https://scrutinizer-ci.com/g/jzpeepz/eloquent-search)
[![Total Downloads](https://img.shields.io/packagist/dt/jzpeepz/eloquent-search.svg?style=flat-square)](https://packagist.org/packages/jzpeepz/eloquent-search)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require jzpeepz/eloquent-search
```

Publish the config file:

```bash
php artisan vendor:publish --tag=eloquent-search-config
```

Publish the views so you can customize:

```bash
php artisan vendor:publish --tag=eloquent-search-views
```

You might need to copy this route to your routes file if you need to add middleware or customize the search uri:

```php
Route::get('/search', ['as' => 'eloquent-search', 'uses' => '\Jzpeepz\EloquentSearch\Http\Controllers\SearchController@index']);
```

Include the search box in your views:

```php
@include('eloquent-search::search-box')
```

## Usage

# Getting Started

To make a model searchable, it needs to use the `App\Traits\Searchable` trait.

All searchable models must also be included in the `config/eloquent-search.php` file. This allows search abstracts to be generated with the command below.

**NOTE:** An exception will be thrown if any searchable models do not have `url()` or `getSearchDescription()` methods. See the customization section for more on those methods.

# Initializing Search

Run the following command to initialize search abstracts for all searchable models.

`php artisan search:init`

# Customization

## What Gets Searched

By default, all attributes in the model will get lumped into the abstract that is searched.

To customize what gets searched, override the `getSearchAbstract()` method to return a string that should be searched.

## Search Results

### Description (required)

Add a `getSearchDescription()` method to your model that returns the description you would like.

### URL (required)

Add a `url()` method to your model. This provides the URL that is linked to in search.

### Title

By default, Searchable will attempt to determine a good title for the result.

To customize, override the `getSearchTitle()` method on your model.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email jonathan@flex360.com instead of using the issue tracker.

## Credits

- [Jonathan Peoples](https://github.com/jzpeepz)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).