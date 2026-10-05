<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductControllers extends Controller {

    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('ProductModels');
    }

    public function login()
    {
        $this->call->view('product2/login');
    }

    public function index()
    {
        $products = $this->ProductModels->all();

        $this->call->view('product2/index', [
            'products' => $products
        ]);
    }

    
    public function create()
    {
        $this->call->view('product2/create');
    }

    public function store()
    {
        $data = [
            'product_name' => $_POST['product_name'],
            'description'  => $_POST['description'],
            'price'        => $_POST['price'],
            'quantity'     => $_POST['quantity'],
            'created_at'   => date('Y-m-d H:i:s')
        ];

        $this->ProductModels->insert($data);

        header('Location: /LavaLust_/ada-angel-faith-lavalust/products2');
    exit;
    }

    public function edit($id)
    {
        $product = $this->ProductModels->find($id);

        if (!$product) {
            die('Product not found.');
        }

        $this->call->view('product2/edit', [
            'product' => $product
        ]);
    }

    public function update($id)
    {
        $data = [
            'product_name' => $_POST['product_name'],
            'description'  => $_POST['description'],
            'price'        => $_POST['price'],
            'quantity'     => $_POST['quantity']
        ];

        $this->ProductModels->update($id, $data);

        header('Location: /LavaLust_/ada-angel-faith-lavalust/products2');
        exit;
    }

    public function delete($id)
    {
        $this->ProductModels->delete($id);

        header('Location: /LavaLust_/ada-angel-faith-lavalust/products2');
        exit;
    }
}