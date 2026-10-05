<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthApiControllers extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->call->database();
        $this->call->library('api');
    }

    public function login()
    {
        $data = $this->api->body();

        if (!isset($data['username']) || !isset($data['password'])) {
            $this->api->respond_error(
                'Username and password are required.',
                400
            );
        }

        $username = $data['username'];
        $password = $data['password'];

        $user = $this->db
            ->table('users')
            ->where('username', $username)
            ->get();

        if (!$user) {
            $this->api->respond_error(
                'Invalid username or password.',
                401
            );
        }

        if (!password_verify($password, $user['password'])) {
            $this->api->respond_error(
                'Invalid username or password.',
                401
            );
        }

        if (!$user['is_active']) {
            $this->api->respond_error(
                'User account is inactive.',
                403
            );
        }

        $tokens = $this->api->issue_tokens($user);

        $this->api->respond([
            'status' => true,
            'message' => 'Login successful.',
            'data' => $tokens
        ], 200);
    }
}