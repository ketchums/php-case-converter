## About
php-case-converter is a library which converts strings to other case types.

## Requirements
- PHP >= 7.4


## Installation

Installing with composer
```
composer require ketchums/php-case-converter
```

## Issues

Bug reports and feature requests can be submitted on the [Github Issue Tracker](https://github.com/ketchums/php-case-converter/issues).

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) for information.

## Versioning

php-case-converter uses a `MAJOR.MINOR.PATCH` version number format.

## Example

Example 1:
```
$caseConvert = new CaseConverter('some.cool.string');

echo $caseConvert->toPascalCase(); // someCoolString
echo $caseConvert->toKebabCase(); // some-cool-string
```