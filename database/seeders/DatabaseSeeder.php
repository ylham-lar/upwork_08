<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Freelancer;
use App\Models\Profile;
use App\Models\Proposal;
use App\Models\Review;
use App\Models\User;
use App\Models\Verification;
use App\Models\Work;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->create([
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => '11022008',
            ]);

        User::factory()
            ->count(19)
            ->create();

        $this->call([
            LocationSeeder::class,
            SkillSeeder::class,
        ]);

        Freelancer::factory()
            ->count(70)
            ->has(Profile::factory()->count(2))
            ->create();

        Client::factory()
            ->count(40)
            ->create();

        Work::factory()
            ->count(200)
            ->create();

        Proposal::factory()
            ->count(300)
            ->create();

        Review::factory()
            ->count(100)
            ->create();

        Verification::factory()
            ->count(100)
            ->create();
    }
}
