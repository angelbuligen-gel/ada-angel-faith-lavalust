<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: CrudController
 * 
 * Automatically generated via CLI.
 */
class CrudController extends Controller {
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->load->model('crudModel');
        
    }

    public function index()
    {

        

        $users = $this->crudModel->all();
        
    }
}