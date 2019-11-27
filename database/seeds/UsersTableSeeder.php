<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = factory(App\User::class)->create([
        	'email' => 'administrator@example.com',
	    ]);
	    $admin->assign('administrator');

	    $userManager = factory(App\User::class)->create([
	        'email' => 'user@example.com'
	    ]);
	    $userManager->assign('user-manager');

	    $shopManager = factory(App\User::class)->create([
	        'email' => 'shop@example.com'
	    ]);
	    $shopManager->assign('shop-manager');
    }
}
