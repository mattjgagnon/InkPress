<?php

use App\Models\User;

class SentrySeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('users')->delete();
		DB::table('groups')->delete();
		DB::table('users_groups')->delete();

		Sentry::getUserProvider()->create(array(
			'email'			=> 'mgagnon@inkagency.com',
			'password'		=> "ink123",
			'first_name'	=> 'Matt',
			'last_name'		=> 'Gagnon',
			'activated'		=> 1,
		));

		Sentry::getGroupProvider()->create(array(
			'name'			=> 'Admin',
			'permissions'	=> array('admin' => 1),
		));

		// Assign user permissions
		$adminUser  = Sentry::getUserProvider()->findByLogin('mgagnon@inkagency.com');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admin');
		$adminUser->addGroup($adminGroup);
	}

}