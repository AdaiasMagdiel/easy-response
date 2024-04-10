<?php

namespace AdaiasMagdiel\EasyResponse;

class Response
{
	public function __construct(
		private string $body = "",
		private int $statusCode = 200,
		private array $headers = []
	) {
	}

	public function getBody()
	{
		return $this->body;
	}

	public function getStatusCode()
	{
		return $this->statusCode;
	}

	public function getHeaders()
	{
		return $this->headers;
	}

	public function setStatusCode(int $statusCode)
	{
		$this->statusCode = $statusCode;
		return $this;
	}

	public function setHeader(string $header, string $value)
	{
		$this->headers[$header] = $value;
		return $this;
	}

	public function setHeaders(array $headers)
	{
		$this->headers = array_merge($this->headers, $headers);
		return $this;
	}

	public function setBody(string $body)
	{
		$this->body = $body;
		return $this;
	}

	public function send()
	{
		http_response_code($this->statusCode);

		foreach ($this->headers as $header => $value) {
			header("{$header}: {$value}");
		}

		echo $this->body;
	}

	public function html(string $content)
	{
		$this->setHeader("Content-Type", "text/html");
		$this->setBody($content);

		$this->send();
	}

	public function json(array $data)
	{
		$this->setHeader("Content-Type", "application/json");
		$this->setBody(json_encode($data));

		$this->send();
	}

	public function redirect(string $location, bool $permanent = false)
	{
		$statusCode = $permanent ? 301 : 302;

		$this->setHeader("Location", $location);
		$this->setStatusCode($statusCode);

		$this->send();
	}
}
