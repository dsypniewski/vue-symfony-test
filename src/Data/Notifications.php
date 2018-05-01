<?php

namespace Panel\Data;

class Notifications implements \Panel\ApiInterface
{

	public function handle(array $request)
	{
		return [
			[
				'id' => 1,
				'name' => 'Account created',
				'code' => 'account_created',
			],
			[
				'id' => 2,
				'name' => 'Order confirm',
				'code' => 'order_confirm',
			],
		];
	}

}
