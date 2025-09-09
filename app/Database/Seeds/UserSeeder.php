<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Get the database table
        $users = [
            [
                'name'     => 'Admin User',
                'email'    => 'admin@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'     => 'John Student',
                'email'    => 'student@example.com',
                'password' => password_hash('student123', PASSWORD_DEFAULT),
                'role'     => 'student',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'     => 'Jane Instructor',
                'email'    => 'instructor@example.com',
                'password' => password_hash('teacher123', PASSWORD_DEFAULT),
                'role'     => 'teacher',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert batch into the users table
        $this->db->table('users')->insertBatch($users);
    }
}
