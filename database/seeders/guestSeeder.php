<?php

namespace Database\Seeders;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class guestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guests')->delete();
        Guest::factory()->count(2)->create();

    }
}
