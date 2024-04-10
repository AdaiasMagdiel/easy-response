<?php

use AdaiasMagdiel\EasyResponse\Response;

it("should set status code correctly", function () {
	$response = new Response();
	$response->setStatusCode(404);

	expect($response->getStatusCode())->toBe(404);
});

it("should set header correctly", function () {
	$response = new Response();
	$response->setHeader("Content-Type", "text/plain");

	expect($response->getHeaders()["Content-Type"])->toBe("text/plain");
});

it("should set headers correctly", function () {
	$response = new Response();
	$response->setHeader("Content-Type", "text/plain");
	$response->setHeader("Cache-Control", "no-cache");

	$response->setHeaders(["Content-Length" => 100]);

	expect($response->getHeaders())->toBe([
		"Content-Type" => "text/plain",
		"Cache-Control" => "no-cache",
		"Content-Length" => 100,
	]);
});

it("should set body correctly", function () {
	$response = new Response();
	$response->setBody("Hello, World!");

	expect($response->getBody())->toBe("Hello, World!");
});

it("should send response correctly", function () {
	$response = new Response();
	$response->setBody("Test Body");
	$response->setHeader("Content-Type", "text/plain");
	ob_start();
	$response->send();
	$output = ob_get_clean();

	expect($output)->toBe("Test Body");
});

it("should render HTML response correctly", function () {
	$response = new Response();
	ob_start();
	$response->html("<h1>Hello, World!</h1>");
	$output = ob_get_clean();

	expect($output)->toContain("<h1>Hello, World!</h1>");
});

it("should render JSON response correctly", function () {
	$response = new Response();
	ob_start();
	$response->json(["message" => "Hello, World!"]);
	$output = ob_get_clean();

	expect($output)->toBe('{"message":"Hello, World!"}');
});

it("should redirect correctly", function () {
	$response = new Response();
	$response->redirect("https://example.com", true);

	expect($response->getHeaders())->toHaveKey("Location");
	expect($response->getHeaders()["Location"])->toBe("https://example.com");
});
