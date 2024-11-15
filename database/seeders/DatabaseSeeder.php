<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\City;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Panel;
use App\Models\Qr;
use App\Models\Schedule;
use App\Models\Segment;
use App\Models\ScheduleLog;
use App\Models\Road;
use App\Models\Track;

use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // **************************************************
        // Ussers
        $user = User::factory()->create([
            'first' => 'Doe',
            'last' => 'Thomas',
            'url' => 'janedoe',
            'session_id' => rand(1000000000, 9999999999),
            'github_username' => '',
            'email' => 'janedoe@email.com',
            'password' => '$2y$10$1oyAGH/Ffv.O/YPzZtJlR.PdmutrNiR5OAyyV4llUUno6GGR9fMK.',
            'admin' => 0,
        ]);

        $user = User::factory()->create([
            'first' => 'Adam',
            'last' => 'Thomas',
            'session_id' => rand(1000000000, 9999999999),
            'github_username' => '',
            'email' => 'thomasadam83@hotmail.com',
            'password' => '$2y$10$1oyAGH/Ffv.O/YPzZtJlR.PdmutrNiR5OAyyV4llUUno6GGR9fMK.',
            'admin' => 1,
        ]);

        // **************************************************
        // Cities
        $city = City::factory()->create([
            'name' => 'Smart City',
            'width' => '27',
            'height' => '30',
            'url' => 'smartcity',
            'date_at' => Carbon::now(),
            'date_multiplier' => 1,
            'image' => '',
            'user_id' => $user,
        ]);

        $city->users()->save($user);
        $user->city_id = $city->id;

        $city = City::factory()->create([
            'name' => 'Second City',
            'width' => '9',
            'height' => '6',
            'url' => '',
            'date_at' => Carbon::now(),
            'date_multiplier' => 1,
            'image' => '',
            'user_id' => $user,
        ]);

        $city->users()->save($user);

        // **************************************************
        // Tags
        Tag::factory()->create(['name' => 'city']);
        Tag::factory()->create(['name' => 'harry potter']);
        Tag::factory()->create(['name' => 'starwars']);
        Tag::factory()->create(['name' => 'minecraft']);
        Tag::factory()->create(['name' => 'marvel']);

        // **************************************************
        // Settings
        $settings = array(
            [
                'name' => 'GITHUB_ACCOUNTS',
                'value' => 'codeadamca, BrickMMO',
            ],[
                'name' => 'GITHUB_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'GITHUB_REPOS_SCANNED',
                'value' => 0,
            ],[
                'name' => 'GITHUB_ACCESS_TOKEN',
                'value' => '',
            ],[
                'name' => 'GOOGLE_ACCESS_TOKEN',
                'value' => '',
            ],[
                'name' => 'GOOGLE_DRIVE_VIDEO',
                'value' => 'STOCK_VIDEO,1351-DxRjX_siFqLzSiQGwT1SzwuXDwel',
            ],[
                'name' => 'GOOGLE_DRIVE_IMAGE',
                'value' => 'STOCK_IMAGE,1k7lntYThFwsWoheP9_fYoS84vWPCjwj6',
            ],[
                'name' => 'GOOGLE_DRIVE_AUDIO',
                'value' => 'STOCK_AUDIO,12Z9LraPPRno2ZGt3DL3nZ5cIb8ur0XJd',
            ],[
                'name' => 'BRICKSUM_WORDLIST',
                'value' => 'brick, stud, tube, plate, slope, tile, technic, axle, gear, minifigure, connector, baseplate, corner, hinge, wedge, beam, bush, pin, element, knob, plate, cylinder, cone, bar, bracket, jumper, window, door, roof, panel, flag, antenna, wheel, arch, container, holder, clip, arm, seat, vehicle, propeller, horn, dish, radar, whip, hose, harpoon, fork, tail, knife, sword, axe, hammer, tool, wrench, screwdriver, spanner, chainsaw, saw, shovel, pickaxe, binoculars, camera, flashlight, lantern, magnifying, glass, compass, map, key, gem, crystal, jewel, coin, treasure, chest, trophy, cup, medal, shield, helmet, visor, goggles, hat, cap, tiara, crown, helmet, headgear, hairpiece, beard, glasses, mask, visor, oxygen, tank, backpack, pack, sack, suitcase, briefcase, crate, barrel, bucket, shovel, rock, stone, brick, slope, head, hairpiece, helmet, visor, hat, hands, torso',
            ],[
                'name' => 'BRICKSUM_STOPWORDS',
                'value' => 'rem, sit, amet, sed, do, ut, et, qui, est, non, id, ex, nisi, pro, enim, ad, esse, irure, in, eu',
            ],[
                'name' => 'BRICKSUM_PARAGRAPHS_GENERATED',
                'value' => 0,
            ],[
                'name' => 'BRICKSUM_SENTENCES_GENERATED',
                'value' => 0,
            ],[
                'name' => 'BRICKSUM_WORDS_GENERATED',
                'value' => 0,
            ],[
                'name' => 'COLOURS_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'STORES_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'COUNTRIES_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'GOOGLE_VIDEO_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'GOOGLE_PHOTO_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ],[
                'name' => 'GOOGLE_AUDIO_LAST_IMPORT',
                'value' => '2024-07-18 13:25:36',
            ]
        );

        foreach($settings as $key => $value)
        {
            Setting::factory()->create([
                'name' => $value['name'],
                'value' => $value['value'],
            ]);
        }
        
        // **************************************************
        // Panels
        $panels = [
            [
                'port' => 'a',
                'cartridge' => null,
                'city_id' => 1,
                'value' => 'OFF',
            ],
            [
                'port' => '1',
                'cartridge' => null,
                'city_id' => 1,
                'value' => 'blue',
            ],
            ['port' => 'b', 'cartridge' => 'blue', 'city_id' => 1, 'value' => '0'],
            ['port' => 'c', 'cartridge' => 'blue', 'city_id' => 1, 'value' => '0'],
            ['port' => 'd', 'cartridge' => 'blue', 'city_id' => 1, 'value' => '0'],
            ['port' => 'b', 'cartridge' => 'red', 'city_id' => 1, 'value' => '0'],
            ['port' => 'c', 'cartridge' => 'red', 'city_id' => 1, 'value' => '0'],
            ['port' => 'd', 'cartridge' => 'red', 'city_id' => 1, 'value' => '0'],
            ['port' => 'b', 'cartridge' => 'brown', 'city_id' => 1, 'value' => '0'],
            ['port' => 'c', 'cartridge' => 'brown', 'city_id' => 1, 'value' => '0'],
            ['port' => 'd', 'cartridge' => 'brown', 'city_id' => 1, 'value' => '0'],
            ['port' => 'b', 'cartridge' => 'yellow', 'city_id' => 1, 'value' => '0'],
            ['port' => 'c', 'cartridge' => 'yellow', 'city_id' => 1, 'value' => '0'],
            ['port' => 'd', 'cartridge' => 'yellow', 'city_id' => 1, 'value' => '0'],
            ['port' => '2', 'cartridge' => 'blue', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '3', 'cartridge' => 'blue', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '4', 'cartridge' => 'blue', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '2', 'cartridge' => 'red', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '3', 'cartridge' => 'red', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '4', 'cartridge' => 'red', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '2', 'cartridge' => 'brown', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '3', 'cartridge' => 'brown', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '4', 'cartridge' => 'brown', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '2', 'cartridge' => 'yellow', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '3', 'cartridge' => 'yellow', 'city_id' => 1, 'value' => 'OFF'],
            ['port' => '4', 'cartridge' => 'yellow', 'city_id' => 1, 'value' => 'OFF'],
        ];

        foreach ($panels as $panel) {
            Panel::create($panel);
        }

        // **************************************************
        // Panels
        $qrs = [
            [
                'name' => 'Reusable QR 1',
                'hash' => '886',
                'url' => 'https://brickmmo.com',
                'image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUAAAAFACAIAAABC8jL9AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAFgUlEQVR4nO3cQY4aSxBFUWOx/y23V/ChZPKH4xbnTFuCouEqJ0/5+Pn5+QU0/f7XDwD8PQFDmIAhTMAQJmAIEzCECRjCBAxhAoaw5+s/Px6PmedYqLhRu/J9Xflcp17nFL/D/+IEhjABQ5iAIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAh7M0W+oq7boZPvc627fFdd8Xf+Tt0AkOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAEHZgC33F5P52chN76r227Xgnd9d3vV965nM5gSFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBvaQt9VcVt76p5qNnACQ5iAIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQZgv9kVO74snXOWXbXdbfyQkMYQKGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoYwAUPY0Bb6rrvZ4r3Qp5552zb7im3P8zknMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhAkYwgQMYQe20JN74KLi3dHbXueK7/wdOoEhTMAQJmAIEzCECRjCBAxhAoYwAUOYgCFMwBAmYAh73O+m3G2KG93JfbJf4CecwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhL3ZQt91x7vtc23bHhf/P9vusp7ZgTuBIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIe77+8+Sdvaf2t8W7iIvPfMW23fXk/3lmL+0EhjABQ5iAIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAh7M0WepvJ+5NPueudz9t28pOf/dTzuBcavpqAIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQ9ni9xpy8R3dy77rtmU+91ynbnrl4J/YMJzCECRjCBAxhAoYwAUOYgCFMwBAmYAgTMIQJGMIEDGEHttCTtm2Yt+2Tv/n7mrTn/m0nMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhAkYwgQMYc+Ztzm1HT21YZ68X3ry7ugrtj1zcee8572cwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhB24F7p4X/Fdbdt4T9r22Wc21U5gCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCECRjChrbQk7Y987bN8BXb7nze9hu7YuazO4EhTMAQJmAIEzCECRjCBAxhAoYwAUOYgCFMwBAmYAh7zrzN5B548k7jyY3u5D5523572/Nc+S5mfodOYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhAkYwt7cC81rk3dQ3/W+623P3HoeJzCECRjCBAxhAoYwAUOYgCFMwBAmYAgTMIQJGMIEDGFv7oXedh/vpOKG+a73bxc3zDOcwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhL3ZQl9RvFm6eKfxKXfdXZ+ybXf9mhMYwgQMYQKGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoawA1voK755N3tK8Z7qK/bcsVzkBIYwAUOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIWxoC81rk9vjK++1beN9ar89uQOfuXvcCQxhAoYwAUOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ5gt9P9u2/b4lG377UmT2+zXnMAQJmAIEzCECRjCBAxhAoYwAUOYgCFMwBAmYAgTMIQNbaG3bVnvatsdy1ds24q37qB2AkOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAEHZgC12807hock9e3EtPOvW5Pv8/O4EhTMAQJmAIEzCECRjCBAxhAoYwAUOYgCFMwBAmYAh7bFuZAtc5gSFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIewPFXuXcky02bMAAAAASUVORK5CYII=',
                'city_id' => 1,
            ],[
                'name' => 'Reusable QR 2',
                'hash' => '478',
                'url' => 'https://branding.brickmmo.com',
                'image' => 'data:image/png;base64,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',
                'city_id' => 1,
            ],[
                'name' => 'Reusable QR 3',
                'hash' => '907',
                'url' => 'https://codeadam.ca',
                'image' => 'data:image/png;base64,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',
                'city_id' => 1,
            ],
        ];

        foreach ($qrs as $qr) {
            Qr::create($qr);
        }

        // **************************************************
        // Maps
        Road::factory()->create(['name' => '39th Street']);
        Road::factory()->create(['name' => 'Second Ave']);
        Road::factory()->create(['name' => 'Diagon Alley']);

        // **************************************************
        // Tracks
        Track::factory()->create(['name' => 'Main Rail']);
        Track::factory()->create(['name' => 'Loading Dock West']);
        Track::factory()->create(['name' => 'Loading Dock East']);

        /*
        // Radio - Schedules`
        $segments = [
            ['name' => 'Traffic'],
            ['name' => 'Colours of the Day'],
            ['name' => 'Set of the Day'],
        ];

        foreach ($segments as $segment) {
            Segment::create($segment);
        }

        $schedules = [
            ['name' => 'Testing 1 - Traffic', 'segment_id' => 1, 'time' => '06:00:00', 'city_id' => 1],
            ['name' => 'Testing 2 - Colour', 'segment_id' => 2, 'time' => '06:00:00', 'city_id' => 1],
            ['name' => 'Testing 3 - Set', 'segment_id' => 3, 'time' => '06:00:00', 'city_id' => 1],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }

        // Radio - Broadcast Logs
        /*
        $broadcastLogs = [
            ['city_id' => 1, 'segment_id' => 1, 'broadcast_time' => Carbon::now()->toDateTimeString(), 'content' => 'Welcome to the Morning Talk Show on Brick City FM!'],
            ['city_id' => 1, 'segment_id' => 2, 'broadcast_time' => Carbon::now()->addHours(6)->toDateTimeString(), 'content' => 'Here are your top hits for lunch on Brick City FM!'],
            ['city_id' => 1, 'segment_id' => 3, 'broadcast_time' => Carbon::now()->addHours(12)->toDateTimeString(), 'content' => 'Good evening, this is your Brick City FM Evening News!'],
            ['city_id' => 1, 'segment_id' => 4, 'broadcast_time' => Carbon::now()->addHours(11)->toDateTimeString(), 'content' => 'Latest updates on Traffic News.'],
        ];

        foreach ($broadcastLogs as $log) {
            BroadcastLog::create($log);
        }
        */
    }
}
