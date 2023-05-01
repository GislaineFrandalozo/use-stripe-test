<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Plan Test', 
            'slug' => 'plan-test', 
            'stripe_plan' => 'price_1N2nVaFWcz9ZHeiFURtqH6sE', 
            'price' => 8, 
            'description' => 'First plan'
        ]);
    }
}
