<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\User;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * 
     * @return void
     */
    public function run() {
        Department::factory(3)->create();
        $users = User::factory(10)->create();
        foreach ($users as $u) {
            $dep = Department::inRandomOrder()->take(2)->pluck('id');
            foreach ($dep as $d) {
                $u->department()->create(['department_id'=>$d]);
            }
        }
        
    }

}
