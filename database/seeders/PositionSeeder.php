<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            ['title' => 'Manager', 'base_salary' => 15000000],
            ['title' => 'Supervisor', 'base_salary' => 10000000],
            ['title' => 'Senior Staff', 'base_salary' => 8000000],
            ['title' => 'Staff', 'base_salary' => 6000000],
            ['title' => 'Intern', 'base_salary' => 2500000],
        ];

        foreach ($positions as $position) {
            Position::create(['title' => $position['title'], 'base_salary' => $position['base_salary']], $position);
        }
    }
}
