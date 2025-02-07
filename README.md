## Prerequisites
- Before you begin, ensure you have met the following requirements:

- PHP 8.1
- Composer 2.3.10
- Laravel 10.10

## Installation
- Clone this repository: git clone https://github.com/EzmemmedQasimov/bond-managment.git
- Navigate to the project directory: cd bond-managment
- Install Composer dependencies: composer install
- Create a copy of the .env.example file and rename it to .env.
- Generate an application key: php artisan key:generate

## Configuration

- DB_DATABASE: Configure database name at .env file
- DB_USERNAME: Configure mysql username at .env file
- DB_PASSWORD: Configure mysql password at .env file

## Usage

- php artisan migrate
- php artisan db:seed
- php artisan serve


## Routes

1. Get - Bond Payouts
- Route: /api/bond/{id}/payouts
- Controller Method: BondController@payouts
- Route Name: bond.payouts


2. Post - Bond Order
- Route: /api/bond/{id}/order
- Controller Method: BondController@order
- Route Name: bond.order


3. Post - Bond Order Amount
- Route: /api/bond/order/{id}
- Controller Method: BondController@amount
- Route Name: bond.amount

