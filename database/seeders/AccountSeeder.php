<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        Account::firstOrCreate(['username' => 'admin'], [
            'nama' => 'admin',
            'password' => 'lupa',
            'role' => 'ADMIN'
        ]);

        Account::firstOrCreate(['username' => 'admin_rpla'], [
            'nama' => 'Wahyu',
            'password' => 'rpla',
            'role' => 'ADMIN A'
        ]);

        Account::firstOrCreate(['username' => 'admin_rplb'], [
            'nama' => 'Kevin',
            'password' => 'rplb',
            'role' => 'ADMIN B'
        ]);

        Account::firstOrCreate(['username' => 'admin_rplc'], [
            'nama' => 'Edrus',
            'password' => 'rplc',
            'role' => 'ADMIN C'
        ]);

        Account::firstOrCreate(['username' => 'guest'], [
            'nama' => 'Asep',
            'password' => 'guest',
            'role' => 'GUEST'
        ]);
    }
}
