<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // **************************************************
        // Ussers
        $user = \App\Models\User::factory()->create([
            'first' => 'Adam',
            'last' => 'Thomas',
            'github_username' => 'codeadamca',
            'email' => 'thomasadam83@hotmail.com',
            'password' => bcrypt( value: 'password'),
        ]);

        // **************************************************
        // Cities
        \App\Models\City::factory()->create([
            'name' => 'Smart City',
            'width' => '27',
            'length' => '30',
            'user_id' => $user,
        ]);

        \App\Models\City::factory()->create([
            'name' => 'Second City',
            'width' => '9',
            'length' => '6',
            'user_id' => $user,
        ]);

        // **************************************************
        // Settings
        $settings = array(
            [
                'name' => 'GITHUB_ACCOUNTS',
                'value' => 'codeadamca,BrickMMO',
            ],[
                'name' => 'BRICKSUM_WORDS',
                'value' => 'brick, block, plate, tile, slope, wedge, corner, arch, beam, panel, fence, bar, stud, baseplate, grille, pillar',
            ]
        );

        foreach($settings as $key => $value)
        {
            \App\Models\Setting::factory()->create([
                'name' => $value['name'],
                'value' => $value['value'],
            ]);
        }
        
    }
}
