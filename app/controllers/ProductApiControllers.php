<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductApiControllers extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->model('ProductModels');
        $this->call->library('api');
        $this->api->require_jwt();
    }

    /*
    |--------------------------------------------------------------------------
    | GET /api/products
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        
        $products = $this->ProductModels->all();

        $this->api->respond([
            'status' => true,
            'data' => $products
        ], 200);
    }


    /*
    |--------------------------------------------------------------------------
    | GET /api/products/{id}
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $product = $this->ProductModels->find($id);

        if (!$product) {
            $this->api->respond_error(
                'Product not found.',
                404
            );
        }

        $this->api->respond([
            'status' => true,
            'data' => $product
        ], 200);
    }


    /*
    |--------------------------------------------------------------------------
    | POST /api/products
    |--------------------------------------------------------------------------
    */
    public function store()
    {
        $data = $this->api->body();

        if (
            !isset($data['product_name']) ||
            !isset($data['description']) ||
            !isset($data['price']) ||
            !isset($data['quantity'])
        ) {
            $this->api->respond_error(
                'All product fields are required.',
                400
            );
        }

        $product_data = [
            'product_name' => $data['product_name'],
            'description'  => $data['description'],
            'price'        => $data['price'],
            'quantity'     => $data['quantity'],
            'created_at'   => date('Y-m-d H:i:s')
        ];

        $this->ProductModels->insert($product_data);

        $this->api->respond([
            'status' => true,
            'message' => 'Product created successfully.',
            'data' => $product_data
        ], 201);
    }


    /*
    |--------------------------------------------------------------------------
    | PUT /api/products/{id}
    |--------------------------------------------------------------------------
    */
    public function update($id)
    {
        $product = $this->ProductModels->find($id);

        if (!$product) {
            $this->api->respond_error(
                'Product not found.',
                404
            );
        }

        $data = $this->api->body();

        if (
            !isset($data['product_name']) ||
            !isset($data['description']) ||
            !isset($data['price']) ||
            !isset($data['quantity'])
        ) {
            $this->api->respond_error(
                'All product fields are required.',
                400
            );
        }

        $product_data = [
            'product_name' => $data['product_name'],
            'description'  => $data['description'],
            'price'        => $data['price'],
            'quantity'     => $data['quantity']
        ];

        $this->ProductModels->update($id, $product_data);

        $updated_product = $this->ProductModels->find($id);

        $this->api->respond([
            'status' => true,
            'message' => 'Product updated successfully.',
            'data' => $updated_product
        ], 200);
    }


    /*
    |--------------------------------------------------------------------------
    | PATCH /api/products/{id}
    |--------------------------------------------------------------------------
    */
    public function patch($id)
    {
        $product = $this->ProductModels->find($id);

        if (!$product) {
            $this->api->respond_error(
                'Product not found.',
                404
            );
        }

        $data = $this->api->body();

        $update_data = [];

        if (isset($data['product_name'])) {
            $update_data['product_name'] = $data['product_name'];
        }

        if (isset($data['description'])) {
            $update_data['description'] = $data['description'];
        }

        if (isset($data['price'])) {
            $update_data['price'] = $data['price'];
        }

        if (isset($data['quantity'])) {
            $update_data['quantity'] = $data['quantity'];
        }

        if (empty($update_data)) {
            $this->api->respond_error(
                'No fields to update.',
                400
            );
        }

        $this->ProductModels->update($id, $update_data);

        $updated_product = $this->ProductModels->find($id);

        $this->api->respond([
            'status' => true,
            'message' => 'Product partially updated successfully.',
            'data' => $updated_product
        ], 200);
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE /api/products/{id}
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        $product = $this->ProductModels->find($id);

        if (!$product) {
            $this->api->respond_error(
                'Product not found.',
                404
            );
        }

        $this->ProductModels->delete($id);

        $this->api->respond([
            'status' => true,
            'message' => 'Product deleted successfully.'
        ], 200);
    }
}