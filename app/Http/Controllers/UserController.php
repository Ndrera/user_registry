<?php

namespace UserRegistry\Http\Controllers;

use UserRegistry\Repository\IUserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $user;

    /**
     * CONSTRUCTOR 
     */
    public function __construct( IUserRepository $user ){
        $this->user  = $user;
    }

    /**
     * LANDING 
     */
    public function index(){
        $users = $this->user->getAllUsers();

        return view('index')->with('users', $users);
    }

    /**
     * CREATE USER 
     */
    public function create(){
        return view('create');
    } 

    /**
     * STORE USER 
     */
    public function store( Request $request ){
        $request->validate([
            'name'     => 'required',
            'surname'  => 'required',
            'email'    => 'required',
            'position' => 'required'
        ]);

        $data = $request->all();
        $this->user->createUser($data);

        return redirect('/users');
    } 

    /**
     * DELETE USER 
     */
    public function delete(  $id ){
        $this->user->deleteUser($id);

        return redirect('/users');
    }


}
