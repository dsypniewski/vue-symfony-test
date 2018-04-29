<?php

namespace Panel\Data;

class Notifications implements \Panel\ApiInterface
{

	public function handle(array $request)
	{
		return [
			[
				'id' => 1,
				'name' => 'Test',
				'code' => 'test',
			],
			[
				'id' => 2,
				'name' => 'Test2',
				'code' => 'test2',
			]
		];
	}

}
