<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    // Show login page
    public function login()
    {
        $session = session();
        if ($session->get('isLoggedIn')) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('login');
    }

    // Handle login form submission
    public function attempt()
    {
        $request = $this->request;
        $email = trim((string) $request->getPost('email'));
        $password = (string) $request->getPost('password');

        if (empty($email) || empty($password)) {
            return redirect()->back()->with('login_error', 'Email and password are required.');
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session = session();
            $session->set([
                'isLoggedIn' => true,
                'userEmail'  => $user['email'],
                'userName'   => $user['name'],  // optional, for display
            ]);

            return redirect()->to(base_url('dashboard'));
        }

        return redirect()->back()->with('login_error', 'Invalid credentials');
    }

    // Logout user and redirect to home
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/')); // redirect to Home
    }

    // Show registration page
    public function register()
    {
        $session = session();
        if ($session->get('isLoggedIn')) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('register');
    }

    // Handle registration form submission
    public function store()
    {
        $request = $this->request;
        $name = trim((string) $request->getPost('name'));
        $email = trim((string) $request->getPost('email'));
        $password = (string) $request->getPost('password');
        $passwordConfirm = (string) $request->getPost('password_confirm');

        // Basic validation
        if (empty($name) || empty($email) || empty($password) || empty($passwordConfirm)) {
            return redirect()->back()->withInput()->with('register_error', 'All fields are required.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withInput()->with('register_error', 'Invalid email address.');
        }

        if ($password !== $passwordConfirm) {
            return redirect()->back()->withInput()->with('register_error', 'Passwords do not match.');
        }

        $userModel = new UserModel();

        // Check if email is already registered
        if ($userModel->where('email', $email)->first()) {
            return redirect()->back()->withInput()->with('register_error', 'Email is already registered.');
        }

        // Hash password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $userId = $userModel->insert([
            'name'     => $name,
            'email'    => $email,
            'role'     => 'student',
            'password' => $passwordHash,
        ], true);

        if (!$userId) {
            return redirect()->back()->withInput()->with('register_error', 'Registration failed. Please try again.');
        }

        // Redirect to login with success message
        return redirect()->to(base_url('login'))
            ->with('register_success', 'Account created successfully. Please log in.');
    }
}
