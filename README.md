# Simple-Router

## Installation

### Connect the file "Router.php"

```php
require 'Router/Router.php';
```
### Setting up Nginx
If you are using Nginx please make sure that url-rewriting is enabled.

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```
### Setting up Apache
Nothing special is required for Apache to work. We've include the .htaccess file in the public folder. If rewriting is not working for you, please check that the mod_rewrite module (htaccess support) is enabled in the Apache configuration.

```apache
RewriteEngine on
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteCond %{SCRIPT_FILENAME} !-l
RewriteRule ^(.*)$ index.php/$1
```


## Usage

### Create a 404 error page and link it to the router
```php
Router::page_404($path);
```

### Add a url-link. Repeat this step as much as you need
```php
Router::add($route, $path);
```

### Activate the router
```php
Router::run();
```

### You can also see all available routes
```php
Router::display_all();
```