# Redundancy Index

#### Website for practicing unit testing with PHP for Epicodus, 02/17/17

#### By Keith Evans

## Description

This website accepts a string and a word from a user and returns the number of times that word appears in the string.


## Setup/Installation Requirements
1. Clone GitHub repository.
2. Set project root as working directory.
3. Run `$ composer install --prefer-source --no-interaction`.
4. Run `$ cd web`.
5. Run `$ php -S localhost:8000`.
6. Visit **`localhost:8000`** in web browser.


## Technologies Used

Bootstrap

jQuery

PHP

Silex

Twig

Composer

## Specs

|Behavior|Reasoning|Input|Output|
|--------|---------|-----|------|
|The app will accept a single letter string and return 1 if it matches a second single-letter string|two perfectly identical strings are the easiest match possible|"a", "a"|1|
|The app will accept a multi-letter string and return 1 if it matches another multi-letter string|Almost identical to the previous test, this spec will control for differences in behavior with multiple letters|"art", "art"|1|
|The app will be able to tally one instance of the word in a longer string|this can test iteration through a string separately from tallying multiple instances of the word|"art", "i like art"|1|
|The app will be able to tally multiple instances of a word in a string|without incorporating too many of the other specs, this will be able to narrow down a failed test to having multiple words|"art", "i like art because art is cool"|2|
|The app will be able to make matches regardless of capitalization|assuming the previous tests are passing, the only difference here is capitalization|"Art", "aRT is my favorite because I love ArT"|2|
|The app will be able to match words regardless of punctuation|similar reasoning to above test|"art","Who doesn't love art?"|1|
|The app will not tally partial instances of the input word|this example has many partial matches for "art", but will show that only the word itself will result in a tally|"art", "apart from the cart, the artist got his start at the art mart"|1|


## Known Bugs

_No known bugs or issues_

### License

Copyright (c) 2017 _**Keith Evans**_

This software is licensed under the MIT license.
