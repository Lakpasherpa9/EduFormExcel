<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class mailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Smtp ko lagi Change nagarne Aru MailChimp ya Phpmailer vayo vane matra change garne .
        mail::create([
            'mail_transport'            =>'smtp',
            'mail_host'                 =>'smtp.mailtrap.io',
            'mail_port'                 =>'2525',
            'mail_username'             =>'d7d70db9672626',
            'mail_password'             =>'95434b205cd44d',
            'mail_encryption'           =>'tls',
            'mail_from'                 =>'sachinshrestha@kcc.edu.np',
        ]);

    }
}
