# Envato PHP

Envato-PHP is a PHP client for Envato API. You can easily integrate it with your all kind of PHP based projects. This package is also compatible with Laravel 5. 

## Installation

To install this package run this command in you terminal from project root

```shell
composer require nahid/envato-php
```

### For Laravel
Goto `config/app.php` and add this service provider in providers section

```php
Nahid\EnvatoPHP\EnvatoServiceProvider::class,
```

and add this facade in facades section

```php
'Envato' => Nahid\EnvatoPHP\Facades\Envato::class,
```

Run this command in your terminal

```shell
php artisan vendor:publish --provider="Nahid\EnvatoPHP\EnvatoServiceProvider"
```

after publishing your config file then open `config/envato.php` and add your envato app credentials.

```php
return [
    "client_id"     => 'envato_app_client_id',

    'client_secret' => 'envato_app_client_secret',

    "redirect_uri"  =>  'redirect_uri',
    
     'app_name'      => 'nahid-envato-app',
];
```

Thats it.


## Usages

```php
use Nahid\EnvatoPHP\Envato;

$config = [
            "client_id"     => 'envato_app_client_id',
        
            'client_secret' => 'envato_app_client_secret',
        
            "redirect_uri"  =>  'redirect_uri',
            
             'app_name'      => 'nahid-envato-app',
        ];
        
 
 $envato = new Envato($config);
 
 $user = $envato->me()->accounts();
 
 var_dump($user->data);
 ```
 
 But first you have to authenticate envato app. to get authenticate URL just use `$envato->getAuthUrl()`.
 

### For Laravel Usage
 
 ```php
 use Nahid\EnvatoPHP\Facades\Envato;
 
 $user = Envato::me()->accounts();
 dd($user->data);
 ```
 
 ```php
 // For envato purchase code verify  
 
 use Nahid\EnvatoPHP\Facades\Envato;
 
 $purchaseCode = 'purchase_code_here';
 $purchaseVerify = Envato::me()->sale($purchaseCode);
 if($purchaseVerify->getStatusCode() == 200) {
    dd($purchaseVerify->data);
 } else {
    dd("Invalid Purchase Code");
 }
 ```
 


