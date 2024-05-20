

## About Csr

this project implement with laravel 10 and mysql ... 
n this project we use rakutentech/laravel-request-docs for apis.
you can watch apis in this address: http://127.0.0.1:8000/request-docs


## About Guest And Users

In this project we assume that in future guests have panels, so we saved basic data in users table and save extra data in guests table.
you can run sample users via it's seed.

## Reservation

including user_id, room_id, check_in, check_out, discount, promotion_id, tax, final_price

total_price : calculating based on roomPrice * nightCount to stay.
final_price : calculate is based on discount,tax, total_price.

## Run
to run project you must run bellow command:

#### composer install
#### php artisan key:generate

### for database:
you can use sample that placed in 'sql file' in csr/database path or run ``php artisan db|seed``


