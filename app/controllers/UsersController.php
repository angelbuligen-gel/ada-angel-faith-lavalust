<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UsersController
 * 
 * Automatically generated via CLI.
 */
class UsersController extends Controller {
    public function __construct()
    {
        parent::__construct();

       
        $this->call->model('UsersModel');
        
    }


    public function profile(){
        
        $this->call->view('users/index');
    }

    public function index()
    {
       
        $users = $this->UsersModel->all();
        //var_dump($users); 

        $this->call->view('users/index', [
            'users' => $users
        ]); 
        
    }

}