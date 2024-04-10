# Easy Response

Easy Response is a PHP library designed to streamline HTTP responses, making it easier to handle requests and deliver appropriate content. This library provides a simple and intuitive interface for creating and sending HTTP responses, including HTML, JSON, and redirects.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Class Overview](#class-overview)
- [Tests](#tests)
- [Contributing](#contributing)
- [License](#license)

## Installation

To install Easy Response, you can use Composer. Run the following command in your project directory:

```bash
composer require adaiasmagdiel/easy-response
```

## Usage

### Basic Usage

To use Easy Response, you first need to include the library in your project. Then, you can create a new `Response` object and use its methods to set the response body, status code, and headers. Finally, you can send the response using the `send` method.

```php
<?php

require 'vendor/autoload.php';

use AdaiasMagdiel\EasyResponse\Response;

$response = new Response();
$response->setBody("Hello, World!")
         ->setStatusCode(200)
         ->setHeader("Content-Type", "text/plain");

$response->send();
```

### HTML Response

To send an HTML response, you can use the `html` method. This method automatically sets the `Content-Type` header to `text/html`.

```php
$response->html("<h1>Hello, World!</h1>");
```

### JSON Response

For JSON responses, use the `json` method. This method automatically sets the `Content-Type` header to `application/json`.

```php
$response->json(["message" => "Hello, World!"]);
```

### Redirects

To redirect the user to another URL, use the `redirect` method. You can specify whether the redirect should be permanent (HTTP 301) or temporary (HTTP 302). All redirects are temporary by default.

```php
$response->redirect("https://example.com", true); // Permanent redirect
```

## Class Overview

### Constructor

- **$body** (string): The response body.
- **$statusCode** (int): The response status code.
- **$headers** (array): The response headers.

### Methods

- **getBody()**: Get the response body.
- **getStatusCode()**: Get the response status code.
- **getHeaders()**: Get the response headers.
- **setStatusCode(int $statusCode)**: Set the response status code.
- **setHeader(string $header, string $value)**: Set a single header.
- **setHeaders(array $headers)**: Set multiple headers.
- **setBody(string $body)**: Set the response body.
- **send()**: Send the response with status code, headers, and body.
- **html(string $content)**: Render an HTML response.
- **json(array $data)**: Render a JSON response.
- **redirect(string $location, bool $permanent = false)**: Redirect to a new location with optional permanent flag.

## Tests

Easy Response includes a suite of unit tests to ensure the library works as expected. To run the tests, you can use Pest PHP.

```bash
./vendor/bin/pest
```

## Contributing

Contributions are welcome.

## License

Easy Response is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
