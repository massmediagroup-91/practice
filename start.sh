#!/bin/bash

composer update
php artisan migrate
php artisan key:generate




