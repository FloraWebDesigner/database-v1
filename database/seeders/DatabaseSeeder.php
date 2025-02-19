<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Application;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Cron;
use App\Models\Panel;
use App\Models\Qr;
use App\Models\Host;
use App\Models\Schedule;
use App\Models\ScheduleType;
use App\Models\ScheduleLog;
use App\Models\Setting;
use App\Models\Square;
use App\Models\SquareImage;
use App\Models\Tag;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // **************************************************
        // **************************************************
        // **************************************************
        // Users
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
        // **************************************************
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
        // **************************************************
        // **************************************************
        // Settings
        $settings = array(
            [
                'name' => 'GITHUB_ACCOUNTS',
                'value' => 'codeadamca,BrickMMO',
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
        // **************************************************
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
        // **************************************************
        // **************************************************
        // QR Codes
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
        // **************************************************
        // **************************************************
        // Radio
        $hosts = array(
            array('id' => 1, 'name' => 'Flora', 'voice' => 'fable','prompt' => 'Flora is cute.', 'city_id' =>1 ),
            array('id' => 2, 'name' => 'Adam', 'voice' => 'alloy','prompt' => 'Adam is always angry.','city_id' =>1 ),

        );

        foreach ($hosts as $host) {
            Host::create($host);
        }

        $types = array(
            array('id' => 1, 'name' => 'Bricksum Word of the Day', 'length' => 1, 'filename' => 'bricksum.php'),
            array('id' => 2, 'name' => 'Brix Feature', 'length' => 1, 'filename' => 'brix.php'),
            array('id' => 3, 'name' => 'City Update', 'length' => 3, 'filename' => 'city.php'),
            array('id' => 4, 'name' => 'Clock Update', 'length' => 1, 'filename' => 'clock.php'),
            array('id' => 5, 'name' => 'Colour of the Day', 'length' => 1, 'filename' => 'colour.php'),
            array('id' => 6, 'name' => 'Commercial', 'length' => 1, 'filename' => 'commercial.php'),
            array('id' => 7, 'name' => 'Control Panel Update', 'length' => 1, 'filename' => 'panel.php'),
            array('id' => 8, 'name' => 'Crypto Update', 'length' => 2, 'filename' => 'crypto.php'),
            array('id' => 9, 'name' => 'Featured Store', 'length' => 2, 'filename' => 'store.php'),
            array('id' => 10, 'name' => 'News Story', 'length' => 2, 'filename' => 'news.php'),
            array('id' => 11, 'name' => 'Place of the Day', 'length' => 1, 'filename' => 'places.php'),
            array('id' => 12, 'name' => 'QR Code', 'length' => 1, 'filename' => 'qr.php'),
            array('id' => 13, 'name' => 'Traffic', 'length' => 1, 'filename' => 'traffic.php'),
            array('id' => 14, 'name' => 'Upcoming Events', 'length' => 2, 'filename' => 'events.php'),
        );

        foreach ($types as $type) {
            ScheduleType::create($type);
        }

        $schedules = array(
            array('minute' => '00', 'city_id' => 1, 'type_id' => 4, 'host_id' => 2),  // Clock - 1
            array('minute' => '01', 'city_id' => 1, 'type_id' => 1, 'host_id' => 1), // Bricksum - 3
            array('minute' => '02', 'city_id' => 1, 'type_id' => 3, 'host_id' => 1), // City
            array('minute' => '04', 'city_id' => 1, 'type_id' => 6, 'host_id' => 1), // Commercial - 1
            array('minute' => '05', 'city_id' => 1, 'type_id' => 13, 'host_id' => 1), // Traffic - 1
            array('minute' => '07', 'city_id' => 1, 'type_id' => 2, 'host_id' => 1), // Brix - 1
            array('minute' => '08', 'city_id' => 1, 'type_id' => 10, 'host_id' => 1), // Place - 2
            array('minute' => '09', 'city_id' => 1, 'type_id' => 11, 'host_id' => 1), // Place - 2
            array('minute' => '10', 'city_id' => 1, 'type_id' => 5, 'host_id' => 1), // Colour - 2
            array('minute' => '11', 'city_id' => 1, 'type_id' => 8,'host_id' => 1), // Crypto
            array('minute' => '12', 'city_id' => 1, 'type_id' => 12, 'host_id' => 1), // QR Code - 1
            array('minute' => '13', 'city_id' => 1, 'type_id' => 6, 'host_id' => 1), // Commercial - 1
            array('minute' => '14', 'city_id' => 1, 'type_id' => 7, 'host_id' => 2), // Panel
        );

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }

        // **************************************************
        // **************************************************
        // **************************************************
        // Cron Jobs
        $user = Cron::factory()->create([
            'name' => 'Queue Next 60 Minutes of Radio',
            'when' => '1',
            'url' => '/api/radio/log/{city}',
        ]);
        

        // **************************************************
        // **************************************************
        // **************************************************
        // Applications
        $applications = array(
            [
                'name' => 'Media',
                'github' => 'media-v1',
                'url' => 'https://media.brickmmo.com/',
                'image' => '',
                'description' => '',
            ],[
                'name' => 'Console',
                'github' => 'console-v4',
                'url' => 'https://console.brickmmo.com/',
                'image' => 'data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAZAAAAFUCAYAAAAKxmpuAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAgAElEQVR42uy9d3hd1Znv/9n7dB11yerVkmxLlrvlQjCQGGNKqCEEuISSG5I7P5KQ55JMKjNMZhLCZCbDMKmTARticikGY4ONjXuXbQnZVrW6ZfXej07b+/eHrINkHUlH0pEsifV5nvNIZ+991u7ru971rvW+IBAIBAKBQCAQCAQCgUAgEAgEAoFAIPAm8jiWy26Wy2MsH6sM2YOyvV2GPEbZTPA4pvu88dJ5y7P4vMUzKs57pjyj1w3pOouFQCAQCKYOZTYKiBAMgUAgmOOC4i0BkadoW4FAIBB4Lg6yhyLhFSHxhoDI0yAWspsTl0e4cPIIF0ke4WJ7u4zB2157Q+VRbvr1PObRypjIMY923jPpXonz9u4zKt7NqTvvqbI4JiUkkxGQ8TrBBQKBQDC9FomngjEhIZmogHgiErIHv/HE2pCvwwWXPdxWHqXVMFZrZrzbjnUcU3HeM/2YZ9t5z6Rn9PN63pN9N2fSMzoZ8RiPuHhVQEYTD3kCAiKsE4FAIPCupTGSYChj/HZcIjJeARlNFOQx/noiGPJ1at0IBALBbBELeZyi4U5AFG+IyHgERB7D6nD9/Z/X31mZtmT1V/V6Q4wky1rUgXUqav+fYVxd4zog9er/6gjL3B38tcs9KQM3v5nIcbhb7+mxXY/zdrf+2rI9OeaRznuq7pU0Bec9kXs1VnniGZ2e82YSz+hsejclT6puCaTPlitIoCqqw2brqy7IzXr3m0889OkoQjIhEZG8LR67PjnzeMqi5f+pIutFY0EgEAiuPxKKraTo/LP33Lb2jUECMWkR0XpJPGSAu+55MDQxOf2XM0E8/EwSRr00bVPtZ71drEKfTaW7TxUXQyCYZei1oNcNre2cClhtKooKKrI+MTn9l3fe/ZU9ez58r5nh7oIJDRnWjvM4RxKPfgG575F0jVYffD0vpCxB7DwNPgYhHROhy6JS0+JEFToiEMwK/H0kTCPUd4pRoq1bweEEjVYf/OX7Hk3f8+F7x9xYGiPNjVHGY12MZ718zUfr5x8YfL0vZmiAPEQ8ent7qayspLGxEUVRxNPmgeUW5CvGLwgEswGjfmTxAJBlCDB/9j77BwQFXzUcrq2/J9Zgn6D1IbsTElVVR7donE60WQcxHN6O1FQ7dJ3qRN96AHPj35Atl4euUhVyO45yrOX/UW8pH3UXvsbPLuaVK1d48803OXXqFFu3bmXPnj04nc7PWttdXeTk5NDa2uq2rMrKSgDa29vp6Ojw6CJdvtx/7IPLzM3Npb6+fszfOhwO1/91dXVcvHiRvr4+qqqqhqzrvyaqax/l5eXk5eW5zq2trQ2r1era1m63j7pf9Rpzw9c08gPZWF+NzWYVb65AMAMw6MbeRqsBzdUaW1EVLWNH+5U91QjNGPuW3PwvXf0M7FC6Wo58zwP/a1FMXOK9I57s3jcIPr0HQ00J+rzT9KXfAAYTAD4NfyW862+YrIX4dB2j23wjaM0AnGx9l6M926h2XKKg9zgpxgx8tP5u9xHir0Ejg6Io7N69m/vvv5+MjAyio6NpqK9Hr9cTFNxvKJ07d46enh727NlDfHw8+/btw8/Pj6ysLJqbmzly5AjV1dU4nU727duHLMv09PRw9OhR4uLi+Oijj5BlmU8//ZTu7m6OHTvGhQsXyMjIYM+ePaSlpVFcXExOTg69vb20t7dz6tQpKisrUVWV/Px8KioqaG9vp7S0lP/+7/9m+fLlSJLE1q1biYyMpKmpiebmZv70pz8RGhqKv78/1dXV+Pv788knn5Camsr27dvx9fWloKCAioqKfhHw9aWqqgqj0YjVasVgMCBJn93Ozs5OXn75ZTo6Orhy5Qrz58//zJ5VoL3HfR9WzrnjBIXMw2jyEW+vQHCdMRkktBrpaoO4k+JLhQQHh3A+J4uoqBjXdparvpArl8s+3PnetuKBtuPgduSgj7t1k7JA5BG6rYZ8nE7HqOUZy/MAFQnQ2/uQr5S41pktOa5+d53Uh663wLWuwnqhf50KTsnBFUv+mAfsdDqx9vVhMpno6+tDr9cTHhFByzXWRkJCAqtXr6aoqAi73c6BAwcoLS2lpaUFk8lEbGws5eXlLF26lNzcXE6dOsXq1avZu3cvFouF/fv3U1NTQ3V1NTfffDOyPPQSxMfHYzabKSwsJDc3l4SEBMLDwzl79iyNjY0cOXKE3Nxc1q5dS1paGiEhIXR1dTF//nzWrFlDfHw8nZ2dLFmyhNbWVt59910CAwOH7KO7u5vy8nK0Wi3t7e1IkkReXh7R0dFoNBr6+vqGdd/5+/sTGBjI22+/zc033+zRQ7B7xxuczzrO/o/e4mLOafH2CgQzCF9fP44fPcS/vPBTgoNDRqoX5bHq8fFYIZMNhHiNgDhH/Y0tMvGz7hpZgxIR5/reZ0hhoIHsVDXYjZ+1iCN0Sa7Ws6RKhBuSxjbbtFoUVeVSURG7d+/mzJkz5ObmEhkRMeiC+3Lw4EFKSkoIDQ3FbrcTHBxMYGAgHR0dREVFERAQQEBAAOfPn8dsNhMZGcmBAweIj4+np6eHkJAQoqKiSEtL48MPP0SvHzoAraWlhZaWFnx9fQkPDycgIIDAwEBCQkJobGwkMDCQsLAwtFotBoOB5uZmQkNDaWxsZMuWLdTW1hIYGEhvby9r166lvLyc4OChrqaQkBBMJhN+fn6Eh4e7hK+iooKenh7MZvMQ62PAAgkMDOSnP/0pJ06c8OgBvev+x1m+egM3b7qPpSvWizdWIJhBSJLE/3nm+3z3+z8kcX7yCALiGEkwJrZPDwVkJKXSDvqr/cNr73/5llvv/uOIJfb1Yji+C013G33LbkKZv3jQmVnwaX4fnaOBHr8v4vBf4VplV6xktn1Am7OOVNMXSPHLGHEXyVFadFc75lpbW3nnnXeorKhAp9ezadMmNmzYMKwynQpyc3NZsmSJV8ssLS1FURQWLFiAoigUFBSQnp7u9WPvs6lUNDjdrrP09qDXG9BoteKNFQiuM6ONwBpMU4eCosDRAx99++++cf8ewHH1o1zzFz6bIzJW7KwJzQMZsVtrzFFORh+smx52v05jojf8f7ldpZMNbAj52rgVMTg4mG9961v09PSg1+sxGAzTdmO9LR4AycmftSpkWZ4S8ehvyYy8zuRjFm+tQDBD6LOpYwqI1a4yUDU7lWFdWKPNAxlzSO9EzRe3PhFljC6sqUanldBcMyxAlmX8/PymVTxmO3qt5Bq1IRAIZi42B3T2qiPO27JfXe8yI9z7QCasBVoPrQ55LPEAZEVVrmu1E+InZp57ywIJ8ZNp7BDzZgSCmY7FqmK1qei0Q2s/RVGxX9MTfbWOdvcZ9yTC0QRkJFEZTa1kRbk+AiJJEOoviwlwXiTYX8ahQFu3ImalCwQzHEXt76oac7v+vqyRUnIMjoLuUetxMp7QYSqmKgoS4OcjYdJLTIOvGo0s4WOQ0GrEQ+RVUQbCA2WCfSV6raAIFREIZiWq2j8PpKtXRf2ske/OAhk3YwmIPJ5liqrKkcHykKnzgtmNTisRoB2QFIFAMFvpMCqoqjra8N0pD6boTkRcihZg4nMjHoqq4nCoomUuEMxhNLKEViNPS2/KVBNglvEzDa2zJ1vmWAIyWmbAYT4Rg27uV6b95qATm82JkA6BYO4jSRImgwaDbvY3jk364Q1/Ru/GGtUqGW8XlifReeeueADdFjsOp4pGltDrZDTy9DVNnIqK1a6gKEK6BILpazSq9PY5UBQNJoNmtp+LV+tp7TgEYiSLRB58oecyfVYnDqeKXivjY9JOu1dABxj0GnosDuwOMcRWIPD6O26xYDSZ3K+zOdFqJHTa0avJsrIyTp48yeOPPz7qdjaHik7jfrCRqqqcO3eO0tJSMjIyMJlMhIaGYjQaJy2GHhgNyhgGhTKSYCgeFD6x1rPTSVZW1rh+43A4aGpq8nj76upq3nzzTT766COOHj3q0W/y8/P5t3/7NwoLC8e48GC1O5FlCR/jZ+KxY8eOYTelu7sbgJ6enhFvXl1dHX19feM3pwGzUYs86KlraW6m2YPrdKmocNIvmLsyamqq6e7qGrKs+FIRFovF9b28rBS73TYtlUBDfR35ebmUlZVQUV5Gfl4utTXVFBXmk5+XS/3V9fl5ufT29lJRXjbk3hQVFmC3DT/WyorPtqsoL3O779qaalco/WvLHYvWlmY6OtpFLX4defV//khvb+/IAmMbuYqsra3lpZde4tChQ3R3d7NlyxZef/31ke93l8pI7cDz589z7tw5+vr6KCkpwWKxUFFRMeSdcseLL2/jk8PnPD3didTnQ45YM0Idde3/AyHbrw3lLl9drgXke++9N3n58uWb3YnH1q1bSU9PHxZJdtSzk2Xq6uqw2+34+vqOum1HRwc7duzgkUceIT8/n23btvGVr3xl1N8cPHiQuro6nnjiCU6cOEF9fT2JiYkjdB8pWO0KBp3G1QIpKSnh1KlT1NXVkZaW5tr26aefZtmyZbz11lvExsZy4sQJjEYj//RP/8TGjRvJzMzk6NGjVFRUMG/ePA4fPkxSUhKHDx/G4XDQ2NiI0+mkoaGBs2fPIssyJ0+eJDk5GUnqb7EoKjidqquybm9vo66ulpKSYuITEjl75jRXrlQREhrKJ3v3YPb15cjhg6xYucolBJ9mZ5E4P4kTx47Q0tKMTq/n7JlMWltbCQgMYN/ePQQGBtLU3MTJE8dITJzPRx/uJD4hkf2f7CUmNg69Xk/WuTPk513srzglibOZp0GSCA8P59jRI/T29pCbe4GoqGguV1ZQU13N+ZxsWltbaGtro6OjnfM52XR2dFBQkE/i/CSOHD5Ie3sbEZFRLgHKzDxFYuJ8srPOUllRTnBwCKdOHqepqZHzOdmEh0fS3d2FVqvFbrNy8vhRFi5KpaW5icuVlURFRXGpqACtRoOfnx+nTx0nOXkBmadPEhYewbkzp5kXFk5rSzPvvv03gkNCsfT24nA4sNltnD55nKCgYC5c+JSy0hL8AwK4kJNNVHQMuRdyaGtrpaqqkuqqyyBJXMj5lI72NhRFwWgycuL4EXx8fOiz9l3dVxjFlwppa2ul5koVF87n4OvrS3BIqKjJp7mL6uyZU+RkZ+Fw2Mn5NJve3h6CgoIxGIa2+FVUDDqNW6uhpaWFpqYm/vf//t9kZGSwYsUKTp8+zapVq9zG3+vuU/ExDI/6YLFYyMrKQqvVYrPZMJvNNDQ00NXVhc1mI2JQQNhrWbVsIcmJ0cOigg8Spk927txZSn+PvPPqZ3DsK3WQUFwb2n1CoUxGm1jiUcjf/fv3U1hYyOHDh9myZQuZmZkeWQZ5eXn09fWRk5ODzTZ667WyspKMjAyMRiM33ngjzzzzzJj7qKqq4oYbbuDs2bNs2LDBlUDKreyqA6L22UP30UcfERAQQEtLf0U4wJIlS3jrrbew2+28+eabBAYGkpeXx7x589BqtaSmpmKz2ejs7OR3v/sd+fn5vPbaa3R2dtLd3c2+ffsoLCzk5MmTdHd385e//IWLFy8OseCudb20trZw4XwOPT3dfLJ3D6WlJWi1WqqvXEFRFd55680hlt2+vbtJSEjkyOGDdHV3ceF8DtlZZ7HZbJw6eZxzZzJpa22lsbGBnTu2syh1MTt3vAfAX/70e/osFv7fm5+1roKDQ8g8fZLzOdno9HoqKso4dvQIOp2Orq4uFKeTP/3hv4iOjuHggX2YzWZaWpo5fuwwx44eYuHCVPZ9vJu62hoOHzqA3W4n69xZ2tvbUFWVXR+8z6JFqeR8mk3xpSKamho5c/okDfV1HDq4n7S0dA7u30tTUyPBwSHU1dXyxS9tIjIqmqqqSm750kZi4xLo6upkybIVhEdE4u/vj39AALJGZu+eD0lLX0JdbTUlxUVEREaSOD+J06dOcOrkMTQaDVqtjoMH9pGUlILFYqG+robGxnqyzmVy8uQx2tv7rYfIqGhOnzyBqqpEREVx7OghPt79Ialp6ezbu5v6ulr6+iycOHaEM5mn8PX148qVqkl3TwgmhiRJ6HR6GhvrefzJp1mUmkZNdTV+vn5ueyLUEYbPJCQk4HQ6hySty8vL87g3xGXl9PXhdDrp6uqipaXFVQ/29vai0Yzug/n337/FgaNZntbpo9XbIyWdmrAJM+Huq02bNrFw4UJuueUWnnrqKdatWzfmbxYvXkx6ejomk4nly5cPC5N+LYmJiWRlZWG1WlFVlYKCAo+OLScnh7q6Os6fPz/6yV+tsAeCku3du5ebbrqJDRs28LWvfY033njDta2/vz+PPfYY7e3tREREcOrUKVJSUujq6sLhcFBVVeVKTpWWlkZgYCDr16+noKCA0tJSAI4ePYrRaCQ2NpbFixcTHBxMfHz8MEFzmZIaLRaLhY6ODsy+vvR0d9PW1saZM6fQanU4rmYlbGxooLWlBYfDQXNzE3q9ns6ODiwWC1qNlsjISMxmM1HRMURFx3D82FFUVaW5qdHVGvP18ycmNo6ly1ZSUJAHQFt7fxZEWZaJiYlFkiSMRiOtrS10dnagAuHhEZSVlRIUHExgcDDz5oVhMvkgyxpiYuMICw/Hz98frVZLR3sbfX199PT0UFNTjaI4aW5uQqPR0NvbQ1dnJzq9nrDwcMLDI5g3LwxFUdBpddjtdmprqomLT6C+vo6AgEAMBiM5n2axbHl/a/Dwwf3c/MVbqa2pJjo6FlmWaWttdWV+lGUNnZ0dBAYGYrNZqa2pZn5SfzDLtrZWQOXT7HMYDEYcdgcrVq7m7JlToEJYeARGY3/stfa2NlRFQafX0dbagiRJZGedxWg04nA4CA4Oxmw2Y7H00t3dJWrz68TKVRmoisp77/4/Ll7I4e577kdy04rv74KRRmzEajSaIZV8WloaN95447iOxWw209bWRk1NDeXl5ZSUlJCZmUlHR8eQTKPueO6Zr3Hrzau9cUk8crJKHqjTwPfBqRC1gz76gc+WLVtue/LJJ/99JH9GVlaWR+Ix+Detra2EhYV5tP3ly5c5duwY/v7+bN68ecwW3Z///Gdqa2v58pe/zO7du4mKiuJb3/rWiD6Qjh4bkiTh76Nj+/Z3h/RHWq1WHn/8cbdBG1VVHWbCOp1O14OmKAqyLA/Z7trfDGwzcCydPXbXHJSurk5Qoam5kT6LhbTFSygpKUZVFGJiY8nPyyUiMgqNrMHH7NMvXt3d1NfXsXzFKgoL8jEajYTOm4csy3R2dBISEkJOTjaLFy/BarNSXlbK6ow11NfVERAYxMULOSxfsZKmpiZ8fX2pq63FbDYTEBiI0Wiiq7OD4JBQCvLzCAoOxqDXExwSSlVVJUaDEf+AABRF6fcXqSpR0THU1lSj0+sJDAziUlEhvr6+hIVH0Nvbg6IoVF2+zMpVqykvK8XhsJOQMJ9ei4W+Pgvh4RE0NzehOJ0EBgVhtVoJDAyipbkJf/8AdHo99XW1hEdEIkkSdXW1REZGcXD/PjLWrkOj0VBWWsKi1MW0t7dhNBrp7enhwoUcEhOTKC25xMZNt9NnsVBbW01I6Lz+VmJnJ+ERETQ1NmA0mjCbffH186OtrRWJ/vTCwSEhBAUGkZd3kcT5STjsDpqaGggNnYdTUQgLC6eiogyn00lUVAw+PiLb43TjdDr427bXuf3Ouzl75jQLFy4iOWXhsO20Ghk/H/eDV69cucLf/va3IfWV0+nkm9/8ptvt69sUQvxlV/qJwXz00Uf09PTQ09OD0+nkyJEjrF+/nkcffXRYPqDB/PK3f2XV8oXc/qU1btdv3br1uaeeemov/aHbbdf8dQzqyro2tLtbYZmsgOgH/33ttdfufOqpp34zVx8yi9VJn82JXidjNl6ffBgq0GtxYBOjsLxCd3f3qP61lpZmQkJC6enuxjyGH04w9/E1acccheUpVruKXut+FJaiKFy4cIEjR45QWVmJJEl873vfG5J6eiJs2bLluW984xufXBWNSQuIdgTTRR7l++cWo16Dw6lgsys4nXYMOhlZlqYnyofaPw/EZldwinkg3qsQxhCFkKsObSEeAqNe4zXxADDoRq44ZFlmxYoVLFu2DEVR0Gg0XkmEd7UMT1ufyljdWtoxLBDGIR6yJElzulksSeBr0mGxOrDaFXqtTvFWCQRzHEkCk16DQT/9kwhlWR5xRNVkih3HdqPW6SIv6QQeJh+jFqNBxMISCOY6cykW1miWhIfiMWyZ1sOdiS6s4eYWep2IUCsQCGYP4whlMuX5QIZhs9nknt4ecZcEAoFgBmLzcjQIT5zonlofik6nw+xjFndJIBAIZiB6nX48fuoxneieJozyBNHNJRAIBDOYSY7kkj2xQCZzcGJyghva29vp6ppbs4zNZvOoE5oEAsGsxqPc6F4VEFWMSHJLVVUVCQkJc+qcKioqhIAIBBOkrq6Oqqoqent7MZvNJCQkeBxxY5qYfie6NI1j3Ww2G0VFRdTX15OUlERiYuJUjJf2ChqNBn9//zn1Ami1YgS4QDBeWlpa2LNnD1VVVcPWzZ8/nzvvvJOAgIAp2//VUVhe6ymSJ6o8I/xuSmtwVVWpra3l0KFDHDp0CD8/P26++WYsFgsff/wxp06dckVEFQgEgplEU1MTb7zxhks8rFYrbW1trkjj5eXlvPHGG9NRh020nh5Wx3vViT7VXVg1h9/n4Ic7MJlMbNy4kcTERAwGA+np6dxyyy20trZy8K2/0Xnq2Kx8wEQXoEAwN1EUhQ8++MCVrKq5uZnMzExycnLIzOzPwQPQ2dnJhx9+OGZdMLB+vHXGOP3UXplIOGVkZ2cPCU8cFxdHTEzMiNsHNRRyv8FCTVYF+8qLmJecRmJiInl5edhLilhaVkjwvHlIFz+FG27CfjEHpakBTWw82gWprnLs2WfQpi9Huho511GUhxwShjxvnH2Qqno1DtbEuu7sdjt//etfsdvt1NfXc+TIEX75y19yww03DNu2vb2duro6Fi5cOKGuOlVVuXTpEoGBgYSHh1NaWkpKSop4swWCaaC0tJTGxsYh3wfyhjgcDsrKylw+xaqqKq5cuUJcXJzbss6ePcuTTz7JK6+8wjPPPENhYeF0dd97FAtrwoxH3VRVJTs7e1ha19EERPYPxXTXt0muKyfm2Ls0Zp6nJCeRRSWXCFyYivGHP0cODaP31d8DYPnrXzDc9mV6/vgfmP/P99FExaBa+1Aa68HpROloB8WJLfMEumWrkPR6lN5WrFkf43P3MyjtjVgOvIE2Kgk5JArdwrXYzh8Ehw30JpTGy6hWC/qVm9BEJo37er300ku8//77KIrC5cuXefDBB6mtrR22ndVq5fvf/z633nor586d40tf+hKNjY3ExMTQ0NDAkiVLKC8vx+l0kpiY6Ep9+eqrr/Liiy/i4+PDb3/7W3x9fSkuLubRRx+lurqaP/7xj3z3u9/FYDAQGRk56kMrEAgmTnl5+ZDvA3lnRvpeUVEx4rsYHR3Nxo0bSUpKYvPmzVPle3Y3CmuYBeK1Ke0TobKykrKyMtenpaXFE5lCE5mE+Ws/JubWr5J++TwRP/pHfL71PeR54cO2dhTmolp6kfz8af/Wo9iOH8J68giO4gK6X/pHbIf3g6LgKC6k508vozrtqF0tOBsvY8vaixwQCoqCvegsqrUXR1UBqq0PR1kOxlufwHTH01iz9k7o/C9fvkxGRgarVq1yPUA//vGP2bRp05CsZlqtFrPZTHNzM3fffTe/+MUvuHTpEn//93/P1q1bKSoqYs+ePfzmN7+huLiYn/70p1itVlpbW10mbn19Pd/+9rd56aWXSE1NdZnNDoeD3/zmN+Tl5fHJJ58A8OyzzxIREUFkZCRvvvmmePsFgkly7TD+axvK0dHRo25/rTWzbds2Ll68yJYtW1CUcVXRHk8Mn3YLZJzWCs8999wQ5fXz8xtfGSY/kCQks99IO8H06DeQPngb+6dn0SQkYbz/YWzZZ3CUFqPPuAHj/V+jd+ufsR09gOHLDyDJMvrlG+k7+ja6BRkorbUgSRgybqfnr/+I6fZv4qgq6O++AlAUr7QAFEWhuLiYkJAQ7HY7DofDlXCqt7eXZ599Fq1Wy69+9SvmzZvH3XffTVVVFYmJiRQXF1NcXOzKSPiFL3yBjIwMEhISMJvNLivG4XBw+fJlurq6kGWZ6OhoUlJSiI2N5c9//jO/+tWvAPjFL35BVlYWy5cv55FHHhFvv0AwSQYnt1NVFZPJhF6vx2azYTAYMBqNQ5LIjZYMLy4ujgcffJCUlBQefvjhcXVfXW1QTmswRY8V6+oQMY9P5Cc/+QmdnZ2uZffffz9f+9rXvGeDRUbT87vfgFaL4a77cZb3p4vVRESj/8It9P7lFZw1VWiiYjE/8wP6Pt6JdvEiJB9/TJueRPYPxZq1F0lvQJ4Xh8+DP0Ay+CC11KBbchOWfa+C04HhhvsmfIyFhYUoioLNZuPYsWMkJiYOy0hnNBrZtm0bfX193HHHHVy+fBmNRkNiYiLh4eGYzWbXbwIDA12pb3U6HTU1NURHR/PUU0/x4x//GJ1Ox89+9jOSk5MJCgpiz5493HffffzLv/yLa6hxQEAAR48e9VoOAoHg805sbCwXL17EbreTm5s7ZKSV1WolLy+P4OBg0tPT0Wq1o3blW61Wenp66Ovro7u7223G0zEsC097nsYUmlmVkbDnnV9j2vzN/m4lwFF+gZ7/eRn/n/0O6WpL21lRSt8nuzF/+9kZ8/Dk5+ezePHiYcvz8vI4c+bMsOUhISHcd99903Z8//7v/86mTZtYunTppM9JIBC4r/R///vfc+rUKdra2kbcLiQkhJtvvplvf/vbUzLX6mpKW08zEirXdF1NaReWVyeouMO08XH69m9B8vHH+MX/NVQuG+rpffNV5IAgfB55clY8VOnp6aSnp1/343juuefEGy4QTCEGg4FbbrmFvXtH95d2dnaycePGmTBR1yXxTDkAACAASURBVKuhTDzqmprq7g45JAqfB3+Is7aU3g9eBqcDFIXev/wXaDX4fP3p8Q/FFQgEgmlg5cqVPP/88/z2t78d0nU/QHBwMD/60Y9YtGjRTD2FCc8DmVFJpTRRyZgf+TmOshw0oSXoUjPQxCeKJ1QgEMxoNmzYwLJly/jkk0+4ePEiHR0dBAUFsWLFCjZu3Iivr++U7n8cfuoJxcKarEhMq8hok1agTVox4x8ai8VCfn7+nHoRenpE4jCBYCL4+/vz4IMP8uCDD16vQ/Caq0E7QsETEQJFhOJwz+rVq8VFEAgE152rk70naoWIhFICgUAg8E4d7+2Z6CKhlEAgEMwNsRhTH7w5kZDe3l5XVEmBQCAQzCzG4buc/oRSPj4+sshSJxAIBDMTHx+fmZtQSoS9EAgEgs8PsyqhlEAgEAgmziQTSnlNLAQCgUAwdwyHCQmKtwVEjMISCASCuSEy8lh64dVhvMIHIhAIBHPC+lC8WZhHjCcfiEAgEAimF2/7qbUjKI88VSIjEMz0F8xms9Hd3Y3VagX6Q3H7+vqi1+uFlS2Y7UzGie5RPhAhGILPFXa7ndLSUkpKSqiurqajo2NYnmlZlgkICCAmJoaUlBSSk5PR6XTi4glmFZNsAE04nLtHajXOIWICwXWlp6eHM2fOkJOTQ19f3+gPt6LQ1tZGW1sbubm5GI1GVqxYwdq1a1155wWCOcaYkw69mVBKWC6C2WHDKwpZWVkcP358TOEYib6+Pk6fPk1OTg4bNmxg9erVyLJ4BQSfLzzxgYy0bBhiIqFgNlgdO3fupKKiwivl9fX1sX//fkpLS7n33nuFNSKY0Xh7oJO7cb4TnmQiSZJogglmLO3t7bzxxhteE4/BVFRU8MYbb9De3i4utGDGG+He0gzZiwULC0QwY+ns7OTNN9+c0mjRra2tvPnmm27zXQsEM4FJJpQatkxYDII5j91uZ/v27dNiHbS3t7N9+3bsdru48II5b7l41YkuRmEJZiKHDx+mrq7O9b23t5eCggKSkpIICgoCoKSkBLvdTmpqKpIkoaoqFRUVtLS0DBv6GBkZSXR09Ij7q6ur4/Dhw9x2223i4gtmK7Ib0ZAnaoEIYRDMSmpra8nOzh6yrKenh87OziHdWQ0NDTQ2Nrrmf7S2tlJZWUlXVxednZ1DPsXFxVgsllH3m52dTW1trbgBgpkqDF6p8+XrdHACwbRZH9dOCvQEm83m+t/Pz4+IiAhMJhPQ7+sbq4tKURQOHz4sboBgRnHVTz2lCaUmiiKc6IKZZn1UVlYOe4EGBGXg/8ECM/B98LLFixeTlpbGwoULx7X/yspKYYUIZhrjcaKPiXaqdyAQXC8uXLgw5HtzczOXLl1yWQ/V1dWuCt7hcABw6tQpJEmakNUy0jFERUWJmyGYEVz153n6cE9rLCzhRBfMnGaWolBSUjJkWWlpqStA4mBrYzBOp3NYWbm5ufj4+NDV1TXu4ygpKWHz5s1ilrpgJiGPYzvFGwUJBLOKlpaWIRX+YL+FwWAgLi6O2NhYV8Wu1WqJi4sjLi4OrXZou8rHxwcfHx+MRuO4j6Orq4uWlhZxQwQzqn01QZGRPbFA3O1MCI1gVlFfXz/iuuDgYJKTkwFoa2uju7sbf39/17Kenp4hlX5ycjImk4n29nY+/fRTACwWCxqNZki5BoNhmPgMHMu8efPETRFcd66GMvFaIkHtFBycQHDdaWtrG3HdQDfVYIe60+lEVVUkSRrWjTXgHxk88io/P39YuTqdjuXLl+Pn5+fxsQgEsxlvJpQS/g/BjKG3t3fEdU1NTZw6dQpVVV0+kY6ODpcD/doIvTk5Oeh0uiFDe91ht9upqalh0aJFHh+LQDDNzNiEUsL6EMyct2SUUVQmk4n4+HgURaGsrAyHw4HBYCAxMRHoD4w42NkeFRWF2WymtbWVhoYG13J/f3+io6NxOp2UlpaiKIpbJ7y3RnQJBJNlJieUQozCEswY01o78qMdEBBAZGQkADU1NXR3d2M2m13DbZuamoYISHR0NCaTCZPJNERAgoKCXOVcvnx5yG88PRaBYIYie2KxeDMWlojGK5gx+Pr6jrjOarXidDpRFMXl37DZbDgcDiRJGtZVZbFYMBgMw7qi+vr6XGW4szw8ORaBYKYa8R411MZR2JgiMknzSCDwGiEhISOua21t5ejRo0OWdXd3c+zYMbfbnz9/3u3yhoaGIRbJRI5FIJhOrg508lpPkTdnoovhvoIZQ0REhCuq7rUEBASwYMECFEUhNzcXm82GyWRi8eLFSJJEQUEBPT09HgnD/PnzcTgcXLx40a0VIkkSERER4oYIZhITThrINX4QrzrRRReWYKbg7+9PaGgoTU1Nw9b5+Pi4htrq9XqXgPj7+wNgNBo9EhBfX19XOVqt1q2AhIaGusoVCK434/RTK260Yeqc6ALBDHpRSE1NdSsgPT09dHR0oCiKy99hsVhcCafGCtU+QFdXFx0dHTidTpcv5VoG8osIBHOACSeUmgp1EwimlGXLlnHy5MlhlkFnZ+ewHCEWi8U1y9xTWltbR02Rq9FoWLZsmbgRgtmI1xJKCVEQzEr8/f1ZunTpddv/0qVLRfeVYKYKw0TqfWWihQkEs5KbbroJo9GIJEkEBARM+f4G9mE0GrnpppvEDRDMKMaRUMprwRQ9ViwRC0sw0/D19eXWW2/lo48+IjU1lerq6jFDkkwUPz8/18TCW2+9Vcz/EMxEPB0tq3giNMKJLpjzLF26lOrqas6fP+8KVzKVLF++/Lp2nQkEIzHJAR1T2oXl1QkqAoE3X5rbb7+dlJSUKd9XSkoKt99+uxh5JZjteBT2fTyZqaZa3QSCKUOj0fDAAw+wePHiKdvH4sWLeeCBB4blCREI5pCoDMGroUwEgpmMVqvlnnvuITw8nKNHj44av2q84nTzzTezdu1akbpWMKMZh596QrGwJvv0i7dHMLObULLM+vXrmT9/Pvv37+fy5cuTKi8+Pp5NmzYRHh4uLq5gtjBlsbCUSQiBIkKZCGYL4eHhPPbYY1RUVHDu3DnKy8s9tkg0Gg3z588nIyNjWpzyAoG3uDrZe6JWiEgoJRAMJjExkcTERHp6eqioqKC6uprGxkY6Oztd+T0MBgP+/v6EhYURExNDYmIiZrNZXDzB586AZwKxsDxWLBHKRDBbMZvNpKenk56eLi6GQOBhQil5HAUJBAKB4POBR8aAV8VBzEQXCASCmYu3E0rJE1Ued78TXVgCgUDw+UH2cJlHZQkLRCAQCGYuk0wo5TWxEAgEAsHcMRwmJCjeFhDRhSUQCARzQ2TksfTCqwmlRCwsgUAgmBPWhxiFJRAIBIIhdfSUq5EylSIjEFwvFEVhKsLtTFW5s+WaCmbXLZvEtlMaykRwnVsWf/vb3wgLC2PTpk1D1h04cICGhgYeeeSRCUeLLSsr49ChQzz99NMz+jocPHgQnU7nNp3sK6+8QmBgIE8++aRXr/uvfvUrFi5cyFe/+tVx/760tJTDhw/T3NyMn58f69evZ9WqVdPyvNjtdvR6/ajicPz4cXJycujt7SUyMpIvfvGLJCQkAHDkyBH27t3LCy+8gNFoxGazodPpRFf2DGaS92bYHBJvioWYB3KdH4ykpCR27NhBVVWVa3l1dTU7duwgKSlpUqHGe3p6KCgomPHXoaqqiitXrrhdt2rVKpYsWeL1675+/XrS0tImJB7/8R//gdFo5JZbbiE8PJxXX32VEydOTPl1amxs5Pvf/z5dXV0jCsz//M//sGPHDqKjo1mzZg1dXV385je/IS8vD4CEhAS+8IUvoNPp6O7u5tlnn6WpqUm8jHOHMSsMrbcKEpbL9Wft2rWcPn2at956ix/84AcAvPXWWyQnJ7N27VoAOjo6uHjxIna7nYULFxIdHQ2AxWIhOzubdevWodX2PxZ5eXn4+/sTFxeHTqfDYDC49nXu3Dni4uIoLy9HlmXWrl2Loijk5+dTX19PaGgoS5YscZU1mOzsbMLDw4mJiQHgwoULGI1GFi5cCEBJSQl2u520tDRUVeXSpUtUV1fj7+/PsmXLXMdRUlKCLMtYrVauXLnCrbfeOmxfJSUltLS0sGbNGkJDQzEaja7KW5IktFotJSUlBAcHs2zZMlcyKFVVKSoqorq6moiICMLCwqitrWXFihXD9jFv3jwCAgIAyM/PJyAggN7eXqqqqoiIiGDx4sVuW35nz55lwYIFfP3rX3ct8/f3p7a2FoDKykr6+vrQ6XRcunSJlJQUkpOTuXjxItXV1SQkJAxJkNXe3k5ubi5Wq5W4uDgWLFgAQEtLC+Xl5cTFxXHhwgWSk5MpLCxEURTOnDnDggULiIuLG3aPLl68yA9/+EPi4+MB2LhxI2+88QbvvvsuaWlpmM1mIiIicDgcZGZmoigKWVlZLFq0CK1WS1NT0xBrqqGhgfLyctatWyeslDmCdoR+L9mDZW5bLYLra4U88sgj/PKXv+T06dPIskxlZSU///nPkSSJiooKXnnlFcLDw/Hx8eG9997j4YcfZsOGDXR0dPDXv/6V5cuX4+vrC8D+/ftJTk4mLi4Oo9HoqiQB3nvvPSRJwsfHh9TUVNasWcOf/vQnKioqSElJ4cCBAxw8eJBnn30WnU435DhzcnIA+OY3v4ndbuf1118nMDCQ559/HkmSePvtt1m+fDmpqals27bNVSnV1NSwe/dufvCDH+Dn58fp06ddVlF0dDRf+tKXhuzn/PnzvPrqqzz55JPIssyxY8cIDg4mMTGRzMxMSkpKAAgLC6OgoID169fz2GOPAfD2229z8uRJ0tLSOHHiBDqdDkVR3ArIvn37WLJkCTExMRw8eJC2tjZkWSYgIIDt27dz7733cscddwz7nY+PD3V1ddTV1REZGQnA5s2bh1yns2fPYjabCQwMZPfu3Sxbtoympib8/f356KOPeOKJJ1i3bh0VFRW8/PLLhIeHExISws6dO7nnnnvYtGkTVVVVbNu2DaPRSEREBP7+/pSWlrpEMjAwcJiAZGVlsWLFCpd4DDxf9913H+Xl5aiqSmVlJe+//z6pqakUFRW5BDsgIICQkBBeffVVEhMTCQ4OBmDPnj10dXWxfv168bJeJ7w90MmbCaUUSZKEFXKdiYiIYPPmzezcuRNZlrn99tuJiIhwWSPLli1z+QCOHz/Ou+++61Gfe2JiIj/5yU+GLEtNTeXxxx93tVjLy8t5/vnnCQgIoLOzkxdeeMFl1Qxm6dKlvP322yiKwuXLl9Hr9TQ1NdHR0eHqdnviiScoKSnh9OnT/OQnPyE2Nha73c6LL77Ixx9/zEMPPQT0h1r/6U9/OsQ6AsjNzeW1117j61//+ojn53Q6ef755zEYDBw/fpzt27fz8MMPU19fz9GjR/n+97/PwoULcTgc/Ou//qvHDmMfHx+ee+45ZFnmgw8+4NSpU24FZNOmTVRWVvKLX/yCpKQk0tPTWbduHYGBga5tNBoNP/rRj9DpdGzdupWysjJeeOEFNBoNr7/+Ojk5Oaxbtw5FUbjzzju57bbbkCSJ/fv3c+rUKZc/zGaz8dxzz7mEIjExkX/8x3/kiSeewM/Pz20Xl7uKPiAgYJiI+vr68sQTT/CDH/yAhx9+mPDwcBRFISgoiKysLG677Tb6+vq4cOGCS6AF15XJuBqG+EFkLxYsLJAZwubNmzEajej1em677TYAent7qa6u5sYbb3Rtt379epxO54Sz8i1atGhIV5HZbOb48eN89NFHHDt2DB8fH7dlp6WlYbVauXz5MgUFBaSnpxMfH09RURGFhYUEBQURExNDcXEx8fHxxMbGAqDT6Vi3bh3FxcVDhO1a8SgvL+e///u/uf3221mzZs2oojjw24SEBOx2O1arlfLycoKDg11dalqtlpUrV3p8XVJSUlz+poFcI+4wm808++yz/OhHPyI5OZnTp0/zD//wD5w/f35Ig2DAggsKCiIsLMzVzRYcHIzNZgMgKSmJpUuXcuzYMd59911Onz5NX1/fkEp+oMvQU2t2Mu/zQObHM2fOuLopNRoNy5YtEy/o9e2lmExCqWHLhMUwB9HpdMTHxxMXF+caZeN0OlEUZUhlq9Fo0Gq12O32CXeZDWC321EUhd7eXtdn6dKlJCUlDfudr68v8+fPp7CwkKKiIlJTU13dIEVFRSxZsgRJkrDb7cPEwWAwDDled33pTU1NREdHc+bMGSwWy6iVnLv/FUVxVdKDr9V4Ks/Rju/aa5iQkMB9993HCy+8wLp16/jggw88/v0An3zyCf/8z/9MQUEBRqPR5f8YbzkDhIWFuRX/trY2MjMzPcreuHbtWurq6qipqeHMmTNkZGQM684UzG7LxVMB8ciJLkZhzVwG+tEH+qqh30lrtVqJjIx0VdQtLS0uwWlubva4/MjISGRZ5itf+QoPPfQQDz30EEuWLBlipQxm2bJlXLx4kdraWhYtWkR6ejolJSUUFxe7WqnR0dFcvnx5iAgUFRURFRU16rFkZGTw3e9+F0VR2Lp167hb0rGxsTQ1NblGsymKwsWLF71+T/7zP/+TXbt2DankAwICcDgc4y4rOzub22+/nb/7u7/j7rvvJigoaFK9BmvWrOH8+fMuP9HAttu3b+eTTz7xaETfvHnzSElJ4cSJExQXF3PDDTeIF3H24FEoE09HYY3H7BHMxKdBltm8eTPvv/8+DocDk8nE/v37ycjIYN68eaiqSmRkJFu3buULX/gCly5dGrHrxR3r16/nwIED/PGPf2T16tVUVVVx9OhRvve977m6ggazdOlS3n33XZKTkzGbzZhMJux2OzabjZSUFACWL1/Onj17+N3vfscNN9xAVVUVubm5/N//+3/HPFez2cy3vvUt/vVf/5WPP/6YO++80+NzmT9/PsuXL+fll19m6dKl1NfX09PT4/XW88A16O7uJjY2lpqaGo4fP84999wz7rIiIyPJzs5m3rx5dHZ2sm/fvmHW22D8/PzQarXs27ePlStXDrMUly9fTkZGBq+88gpr1qwhKCiIwsJCqqqq+M53vjPMojGbzRiNRg4cOMDq1atd9/yGG27g9ddfJzo62tUVKZid1oY73Nnl0jX/S4PUZ+D7gDppBv3V3HfffSnLly+/TVz7609XVxchISGuSV/Q388fGhrqavmvXLmSBx54AFmWkSSJxYsX09LSQkNDA8uWLSMpKYmIiAiXE34wra2tpKSkuFq6er2eFStWUFtbS15eHk6nkwcffJDU1FS3x+fj44PFYmHlypVERUUhSRIajYb58+e7Kh+NRsPKlStpamoiPz8fWZZ59NFHXZVdd3c3QUFBQ0YQdXd3ExISQmxsLAEBAURERFBZWcn8+fOxWq2EhYURHR3t+u3AKCOn00lPTw9Lly5Fq9WyYsUKwsLCcDqdLF26lKioKK5cucLNN9887Fw6OjqIiYkhPDyczs5OIiMjXaOqbDYbDofD7fyThIQEoqKiKCsro6SkBEVRuOuuu9iwYQOSJNHb2+vq7oN+P5bZbHadv8ViwcfHh6SkJFJSUmhpaeHChQs4nU42bdqEyWRi8eLF2Gw2FEUhPT3dVfHrdDqioqIoKSlBq9WSmJg4rMtr6dKlhISEUFVVRUNDA9HR0Tz22GOubW02G6qquoYpJyQkUFJSgtPpdDUC5s2bx969e7n99tuH7UMw/eTk5BzYuXNn8VWBcF7zVwHUq58BARn4zqDvbsXCnZky2IzRDvquvfrRD/772muv3fnUU0/9RtwmwWzGbreza9cubrjhBiIjI1EUhT//+c84nU6+853viAs0Di5evMhf/vIXXnzxRdfwcMH1Y8uWLc994xvf+ASwXf04Bv11DBISxyBLRBnJMvF0HohA8Lnq7mtpaeHFF18kLi6O9vZ2ent7hXiMA1VVeemll6iurubOO+8U4jFDuGqBeuqrntZYWMKJLpgTaDQann76aa5cuUJDQwNGo5GkpCR8fHzExRkHX/3qVzEaja5oB4KZ00Yax3aj1ulacS0FAvcttbi4uGEztAWeXz93Q7gFMwJPGvruxGNCwRSFVSEQCARzgKuhTLxW74uEUgKBQCCYEN5MKCUsFYFAIJjZeDWhlOxFq0RYHwKBQDCD8UJCqamr9MUoLIFAIJgTeOQr8WYsLBGNVyAQCOYGXnWie1SYyDImEAgEM5erA5281lPkiRN9PIol/CCz74GaERakoijD9j9aVFpVVYcd+0jf3ZU92n7HS29vLw6HY8xyJhJld7L3dDp/K5g1TLSeHlbHe9WJLh6+2cWlS5fYtm0b0J///O233x5VVEaqoEe6756ut9vt/OEPf2DHjh3k5ua61p0/f35IBX/p0iXKyspQVZWcnBxX3ozMzEx2797Nrl27OHfuHNCfcvfChQucOXOG9957j23bttHV1TVs35cvX6apqYlz586NeZzuzqm+vp7t27dz4cIFSkpKyM/PH/GcP/300xGviyf/eyL8qqqyZ88ej+/DwH0cWHf48OEh4fNHO3fB7GOcfuoxJxJ6cya6cKDPMux2O/X19XR3d5OXl4dGo+HcuXNUV1cTHBxMU1MTWq0WjUZDfHw8ZWVlmM1mQkNDKS4uprq6mkcffZRDhw6hqiqPPPIIGo2Gd999l3vvvZePP/4YRVFQFIWEhARqamq499572blzJ4qioNPpXGHWzWYzsbGxtLa28s477+Dr64vdbic6OpoDBw6g0+lITU2lt7eXnJwcoqKiqKqqwmazUVlZiU6nQ6PRUFRUxLJly7hy5QpxcXFUVFTw8MMP09zcTGZmJps2baK2tpZDhw6h1WpJSkqitraW06dP43A4CAwMpLa2lmXLlhEaGsqrr75KcHAwRqPRFSE3JCSElpYWtFqtKy9GU1MTRqMRm83mStebkZFBcnKy63rX1dW5RK+pqQm9Xs/GjRs5e/YsPT093HbbbezduxeTyeQKt97Z2UlYWBgbNmxwlXPixAkaGhpcWRv9/Pzw9/fHaDRSW1tLRUUFd911FwB/+MMf8PX1xWQy0dXVxVe+8hV27twJwC233MLu3bvR6/UEBgai0+mQZZldu3ZhtVq57bbbOHDgAKqqsn79eg4ePMj69eu5cOECoaGhbtP0CuY0E04o5ZEFIkZhzT5WrVrFwYMH8ff3d7UuDQYD1dXVaDQa7r77blc4cIPBQF1dHWVlZTz00EPExMRQWFiIXq9Hp9PR1dWFJEkEBgZy9OhRFi5ciKqqPPjgg5SVlbm6cAayF375y18ekphIr9fT0dGBVqvljjvuwOl0UlhYyObNm3nooYfQaDTs3r2bNWvWoNFoWLp0Kfv27XOFm5ckibCwMPbt2+dKSjXgl5Nl2dVyLioqcpUpyzIxMTHMnz+f1atXU1BQQHNzM6GhoQCYTCbuv/9+Ojs7cTqd3HXXXdTX1/PAAw/Q19dHamoqS5cudbXie3p6qK2txd/f35Wca4CBLH533303wcHB3HTTTTQ0NLiyHZaUlBAWFsadd96Jw+GguLgYHx+fIZbTAAP3yMfHh/vuu4+2tjaqq6t58MEHh8SeCg8P55ZbbiEhIYHw8HAKCgpc59Xa2kpaWhrx8fFs2rTJdX/uvPNOwsLCOHPmDDqdDp1OR3t7OxkZGa40wJ4klBLM+m6uMRNKiVAmn29z1pX1LyMjA1mWqampQVVVJEly5QkZWD4gMCkpKWzfvp3Lly+zYMEC7HY7sizj5+cH9Kcyzc7OZuHChTgcDj744APi4+Px9fVl165dWCyWYRVQa2sr5eXl+Pr6uipUSZJYsGAB+/fv5+2338bpdPLwww9z+PBhV+KpwsJCVq9ejSRJSJLE2rVruXTpEomJiciyTGRkJNu3b2fXrl2u/OgpKSns37+fd955x1Wpt7S0uI5rcPyrzs5Odu3ahclkcolRREQEu3btQqvVuvY78PH19WXevHnY7XZCQkJcOcEHzmfwNR0QlaamJpxOJwEBAbS0tPDxxx8jSRKJiYk4nU4CAwP59NNPXal8a2trh9yjAYEMDw9nx44d1NXVffaCD9rfQJkDYhcUFIQsy64yBrbbu3cvdXV1rFq1ynVvAwICkCTJlWSsvr6e0tJSt2lvBTNeGCbaozRsmSf5QAb+jpUPRL9ly5bbnnzyyX8X92h243A40Gq1Iy6/dOkSNTU1XLlyhccffxxFUVwVFMC5c+ewWCzcdNNNw8obqPjGg9PpHFL+eHE6ncNyml9bpqqqdHV18f777/PII4+4svm9//773HPPPcOux0jX6Nr1Bw4c4NZbb/X4/Pbs2YMkSYSGhpKRkeEq5+DBg2zcuHHUc/LkuKB/4MCAuIx1PO6u/Uj7Fsx8tmzZ8sNvfOMbexiaB8RdPpBrP25FRCSUEowbVVXp7u7Gx8fHbUVitVpHTac6Yzt4FQWn0zkkda3dbp9UKtvxCuZAWl+z2TypcgSCEQRkPAmlFDeiMWVOdMHnqOtroLvKHbNRPAZa5Ne2yiebB328lf6Az2Gy5QgE3nger21jjWZtTPr9Q/hLBAKBYC7g1VAm06FuAoFAIJjZojJ1AiIQCASCmcs4cjZNKBbWZAVFCJJAIBDMbLzmatCOUPBEhEAZb4iDzs5OcSsFAoFgEgxMAvaEq5O9J2qFKGMJyGSsiHH9TlVVbDYbQUFB4gkQCASCCdDW1jadQ7wnFAvLY8UabygTjUYjJiQJBALBBJnC+lMeyeoYr9Ug/BoCgUDw+cKrCaU8YhwefoFAIBBMMzM6oZSIxisQCASfH7ydUEpYIAKBQDBDmWRCKa+JhUAgEAjmjuEwIUHxtoCILiyBQCCYGyIzvQmlRCwsgUAg8B7t7e3ezkE/paFMJoW3fCCtra10dHTQ2dlJdnY2+fn54kkSCASfO7Kzs/n973/vNRHxshi5nUh47cTBafeTvPfee1itViRJIj8/H0mS+K//+q/hGdScDvoO/w2la+WSDAAAE8NJREFUqwXDjV/BUX4B3aL1IEvIfiHXnJVC7wcvg0aLIeNONFHJw/brrCnBmrMfTWgMmoj5yP4hyMGR4ikWCATXhY0bN2KxWPj973/PM888441ensk40ac0lIlXsNvtZGdn43A4iI2NRZZlbDYbR44cIS0tjYiICNe21rO70USnYEh6CGvmLiQfP6ynP0DpakEbm4phzZexnvkQw7q7QVVAcWK6+xl63/8t2thFKD0daKMXYC8+i37Zl+g7tA1NdApodTibr4AsYzt/EKWnHdOmp5CMZvFECwSCaSU+Pp7Tp097JWTJJH8/bA6JN8XCK/NAVFV1XShJklAUhe7ubs6cOcNbb701dIctNWgT0pH0Row3fgVnVSHahHT0i28EjRZ7USbOujKQ+k/TXnERy67/QpuwBMeVIkxfegxbzgF87vke1sxd6BatQ7/yNpxVhf0WSeNl7JfOoPb1YrtwSDzJAoFgWsnNzeXtt9/m+eefHzGH/RQy5g613irIm2I0cKG0Wi25ubmoqsqqVauG9d9pU1bTd2gb2qQV2Euy+hdqtDibazBk3EHny9/E/NBPXNvrEpfi88BzIEk4a0tA1oDqxFFzCTTDL4Vk9EXyC0aXvAJNxHzxNAsEgmlFr9fzs5/9DKPROCOPzxMfyEjL3FoP3hCPuro6uru7KSsrQ6/XA/Dxxx/z9a9/fci2uoVrkEy+KO0NmO74FkrTFTRh8WCzgqqiiUhEm7jkasEaDDfcD1dNOMO6e0CSMN3zXRzFWfh8+f9D7etBMgdgWH8vkskPyWBCDghFaWtAE54gnmaBQDCtLFy40KvleXuyt9aLVoQiSdKkD06r1bJjxw63YuTOhNPGpUFcWr/xEZnULyyLv4CjqhDT5m8OMiekIY7zgW1l/1D0q2/v38THf8g6AG1sKsSmiidZIBDMFaY0odSERcBbQ8QG/B+TOrE4UekLBALBNXXrZBJKDW/Ui0sqEAgEgokIiqcC4pETXUTjFQgEgjmB10KZeGTKCAQCgWDuWhsTtSzGq1oCgUAgmIFMR0KpCSuWt+OsCAQCgcDrloX35uxN1HQRCAQCwezi6uhWT+v4aY2F5TUnus1mE3daIBAIBjEwqXqKDIeRthu1TtfO8QslEAgEgjEsCQ/FY0LBFEWXlkAgEMwBrjrRvVbvz8iEUgKBQCCY+XjiRBdzRQQCgWBu4NWEUrIXrRJhfQgEAsEMxgsJpaau0hehTAQCgWBO4JGvxJuxsBATCQUCgWBO4FUnukeFeSHhuxAkgUAguMquXbvIzMz0Zp3q1VAmnmYk9FRkvNIl1tzczJ49ezh27BgbNmwgIyODtLS0Ids4Gy+jCYtH7etBtVlQWutQrRa0MQtR7VYkHz8kvUk8gQKBYNZyxx138Otf/xqAdevWeavYidbTA3W8MlpBE3aie8tiOHz4MHq9noiICAwGA/v27UNRhopm37F3+oWkoRJ74Wn6jr4NqkLPe/+G7eIRlJY68fQJBIJZjU6n4zvf+Q5/+tOfhtWBE2GcfmqvTCSc6M4mhMPh4A9/+AN5eXkcPnyYixcv8v7771NYWDjGD60orXVIskY8dQKBYE7Q1dXFr3/9a37+85+7Tek9zXgUC2vCZpE3RmFpNBruv/9+wsLCAFi8eDEGg4HY2NihG9r7+ruu2hv6u6r0Pkh+wcihMeKpEwgEc4LTp0/z9NNPk5ycPN27lt2IxjALxBMB8Wr4Xw9MLNatW8fevXvJzMxEr9eTkpKC///f3r3FuFHdcRz/zXjsXe8lZANkCQRCAZEiEgqoCkKlQMQtAaqiokVqH0rFRUQgkccKIfLSB9RHSF76Uql9aEtZggIqKrembZDaQNqSECmgQLmIopQmgaaBbLzj4z7YGzaO7Tkzc8Yee78faeWNMxnP2JPz83/OzDmLFp203PD1P9CX256UNzym8rr7VKvMqLT6Os0c+kSFpSt0fOdz8oZHVV53P0chgL508803ZxUMsauNrCsQZ9asWaPVq1fr7rvv1tKlS1Uun9oZXlh2oUanfnziz0NX3d4Ilu9Lkopfv4qjDwDmafRTOxtMMbBckVViuRwLq1wua8WKFXziAOCO7RklYxM0DD8CAAtEynv1rMbCSsrpDSoAgJ5xOpRJN9INAJDvUMkuQAAA+RWjnzrRWFhpA4VAAoB8c9bV4LdYcdKVGwY/BID8atzsnbQKsboPpOcTSoVhyCcNAPMb66Dnt+1leye6qwmlcjDmCwAsZH67qiNugHS9NSdAAKCnnE4oZcXlnegAALdcTyjlJ02eVv+OOdEBYOFwPaEUFQgA5FTKCaWchQUAYHAKh0SB4jpAOIUFAIMRMpE3mtsO62tbHvG2A4AjO3fu1OHDh3tRfVi1+07vTHHRB2KM0ZYtW3To0CFJ0nnnnad77723+YUkwgrAgDv77LP1+OOP65FHHtGSJUtctNHOy5So5OlqP0kYhnrqqaf09ttva8+ePXrmmWdkzFebVDt2VMde+rlkjFQN62FSDefSRzLVk3+vmZOXAYA+ce655+rhhx/Wpk2bTmoH03xHT7FspkOZOHXnnXfqs88+07Zt25ozVLXKjL749U/kjSySOXJQCkON3PGwZrb/SuaLzzVy+0P68rnN8krDCi64XNUD/5SMUXDBZSpdcRNHJYC+UKvV9OKLL+q6665zcoN1ym6GU+4hcRkWzu4DGRsb08TEhJYvX65SqdT6jSiPq3zrBhVOP0ely9eq+ulHUqGo2vFjquz7i4qXXqOhb98lVUOF7++RNzIuc+QQRySAvvH8889r8eLFmpqa6sXLR+ZD4GpFcjyY4ssvv6xardaibPPkFQLVakbyJAVFyS+oVjkm879DkqkqWH6xZnZMK9z/hoLzL1Nw/irVwooKE5MckQD6xvr161UsFnO7fa0CpNXgiVYDKrrooCkWi5qamjpx5cHU1NRJpZtXHlP51gdO/Lm87v4Tv5dWXVsPk+qs/EVnSOFxFSbP19C3vidVZ6VCkSMSQN9wHR6ub/YOHFYRxvO81BvneZ42bNiQ7B8X6rvjBaV6yJhQ3tBI4+8IDwCQw/v1giSVRpYViCtesSSpxKECAF99QU8zodQpGMoEAJAoUGwDxKoTndF4AWAgOBvKxKqUAQAMbrWRtLKIm1oAgBzqxoRSiRMrT53oAICWlUWmnehJ04nqAwByrDGUSeJZZ5ufcDoWlqtO9EqlwicNAPO0G9Ypwy/7kae7ggF/owAAEZWEZXgkGkyRK7AAYAA0OtGdtft+BhsHAFgAXE4oRaUCAPnmdEIp32FVQvUBADnmYEKp7Bp9hjIBgIFg1VficiwscSMhALhz+PBhV3Ohx+W0E91qZSnLo5McPHhQu3bt6tWbBwA9t3v3bm3evNlZO5jroUxcra9arerBBx/Uxo0b9fTTT5/y9+F7/1DlzVfqv3/wlip/fylihaEqu//A0Qigr6xdu1YrV67U5s2bXZ7hSdpOn9LGu7yR0O/WKazqpx/q+Ou/U+nyG3X8r8/JGx6Tv+gMVfb8UcVV18gcPqDqpx/KGx5T7chBDd/0Ix3fMa3wvTc1dPV3ZY4c0uzeHSpdcYOqB96XOfq5gnMu1uz+NzS05nYVzr6IIxdALixbtkyvvfaak3XF7Kd2ciNh0hdLrFAoaNOmTdq4caNuu+22lssE516iyp7t8krDkufr2Ku/lH/amZr5829V/WS/yrfcJ/Pf/6i46lqFH7wlf8kylb/zkGZem9bMK7+QPzGpmT/9RuHH76h84w8VfviW/LElUnGIIxZALuzevVvT09N67LHHnHYRuGrjXQaIswmltmzZog0bNuiJJ57QXXfdpXffffeUZUpX3qwvtz2p0jfX11/8tKUqLF+p0mVr6/OfFwr1aW39gmSMqof+pfC9N+WXx+VPTNaXXX29vKC+TGHya/LGFqvytxc5agHkwujoqB599FENDXX9i63VhFI2p7Cc9W3YqFarevXVV1UulyVJs7Oz2rFjhy666KvTSsVLrpZXHtf4PT9VYdmF8oZH5Y8v0ew7r6u4co2CFZfKKwQauvoO+WMTqlVDjSxZJvP5vzV8yz1S5bhm9+9SsHKNCstX1t+IC76h8KN9Gr7yJo5aALkwv91zGAyJqg1ZjsbbU4VCQc8++2znd2DxZH3Zcy6uPy5dUa9KLr+hvsBpZ9afnzxfkuRJ8hedLq24tJFAw18tO76kvs6Js1SaOIsjFsDAavRTd3UwRevEYiwsAMg12zNKRgknlAIADKCUHfHZdqKLARUBYBA4HcqkG+kGAMh3qGQXIACA/IrRT51oLKy0gUIgAUC+ZTYWlkmxcsNovACQX42bvZNWIUwoBQBw08Y7vRM97lAmlUpFMzMzfCwAkEClUsk6LDq26UGMFbkupTQ+Ps58HwCQ0Pj4eFZXv1o1zE6HMol7J/rIyAhHAAB0STcmlDIJE8kwJzoALBxxOtGjqgufsbAAIL9SXoUVOxQAAGgZKH7WLwAA6DtWE0rZDutrWx7xtgNAvoMhaTGQbQVCHwgA5FfK0UKsKhCTZcgAAHrGpFg206FMAAA5lrKbIdPh3LkPBAAGh7MJpVzOnQ4AGNCEMZbPnYLh3AEgv1xf6BQ4rCKM53lUIQCQb5lOKJUm3fhoACCnGMoEAJCLysVpJzpXYQHAQHA2lIlVKQMAGNxqI2llETe1AAA51MsJpSITi050AMi9XHaiU30AQI41+qkTFwk2jb6fcuMAAP1fgTgbysQKp7AAIPdsvuhbFRdMKAUAC0SjE91Zu8+EUgCARFxOKEX/BwDkW24nlKL6AIAcy/OEUlyFBQCDwaqvxOVYWFyFBQCDwWknutXKuAoLAPIr66FMUk0oJfpBACDvkrbTp7TxLieU8jmFBQD5FbOfutUVucZVxRH1YgCAwZF4QimrCoSrsABgIDibUIpQAIDBCYZE1UbWFQgAIMca/dRdHUzROrEYCwsAcs32almreUNo8AFggUh5rx6d6ACA6PZc3Z5QCgAw0KFCgADAQhSjnzrRWFhpA4VAAoB8y2wsLJNi5YahTAAgvxr91EmrECaUAgC4aeOd3onOVVgAMDBhETnYrssbCQEAg8G4qkCscSc6AORX1hNKKcXKDaewAGDhcNqJTgUCAPmV8iosZ2EBAFhYMh/OnVNYAND/uj+hVMqRHgEA2QdD0mIg8wqEU2IAkFMpRwuxqkBM0lBgKBMAyDWTYtlMhzKh/wMAcixlN0O2NxJyHwgADAxnE0ox5AkAILLRN5bPAQAWsCBlFWEIGQDoK5lOKJW2ggEA5Jdv2eZnPpQJVQcALNDKJc6d6FbjwwMA+iYI4rThzi/jPSlcGMoEAPJrXhvdqTCwPrNEBQEASJQPcSeU6phWVCAA0BcViE2lkWgok6SM6FQHgDyLaqdjteG+o40wknTkyJEZPh8AyKd5bbRpassTffl30Yl+YkO2b9/+gTEm5GMCgJyVHsaE27dv/0DtO9Bjd6hHBYiJ89zWrVs/3rdv3wt8VACQL/v27Xth69atH9sEgy3PIlj8Fj/BvMe5n5KkYHJyctH09PQDq1atWjc6OnpGoVAI+OgAoDdVx9GjRw/u3bv391NTUz87cODAEUmhpErjce7HzHts/mlbPNgGiJqCY354+HPhMT9IJA03fi+1+Lfzf1pVQq46943671Llftxm9ptjlP3uzuu3+nOrRn8uDCqNn5kWoRF2CBHZBEgQ840y8xp4M2+55g1XY2PndiBoEyDqECIAgM5h0i5EWoVDpx9FhEXLU16BRQXSKWA6bVDYppqJCg+CBADsq5DmEAk7VCQ24dEuExJVIFG/dwqPudcI5y3fqgohPAAgWZBEfZHvVIV0Co/I6TqCmBvst1lpc3AETSES1ffhcm52ABj0ykOyO43V/BjnlFakwCIwbHZqbuOCFiFidHL/h9S5A50AAYCIb/9twkNqfdoqqgpJ9PpBjB3wLUqducewKSiM2p+6avX7Qr0iBwDiNuSdrsZqV41EVR5WVUjgYGf8puDw51UfNpftpr0KK8tLCls9H2fZvGwz+53PbV6o+80xmn47TIcv8J0CxLSpVmIFR5IA6dSZ3swmPOhABwA31YhNiERVHLGHMgksNtKPqDpaLR8nPAgOdOKLUZ4BV5VIu7+zDo2kFUiroDCWJaVtcBAmABCv+ugUJJ0Cw7QJHesgsZ0Bqt3pplaPna60clF5+E2VUKzEtPyW6ztep4tt7pf9HrTPynCMcoym3EbfwTpdVCJRoRG7EvFi7pBtiEj0eQBAL6qSqDBxEh5xA8QmRGyqjSTBMf9S4HaP7Xbcdtmo543Ft5V2/UVqsY5OfUtRj1HbnNV+x1lHnM8q7uea1X7H+aw6vUcco/zfdLXfJuMgSRweSQIkqpKIGxpUIQDgrvqwCQUn4ZE0QNo1/H7MP3dar+nwb02b9ZmU64j7jUcp1+Fim+OsI6tt7sV+mxjHTJr9brWehXCM9mq/OUbjr8M2VFLPPuiyAjExqwoqDQDIX2WSODySNuzt7mBU0/O2o0V2utTM9ryd7SVsilhf1NULiliHYm5znO3o9n73YpvTbEc/77csjzuO0eT7bfp4v5P+dGqTFdGOZ3oKK00YUY0AgNtKo11nfpzqpKcBQkgAQP7DxhmvSxtNoABAnwdGrwKkU7BEXSPdHEDdurrBT7lsknUMwn4nuTrIRHzhaHVFTJLr/vO2352el9JdvcQx6v4YbbffaT+rtJ8hAAAAAAAAAAAAHPo/3Kix9vaFnMcAAAAASUVORK5CYII=',
                'description' => '',
            ],[
                'name' => 'Display',
                'github' => 'display-v1',
                'url' => 'https://display.brickmmo.com/',
                'image' => '',
                'description' => '',
            ],[
                'name' => 'Radio',
                'github' => 'radio-v2',
                'url' => 'https://radio.brickmmo.com/',
                'image' => '',
                'description' => '',
            ],[
                'name' => 'Maps',
                'github' => 'maps-v1',
                'url' => 'https://maps.brickmmo.com/',
                'image' => '',
                'description' => '',
            ],
        );

        foreach($applications as $key => $value)
        {
            Application::factory()->create([
                'name' => $value['name'],
                'github' => $value['github'],
                'url' => $value['url'],
                'image' => $value['image'],
                'description' => $value['description'],
            ]);
        }
        
        // **************************************************
        // **************************************************
        // **************************************************
        // Squares
        include('squares.php');

        // **************************************************
        // **************************************************
        // **************************************************
        // Import Records from SQL Files
        DB::unprepared(file_get_contents(__DIR__ . '/tags.sql'));
        DB::unprepared(file_get_contents(__DIR__ . '/media.sql'));
        DB::unprepared(file_get_contents(__DIR__ . '/media_tag.sql'));

        // **************************************************
        // **************************************************
        // **************************************************
        // Import Records from SQL Files
        // Square Images
        $files = array_diff(scandir(__DIR__.'/square_images'), array('.', '..'));

        $directions = array(
            'n' => 'north',
            'e' => 'east',
            's' => 'south',
            'w' => 'west',
        );

        foreach($files as $file)
        {
            
            $data = explode('-', $file);
            // print_r($data);

            $square = Square::where([
                    'x' => $data[2],
                    'y' => $data[3],
                ])
                ->first();
            // print_r($square);

            $image = [
                'square_id' => $square->id, 
                'direction' => $directions[$data[1]], 
                'image' => 'data:image/jpeg;base64, '.base64_encode(file_get_contents(__DIR__.'/square_images/'.$file)), 
            ];
        
            SquareImage::create($image);
            
        }

    }
}
