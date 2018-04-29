<?php

namespace Panel\Data;

class Blocks implements \Panel\ApiInterface
{

	public function handle(array $request)
	{
		$properties = [
			'global' => [
				'background' => true,
			],
			'pl' => [
				'text' => [
					'html' => '<h1>Test PL</h1>',
					'plain' => 'Test PL',
				],
			],
			'en' => [
				'text' => [
					'html' => '<h1>Test EN</h1>',
					'plain' => 'Test EN',
				],
			],
		];
		
		return [
			[
				'id' => 1,
				'type' => 'text',
				'properties' => $properties,
			],
			[
				'id' => 2,
				'type' => 'text',
				'properties' => $properties,
			]
		];
	}

}
