<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->newUser('admin', 'admin');

        factory(User::class, 5)->create();
    }

    private function newUser(string $role, string $name) {
        $user = new User();
        $randomStr = str_random(10);

        $user->role = $role;
        $user->name = $name.$randomStr;
        $user->email = $name.$randomStr.'@yahoo.com';
        $user->password = bcrypt($name.$randomStr);
        $user->gender = 'Male';
        $user->profile_picture = $name.$randomStr.'.png';

        $user->save();
    }
}
