<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class SuperUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = [
            "super1.user@phonebook-apps.com",
            "super2.user@phonebook-apps.com",
            "super3.user@phonebook-apps.com",
            "super4.user@phonebook-apps.com",
            "super5.user@phonebook-apps.com",
            "super6.user@phonebook-apps.com",
            "super7.user@phonebook-apps.com",
            "super8.user@phonebook-apps.com",
        ];
        foreach($email as $a) {
            $checkEmailAvailable = User::where("email", $a)->first();
            if(!$checkEmailAvailable) {
                $createSuperUser = new User();
                $createSuperUser->email = $a;
                $createSuperUser->password = bcrypt("adminadmin");
                $createSuperUser->phonenumber = "087882179218";
                $createSuperUser->type_user = 1;
                $createSuperUser->save();
            }
        }
    }
}
