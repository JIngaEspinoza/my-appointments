<?php

use Illuminate\Database\Seeder;
Use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => 'Jonadab',
        'email' => 'jingaespinoza@gmail.com',
        'password' => bcrypt('123123'),
        'dni' => '47361628',
        'address' => 'JR. Caolin 385',
        'phone' => '+51963749505',
        'role' => 'admin',
      ]);
      factory(User::class, 50)->create();
    }
}
