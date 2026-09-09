<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ProductController
 * 
 * Automatically generated via CLI.
 */
class ProductController extends Controller {
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('ProductModel');
    }

    public function index()
    {
        $products = $this->ProductModel->all();

        return $this->call->view('ProductViews/index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return $this->call->view('ProductViews/create');
    }

    public function store()
    {
        $this->ProductModel->insert([
            'product_name' => $_POST['product_name'],
            'description'  => $_POST['description'],
            'price'        => $_POST['price'],
            'quantity'     => $_POST['quantity']
        ]);

        

        return redirect('/products');
    }

    public function edit($id)
    {
        $product = $this->ProductModel->find($id);

        return $this->call->view('ProductViews/update', [
            'product' => $product
        ]);
    }

    public function update($id)
    {
        $this->ProductModel->update($id, [
            'product_name' => $_POST['product_name'],
            'description'  => $_POST['description'],
            'price'        => $_POST['price'],
            'quantity'     => $_POST['quantity']
        ]);

        return redirect('/products');
    }

    public function delete($id)
    {
        $this->ProductModel->delete($id);

        return redirect('/products');
    }
}