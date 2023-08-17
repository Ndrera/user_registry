<?php

namespace UserRegistry\Repository;

use Carbon\Carbon;
use UserRegistry\User;

class UserRepository implements IUserRepository {

    /**
     * FETCH ALL USERS 
     */
    public function getAllUsers(){

        return User::all();
    }

    /**
     * CREATE A NEW USER 
     */
    public function createUser( array $data ){
      
        User::insert([
            'name'           => $data['name'],
            'surname'        => $data['surname'],
            'email'          => $data['email'],
            'position'       => $data['position'],
            'password'       => bcrypt( rand(100,999) ),
            'remember_token' => null, 
            'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => null,
           
        ]);
    }

    /**
     * DELETE A USER 
     */
    public function deleteUser( $id ){
         return User::find($id)->delete();
    }
    

}