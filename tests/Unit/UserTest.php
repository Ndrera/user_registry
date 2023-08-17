<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use UserRegistry\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_fetch_all_users()
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function test_user_duplication(){
        $user1 = User::make([
                'name'           => 'Dela',
                'surname'        => 'Lingode',
                'email'          => 'lingode@manymail.co.za',
                'position'       => 'Tester',
                'password'       => bcrypt( rand(100,999) ),
                'remember_token' => null, 
                'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'     => null,
               
        ]);

        $user2 = User::make([
            'name'           => 'Ndaba',
            'surname'        => 'Nomu',
            'email'          => 'Nomu@manymail.co.za',
            'position'       => 'Front End Dev',
            'password'       => bcrypt( rand(100,999) ),
            'remember_token' => null, 
            'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => null,
           
        ]);

        $this->assertTrue( $user1->email != $user2->email );


    }


    




}
