<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Publication;
use Database\Factories\PublicationFactory;
use Illuminate\Database\Seeder;
use App\Models\SermonNote;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@iov.com',
        // ]);

        $this->call([
            SermonSeeder::class,
        ]);

        Publication::truncate();
        Publication::factory(20)->create();


        SermonNote::truncate();
        SermonNote::factory(50)->create();
    }
}
