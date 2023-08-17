<?php

namespace UserRegistry\Repository;

interface IUserRepository {

    /**
     * FETCH ALL USERS 
     */
    public function getAllUsers();

    /**
     * CREATE A NEW USER 
     */
    public function createUser( array $data );

    /**
     * DELETE A USER 
     */
    public function deleteUser( $id );



}