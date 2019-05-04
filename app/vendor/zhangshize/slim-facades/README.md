#Slim Facades

##Introduction

SlimFacades is a package to provide facades for 
[Slim PHP framework](https://www.slimframework.com).  

Facades is a noun from [Laravel](https://laravel.com)(also a PHP Framework).  Facades provide a
 "static" interface to classes that are available in the application's service 
 container.
 
Laravel facades serve as "static proxies" to underlying classes in the service 
container, providing the benefit of a terse, expressive syntax while maintaining
more testability and flexibility than traditional static methods, so does 
Slim-Facades.

##Requirement

+ PHP >= 5.5.0
+ Slim >= 3.0

##Installation

Using [composer](https://getcomposer.org/):<br>
`composer require zhangshize/slim-facades`

##Usage

After the installation, you can update your code like this:

```php
    //... Something not important ...
    use SlimFacades\Facade;
    use SlimFacades\Route;
    use SlimFacades\App;
    
    $app = new \Slim\App(/*...*/);
    // initialize the Facade class
    Facade::setFacadeApplication($app);
    
    Route::get('/', function (Request $req, Response $res) {
        $res->getBody()->write("Hello");
        return $res;
    });
    
    App::run();
```

##Default Facades

The following facades are provided by Slim-Facades:

###App

Use it just like using $app!

```php
    App::run();
```

###Container

Use it just like using $container!

```php
    Container::hasService('view');
```

###Route

```php
    Route::get('/', function (Request $req, Response $res) {
        $res->getBody()->write("Hello");
        return $res;
    });
```

###Request

```php
    $method = Request::getMethod();
```

###Response

```php
    Response::withStatus(302);
```

###Setting

There are some special method is the following:

####get($key = null)

```php
    /**
     * Get the settings value.
     * If $key = null, this function returns settings.
     * @param string|null $key
     * @return mixed
     */
    public static function get($key = null)
    {
        // ...
    }
```

#####Usage

```php
    Settings::get()['db'];
    Settings::get('db');
    //The same result.
```

####set($key, $value)

```php
    /**
     * Set the settings value.
     * When $key is an array, it will be viewed to a list of keys.  <br>
     * For Example:
     * $key = ['a','b']; <br>
     * The function will set the value of $container->settions['a']['b'].
     * @param array|string $key
     * @param mixed $value
     */
    public static function set($key, $value)
    {
        // ...
    }
```

#####Usage

```php
    $container['settings']['db']['host'] = 'localhost';
    Settings::set(['db', 'host'], 'localhost');
    //The same result.
```

###View and Log

If you want to use them, you should set 'view' and 'logger' services in the
container or change the value which returned by ``getFacadeAccessor()``.

##Custom Facades

The code for creating a custom facades for a service in the container is the 
following:

```php
using SlimFacades\Facade;
class CustomFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        //Change 'serviceName' to you want.
        return 'serviceName';
    }
}
```

The code for creating a custom facades for an instance is the following:

```php
using SlimFacades\Facade;
class CustomFacade extends Facade
{
    public static function self()
    {
        //Change the returned value to you want.
        return self::$app->getContainer()->get('myservice');
    }
}
```

##Licence

[Apache License Version 2.0.](LICENSE)

Copyright [2016] [zhangshize]

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
