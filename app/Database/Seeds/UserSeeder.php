<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin Demo',
                'email' => 'admin@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role' => 'admin',
            ],
            [
                'name' => 'Peserta Demo',
                'email' => 'peserta@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role' => 'peserta',
            ],
        ];

        foreach ($users as $user) {
            $exists = $this->db->table('users')->where('email', $user['email'])->countAllResults();
            if ($exists === 0) {
                $this->db->table('users')->insert($user);
            }
        }
    }
}

