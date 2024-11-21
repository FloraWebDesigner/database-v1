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
use App\Models\Road;
use App\Models\Track;
use App\Models\Square;
use App\Models\SqureImage;
use App\Models\Building;

use App\Models\Schedule;
use App\Models\ScheduleType;
use App\Models\ScheduleLog;

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
        // Squares
        


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
                'image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUAAAAFACAIAAABC8jL9AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAFj0lEQVR4nO3cQW4bSRBFweHA97+yvPB6pIJZyMnXjNgKIJukHmrzUa+vr69/gKZ//+8HAP6egCFMwBAmYAgTMIQJGMIEDGEChjABQ9iv7//8er1mnmOh4kbt5Pc6+Vy3XucW/4f/xQkMYQKGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoYwAUPYD1voE0/dDN96nW3b46fuij/z/9AJDGEChjABQ5iAIUzAECZgCBMwhAkYwgQMYQKGMAFD2IUt9InJ/e3kJvbWe23b8U7urp96v/TM53ICQ5iAIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQNrSFfqritvbWPdVs4ASGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoYwAUOYgCHMFvott3bF2+6FPlF85udxAkOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAEDa0hX7qbnby/uRbm+pbz1zceG97nvc5gSFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCLuwhZ7cAxdN3h391Nc58Zn/h05gCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCECRjCXs+7KXeb4kZ3cp/sP/AdTmAIEzCECRjCBAxhAoYwAUOYgCFMwBAmYAgTMIQJGMJ+2EI/dce77XNt2wMXv59td1nP7MCdwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhF24F3rbbvbEni3r+XudKD7P5Pb4xOQu/f3P7gSGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoYwAUOYgCHswhb66G0+eFd84pO/n6furmf+f5zAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCEDW2hT2zbqe7Zu/4xef92cef8mZzAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCE/Xr/JYp718ld8bZ7j09s+00nf68Tk7/F9+/lBIYwAUOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIeyHLfTk3chP3d9ObrwnP/u27/mW1u/lBIYwAUOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIezCvdCTnrq/nXRr57ztO9x2b/bMptoJDGEChjABQ5iAIUzAECZgCBMwhAkYwgQMYQKGMAFDWGwLfWuDum3ru21XfGLyO7y1K558nZnP7gSGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoYwAUOYgCFsaAu9betbvB948k7sp/5et+zZ2zuBIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIe91a2H6mW1vobfcnn3jqM7eexwkMYQKGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoYwAUPYD/dCb7uPd9LkJvbWXnry95rceBc3zDOcwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhP2whT5RvFl68k7jPbvZP279Xtt217ds211/zwkMYQKGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoYwAUPYhS30iU/ezd4yuWF+6nf4PE5gCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCECRjChrbQ7LHtLutbzzP5Oidm7h53AkOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAEGYLvcK2ffKJybujJ9/rxOQ2+3tOYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhAkYwoa20Nu2rJO2bYb37Hjn3+tE6w5qJzCECRjCBAxhAoYwAUOYgCFMwBAmYAgTMIQJGMIEDGEXttDb7isumtnNnivupSfd+lzvf89OYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhAkYwl7bVqbAOScwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCE/QY7QX+TBN1q2AAAAABJRU5ErkJggg==',
                'city_id' => 1,
            ],[
                'name' => 'Reusable QR 3',
                'hash' => '907',
                'url' => 'https://codeadam.ca',
                'image' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUAAAAFACAIAAABC8jL9AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAFlklEQVR4nO3cQW4bQQwAwSjw/7/svCDSJNow7FXV1YA1u1JjLgQf39/fP4Cmn//7AMDfEzCECRjCBAxhAoYwAUOYgCFMwBAmYAj7ev7nx+Mxc46FijNqJ9/XyXNd9X+u4nf4O25gCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCECRjCXsxCn7jrzPBV/2fb7PFd54o/83foBoYwAUOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIeyCWegTk/O3kzOxV33Wtjneybnru+6XnnkuNzCECRjCBAxhAoYwAUOYgCFMwBAmYAgTMIQJGMIEDGFDs9B3tW221u7oT+MGhjABQ5iAIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAhzCz0W05mj6/ajbxtx/K2XdafyQ0MYQKGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoYwAUPY0Cz0Xedmt+2FPnHVmbfNZp/Ydp73uYEhTMAQJmAIEzCECRjCBAxhAoYwAUOYgCFMwBAmYAi7YBZ6ch64qLg7etv/OfGZv0M3MIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhAkYwgQMYY/7bcrdpjijOzmf7Bf4DjcwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCECRjCBAxhL2ah7zrHu+25ts0eF9/Ptl3WM3PgbmAIEzCECRjCBAxhAoYwAUOYgCFMwBAmYAgTMIQJGMK+/vcB/sxVM8PbdhHfdX/ytrnryfc8My/tBoYwAUOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ5iAIeyCWejJGd3i3uPJ9zP57J/8vV91Hnuh4aMJGMIEDGEChjABQ5iAIUzAECZgCBMwhAkYwgQMYY/3pzEnd+1u25+87dmvsu3MxZ3YM9zAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCEvZiF3raPt7jzeds88Lb3c2LyzCf2fO9uYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhAkYwr5mPqY4wzxp297su+67PjH523j/s9zAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCEDc1CX2XbnuoTe3YIn3/Wtnd4YvLMk7Piz7mBIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIezyf2LzrfuDJ3b/F2eNt3+m2Pd4nZp7dDQxhAoYwAUOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ1hsL/RVM8PFGd3J+eRtO5+3nefku5iZb3cDQ5iAIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQ9mIvNM8VZ3SvUpwnn9xzfuL987iBIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIe7EXetus76SrZmLvus95Zu/x+f/ZNsM8ww0MYQKGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoYwAUPYi1noE8XN0tt2Gm+bYT5RPPOJbXPXz7mBIUzAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIu2AW+sQnz82e2Hbmbefhd9zAECZgCBMwhAkYwgQMYQKGMAFDmIAhTMAQJmAIEzCEDc1Cs8fJnPO22fWr5rcn58Bn5uTdwBAmYAgTMIQJGMIEDGEChjABQ5iAIUzAECZgCBMwhJmF/ue2zdZeZXJ39ORnnZiczX7ODQxhAoYwAUOYgCFMwBAmYAgTMIQJGMIEDGEChjABQ9jQLPS2WdZJk7uIt+1YPrFtT3VrB7UbGMIEDGEChjABQ5iAIUzAECZgCBMwhAkYwgQMYQKGsAtmobftK76ryXny4rz0pKue6/337AaGMAFDmIAhTMAQJmAIEzCECRjCBAxhAoYwAUOYgCHssW3KFDjnBoYwAUOYgCFMwBAmYAgTMIQJGMIEDGEChrBfvPqReA1TFb8AAAAASUVORK5CYII=',
                'city_id' => 1,
            ],
        ];

        foreach ($qrs as $qr) {
            Qr::create($qr);
        }

        // **************************************************
        // Radio
        $types = array(
            array('name' => 'Bricksum Word of the Day', 'filename' => 'bricksum.php'),
            array('name' => 'Brix Feature', 'filename' => 'brix.php'),
            array('name' => 'Colour of the Day', 'filename' => 'colour.php'),
            array('name' => 'Control Panel', 'filename' => 'panel.php'),
            array('name' => 'Crypto Update', 'filename' => 'crypto.php'),
            array('name' => 'Featured Store', 'filename' => 'store.php'),
            array('name' => 'Place of the Day', 'filename' => 'places.php'),
            array('name' => 'QR Code', 'filename' => 'qr.php'),
            array('name' => 'Traffic', 'filename' => 'traffic.php'),
            array('name' => 'Upcoming Events', 'filename' => 'events.php'),
        );

        foreach ($types as $type) {
            ScheduleType::create($type);
        }

        
        // **************************************************
        // Maps
        // Copied from http://local.console.brickmmo.com:7777/maps/export


        // **************************************************
        // **************************************************
        // **************************************************


// **************************************************
// Roads
Road::factory()->create(["id" => "2","name" => "Second Avenue","city_id" => "1","created_at" => "2024-11-17 14:44:04","updated_at" => "2024-11-17 14:44:04",]);
Road::factory()->create(["id" => "3","name" => "39th Street","city_id" => "1","created_at" => "2024-11-17 14:44:11","updated_at" => "2024-11-20 09:09:30",]);
Road::factory()->create(["id" => "4","name" => "Diagon Alley","city_id" => "1","created_at" => "2024-11-17 14:44:18","updated_at" => "2024-11-17 14:44:18",]);
Road::factory()->create(["id" => "5","name" => "Blecker Street","city_id" => "1","created_at" => "2024-11-20 09:01:51","updated_at" => "2024-11-20 09:02:13",]);
Road::factory()->create(["id" => "6","name" => "Sesame Street","city_id" => "1","created_at" => "2024-11-20 09:03:15","updated_at" => "2024-11-20 09:03:15",]);
Road::factory()->create(["id" => "7","name" => "Tatooine Street","city_id" => "1","created_at" => "2024-11-20 09:05:12","updated_at" => "2024-11-20 09:05:12",]);
Road::factory()->create(["id" => "8","name" => "Hundred Acre Wood","city_id" => "1","created_at" => "2024-11-20 09:07:01","updated_at" => "2024-11-20 09:07:01",]);
Road::factory()->create(["id" => "9","name" => "Eriador Street","city_id" => "1","created_at" => "2024-11-20 09:09:03","updated_at" => "2024-11-20 09:11:19",]);
Road::factory()->create(["id" => "10","name" => "Grimmauld Place","city_id" => "1","created_at" => "2024-11-20 13:25:28","updated_at" => "2024-11-20 13:25:28",]);


// **************************************************
// Tracks
Track::factory()->create(["id" => "1","name" => "East Loading Track","city_id" => "1","created_at" => "2024-11-19 19:36:59","updated_at" => "2024-11-19 19:47:16",]);
Track::factory()->create(["id" => "3","name" => "Orient Express","city_id" => "1","created_at" => "2024-11-19 19:46:59","updated_at" => "2024-11-19 19:46:59",]);


// **************************************************
// Buildings
Building::factory()->create(["id" => "1","name" => "Boutique Hotel","set" => "10297","colour" => "#95c5a7","number" => "1002","road_id" => "2","city_id" => "1","created_at" => "2024-11-20 11:40:43","updated_at" => "2024-11-20 13:18:17",]);
Building::factory()->create(["id" => "2","name" => "Police Station","set" => "10278","colour" => "#1e3e67","number" => "10278","road_id" => "2","city_id" => "1","created_at" => "2024-11-20 11:49:36","updated_at" => "2024-11-20 13:35:36",]);
Building::factory()->create(["id" => "3","name" => "Mos Eisley Cantina","set" => "75290","colour" => "#ebd298","number" => "121","road_id" => "7","city_id" => "1","created_at" => "2024-11-20 13:34:40","updated_at" => "2024-11-20 13:34:40",]);


// **************************************************
// Squares
$square = Square::factory()->create(["id" => "1","x" => "0","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "2","x" => "1","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "3","x" => "2","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "4","x" => "3","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "5","x" => "4","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "6","x" => "5","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "7","x" => "6","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "8","x" => "7","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "9","x" => "8","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "10","x" => "9","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "11","x" => "10","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "12","x" => "11","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "13","x" => "12","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3,3]);
$square = Square::factory()->create(["id" => "14","x" => "13","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "15","x" => "14","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "16","x" => "15","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "17","x" => "16","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "18","x" => "17","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "19","x" => "18","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "20","x" => "19","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "21","x" => "20","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "22","x" => "21","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "23","x" => "22","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "24","x" => "23","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "25","x" => "24","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "26","x" => "25","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "27","x" => "26","y" => "0","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "28","x" => "0","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "29","x" => "1","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "30","x" => "2","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "31","x" => "3","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "32","x" => "4","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "33","x" => "5","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "34","x" => "6","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "35","x" => "7","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "36","x" => "8","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "37","x" => "9","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "38","x" => "10","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "39","x" => "11","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "40","x" => "12","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "41","x" => "13","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "42","x" => "14","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "43","x" => "15","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "44","x" => "16","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "45","x" => "17","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "46","x" => "18","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "47","x" => "19","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "48","x" => "20","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "49","x" => "21","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "50","x" => "22","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "51","x" => "23","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "52","x" => "24","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "53","x" => "25","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "54","x" => "26","y" => "1","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "55","x" => "0","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "56","x" => "1","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "57","x" => "2","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "58","x" => "3","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "59","x" => "4","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "60","x" => "5","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "61","x" => "6","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "62","x" => "7","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "63","x" => "8","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "64","x" => "9","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "65","x" => "10","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "66","x" => "11","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "67","x" => "12","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "68","x" => "13","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "69","x" => "14","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "70","x" => "15","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "71","x" => "16","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "72","x" => "17","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "73","x" => "18","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "74","x" => "19","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "75","x" => "20","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "76","x" => "21","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "77","x" => "22","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "78","x" => "23","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "79","x" => "24","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "80","x" => "25","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "81","x" => "26","y" => "2","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "82","x" => "0","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "83","x" => "1","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "84","x" => "2","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "85","x" => "3","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "86","x" => "4","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "87","x" => "5","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "88","x" => "6","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "89","x" => "7","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "90","x" => "8","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "91","x" => "9","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "92","x" => "10","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "93","x" => "11","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "94","x" => "12","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "95","x" => "13","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "96","x" => "14","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "97","x" => "15","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "98","x" => "16","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "99","x" => "17","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "100","x" => "18","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "101","x" => "19","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "102","x" => "20","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "103","x" => "21","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "104","x" => "22","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "105","x" => "23","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "106","x" => "24","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "107","x" => "25","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7,8]);
$square = Square::factory()->create(["id" => "108","x" => "26","y" => "3","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7,8]);
$square = Square::factory()->create(["id" => "109","x" => "0","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "110","x" => "1","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "111","x" => "2","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "112","x" => "3","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "113","x" => "4","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "114","x" => "5","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "115","x" => "6","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "116","x" => "7","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,7]);
$square = Square::factory()->create(["id" => "117","x" => "8","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,7]);
$square = Square::factory()->create(["id" => "118","x" => "9","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "119","x" => "10","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "120","x" => "11","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "121","x" => "12","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "122","x" => "13","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "123","x" => "14","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "124","x" => "15","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "125","x" => "16","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "126","x" => "17","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "127","x" => "18","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "128","x" => "19","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "129","x" => "20","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "130","x" => "21","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "131","x" => "22","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "132","x" => "23","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "133","x" => "24","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7]);
$square = Square::factory()->create(["id" => "134","x" => "25","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7,8]);
$square = Square::factory()->create(["id" => "135","x" => "26","y" => "4","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([7,8]);
$square = Square::factory()->create(["id" => "136","x" => "0","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "137","x" => "1","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "138","x" => "2","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "139","x" => "3","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "140","x" => "4","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "141","x" => "5","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "142","x" => "6","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "143","x" => "7","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "144","x" => "8","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "145","x" => "9","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "146","x" => "10","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "147","x" => "11","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "148","x" => "12","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "149","x" => "13","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "150","x" => "14","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "151","x" => "15","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "152","x" => "16","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "153","x" => "17","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "154","x" => "18","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "155","x" => "19","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "156","x" => "20","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "157","x" => "21","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "158","x" => "22","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "159","x" => "23","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "160","x" => "24","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "161","x" => "25","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "162","x" => "26","y" => "5","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "163","x" => "0","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "164","x" => "1","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "165","x" => "2","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "166","x" => "3","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "167","x" => "4","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "168","x" => "5","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "169","x" => "6","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "170","x" => "7","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "171","x" => "8","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "172","x" => "9","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "173","x" => "10","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "174","x" => "11","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "175","x" => "12","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "176","x" => "13","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "177","x" => "14","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "178","x" => "15","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "179","x" => "16","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "180","x" => "17","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "181","x" => "18","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "182","x" => "19","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "183","x" => "20","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "184","x" => "21","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "185","x" => "22","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "186","x" => "23","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "187","x" => "24","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "188","x" => "25","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "189","x" => "26","y" => "6","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "190","x" => "0","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "191","x" => "1","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "192","x" => "2","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "193","x" => "3","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "194","x" => "4","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "195","x" => "5","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "196","x" => "6","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "197","x" => "7","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "198","x" => "8","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "199","x" => "9","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "200","x" => "10","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "201","x" => "11","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "202","x" => "12","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "203","x" => "13","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "204","x" => "14","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "205","x" => "15","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "206","x" => "16","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "207","x" => "17","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "208","x" => "18","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "209","x" => "19","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "210","x" => "20","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "211","x" => "21","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "212","x" => "22","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "213","x" => "23","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "214","x" => "24","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "215","x" => "25","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "216","x" => "26","y" => "7","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "217","x" => "0","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "218","x" => "1","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "219","x" => "2","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "220","x" => "3","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "221","x" => "4","y" => "8","road_rules" => "e","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([9]);
$square = Square::factory()->create(["id" => "222","x" => "5","y" => "8","road_rules" => "e","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([9]);
$square = Square::factory()->create(["id" => "223","x" => "6","y" => "8","road_rules" => "een,ew","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([9]);
$square = Square::factory()->create(["id" => "224","x" => "7","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,9]);
$square = Square::factory()->create(["id" => "225","x" => "8","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,9]);
$square = Square::factory()->create(["id" => "226","x" => "9","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "227","x" => "10","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "228","x" => "11","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "229","x" => "12","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "230","x" => "13","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "231","x" => "14","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "232","x" => "15","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "233","x" => "16","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "234","x" => "17","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "235","x" => "18","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "236","x" => "19","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "237","x" => "20","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "238","x" => "21","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "239","x" => "22","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "240","x" => "23","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "241","x" => "24","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "242","x" => "25","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "243","x" => "26","y" => "8","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "244","x" => "0","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "245","x" => "1","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "246","x" => "2","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "247","x" => "3","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "248","x" => "4","y" => "9","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([9]);
$square = Square::factory()->create(["id" => "249","x" => "5","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "250","x" => "6","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "251","x" => "7","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "252","x" => "8","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "253","x" => "9","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "254","x" => "10","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "255","x" => "11","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "256","x" => "12","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "257","x" => "13","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "258","x" => "14","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "259","x" => "15","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "260","x" => "16","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "261","x" => "17","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "262","x" => "18","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "263","x" => "19","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "264","x" => "20","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "265","x" => "21","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "266","x" => "22","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "267","x" => "23","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "268","x" => "24","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "269","x" => "25","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "270","x" => "26","y" => "9","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "271","x" => "0","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "272","x" => "1","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "273","x" => "2","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "274","x" => "3","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "275","x" => "4","y" => "10","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([9]);
$square = Square::factory()->create(["id" => "276","x" => "5","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "277","x" => "6","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "278","x" => "7","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "279","x" => "8","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "280","x" => "9","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "281","x" => "10","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "282","x" => "11","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "283","x" => "12","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "284","x" => "13","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "285","x" => "14","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "286","x" => "15","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "287","x" => "16","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "288","x" => "17","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "289","x" => "18","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "290","x" => "19","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "291","x" => "20","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "292","x" => "21","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "293","x" => "22","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "294","x" => "23","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "295","x" => "24","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "296","x" => "25","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "297","x" => "26","y" => "10","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "298","x" => "0","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "299","x" => "1","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "300","x" => "2","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "301","x" => "3","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "302","x" => "4","y" => "11","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([9]);
$square = Square::factory()->create(["id" => "303","x" => "5","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "304","x" => "6","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "305","x" => "7","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "306","x" => "8","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "307","x" => "9","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "308","x" => "10","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "309","x" => "11","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "310","x" => "12","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "311","x" => "13","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "312","x" => "14","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "313","x" => "15","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "314","x" => "16","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "315","x" => "17","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "316","x" => "18","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "317","x" => "19","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "318","x" => "20","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "319","x" => "21","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "320","x" => "22","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "321","x" => "23","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "322","x" => "24","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "323","x" => "25","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "324","x" => "26","y" => "11","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "325","x" => "0","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "326","x" => "1","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "327","x" => "2","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "328","x" => "3","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "329","x" => "4","y" => "12","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([9]);
$square = Square::factory()->create(["id" => "330","x" => "5","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "331","x" => "6","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "332","x" => "7","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "333","x" => "8","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "334","x" => "9","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "335","x" => "10","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "336","x" => "11","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "337","x" => "12","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "338","x" => "13","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "339","x" => "14","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "340","x" => "15","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "341","x" => "16","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "342","x" => "17","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "343","x" => "18","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "344","x" => "19","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "345","x" => "20","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "346","x" => "21","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "347","x" => "22","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "348","x" => "23","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "349","x" => "24","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "350","x" => "25","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "351","x" => "26","y" => "12","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "352","x" => "0","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5,6]);
$square = Square::factory()->create(["id" => "353","x" => "1","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5,6]);
$square = Square::factory()->create(["id" => "354","x" => "2","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "355","x" => "3","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "356","x" => "4","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6,9]);
$square = Square::factory()->create(["id" => "357","x" => "5","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "358","x" => "6","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "359","x" => "7","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,6]);
$square = Square::factory()->create(["id" => "360","x" => "8","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,6]);
$square = Square::factory()->create(["id" => "361","x" => "9","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "362","x" => "10","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "363","x" => "11","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "364","x" => "12","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "365","x" => "13","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "366","x" => "14","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "367","x" => "15","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "368","x" => "16","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "369","x" => "17","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "370","x" => "18","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "371","x" => "19","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "372","x" => "20","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "373","x" => "21","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4,6]);
$square = Square::factory()->create(["id" => "374","x" => "22","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "375","x" => "23","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "376","x" => "24","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "377","x" => "25","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6,8]);
$square = Square::factory()->create(["id" => "378","x" => "26","y" => "13","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6,8]);
$square = Square::factory()->create(["id" => "379","x" => "0","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5,6]);
$square = Square::factory()->create(["id" => "380","x" => "1","y" => "14","road_rules" => "e","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5,6]);
$square = Square::factory()->create(["id" => "381","x" => "2","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "382","x" => "3","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "383","x" => "4","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6,9]);
$square = Square::factory()->create(["id" => "384","x" => "5","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "385","x" => "6","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "386","x" => "7","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,6]);
$square = Square::factory()->create(["id" => "387","x" => "8","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,6]);
$square = Square::factory()->create(["id" => "388","x" => "9","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "389","x" => "10","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "390","x" => "11","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "391","x" => "12","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "392","x" => "13","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "393","x" => "14","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "394","x" => "15","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "395","x" => "16","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "396","x" => "17","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "397","x" => "18","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "398","x" => "19","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "399","x" => "20","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "400","x" => "21","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4,6]);
$square = Square::factory()->create(["id" => "401","x" => "22","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "402","x" => "23","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "403","x" => "24","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6]);
$square = Square::factory()->create(["id" => "404","x" => "25","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6,8]);
$square = Square::factory()->create(["id" => "405","x" => "26","y" => "14","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([6,8]);
$square = Square::factory()->create(["id" => "406","x" => "0","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "407","x" => "1","y" => "15","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "408","x" => "2","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "409","x" => "3","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "410","x" => "4","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "411","x" => "5","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "412","x" => "6","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "413","x" => "7","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "414","x" => "8","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "415","x" => "9","y" => "15","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "416","x" => "10","y" => "15","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "417","x" => "11","y" => "15","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "418","x" => "12","y" => "15","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "419","x" => "13","y" => "15","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "420","x" => "14","y" => "15","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "421","x" => "15","y" => "15","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "422","x" => "16","y" => "15","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "423","x" => "17","y" => "15","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "424","x" => "18","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "425","x" => "19","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "426","x" => "20","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "427","x" => "21","y" => "15","road_rules" => "nnw,ne","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "428","x" => "22","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "429","x" => "23","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "430","x" => "24","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "431","x" => "25","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "432","x" => "26","y" => "15","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "433","x" => "0","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "434","x" => "1","y" => "16","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "435","x" => "2","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "436","x" => "3","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "437","x" => "4","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "438","x" => "5","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "439","x" => "6","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "440","x" => "7","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "441","x" => "8","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "442","x" => "9","y" => "16","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "443","x" => "10","y" => "16","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "444","x" => "11","y" => "16","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "445","x" => "12","y" => "16","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "446","x" => "13","y" => "16","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "447","x" => "14","y" => "16","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "448","x" => "15","y" => "16","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "449","x" => "16","y" => "16","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "450","x" => "17","y" => "16","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "451","x" => "18","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "452","x" => "19","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "453","x" => "20","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "454","x" => "21","y" => "16","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "455","x" => "22","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3,1]);
$square = Square::factory()->create(["id" => "456","x" => "23","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "457","x" => "24","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "458","x" => "25","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "459","x" => "26","y" => "16","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "460","x" => "0","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "461","x" => "1","y" => "17","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "462","x" => "2","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "463","x" => "3","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "464","x" => "4","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "465","x" => "5","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "466","x" => "6","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "467","x" => "7","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "468","x" => "8","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "469","x" => "9","y" => "17","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "470","x" => "10","y" => "17","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "471","x" => "11","y" => "17","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "472","x" => "12","y" => "17","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "473","x" => "13","y" => "17","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "474","x" => "14","y" => "17","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "475","x" => "15","y" => "17","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "476","x" => "16","y" => "17","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "477","x" => "17","y" => "17","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "478","x" => "18","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "479","x" => "19","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "480","x" => "20","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "481","x" => "21","y" => "17","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "482","x" => "22","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3,1]);
$square = Square::factory()->create(["id" => "483","x" => "23","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([1]);
$square = Square::factory()->create(["id" => "484","x" => "24","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "485","x" => "25","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "486","x" => "26","y" => "17","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "487","x" => "0","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "488","x" => "1","y" => "18","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "489","x" => "2","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "490","x" => "3","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "491","x" => "4","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "492","x" => "5","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "493","x" => "6","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "494","x" => "7","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "495","x" => "8","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "496","x" => "9","y" => "18","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "497","x" => "10","y" => "18","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "498","x" => "11","y" => "18","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "499","x" => "12","y" => "18","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "500","x" => "13","y" => "18","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "501","x" => "14","y" => "18","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "502","x" => "15","y" => "18","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "503","x" => "16","y" => "18","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "504","x" => "17","y" => "18","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "505","x" => "18","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "506","x" => "19","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "507","x" => "20","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "508","x" => "21","y" => "18","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "509","x" => "22","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "510","x" => "23","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([1]);
$square = Square::factory()->create(["id" => "511","x" => "24","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "512","x" => "25","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "513","x" => "26","y" => "18","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "514","x" => "0","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5,10]);
$square = Square::factory()->create(["id" => "515","x" => "1","y" => "19","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5,10]);
$square = Square::factory()->create(["id" => "516","x" => "2","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([10]);
$square = Square::factory()->create(["id" => "517","x" => "3","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([10]);
$square = Square::factory()->create(["id" => "518","x" => "4","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([10]);
$square = Square::factory()->create(["id" => "519","x" => "5","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([10]);
$square = Square::factory()->create(["id" => "520","x" => "6","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([10]);
$square = Square::factory()->create(["id" => "521","x" => "7","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,10]);
$square = Square::factory()->create(["id" => "522","x" => "8","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,10]);
$square = Square::factory()->create(["id" => "523","x" => "9","y" => "19","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "524","x" => "10","y" => "19","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "525","x" => "11","y" => "19","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "526","x" => "12","y" => "19","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "527","x" => "13","y" => "19","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "528","x" => "14","y" => "19","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "529","x" => "15","y" => "19","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "530","x" => "16","y" => "19","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "531","x" => "17","y" => "19","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "532","x" => "18","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "533","x" => "19","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "534","x" => "20","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "535","x" => "21","y" => "19","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "536","x" => "22","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "537","x" => "23","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([1]);
$square = Square::factory()->create(["id" => "538","x" => "24","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([1]);
$square = Square::factory()->create(["id" => "539","x" => "25","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "540","x" => "26","y" => "19","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "541","x" => "0","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5,10]);
$square = Square::factory()->create(["id" => "542","x" => "1","y" => "20","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5,10]);
$square = Square::factory()->create(["id" => "543","x" => "2","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([10]);
$square = Square::factory()->create(["id" => "544","x" => "3","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([10]);
$square = Square::factory()->create(["id" => "545","x" => "4","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([10]);
$square = Square::factory()->create(["id" => "546","x" => "5","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([10]);
$square = Square::factory()->create(["id" => "547","x" => "6","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([10]);
$square = Square::factory()->create(["id" => "548","x" => "7","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,10]);
$square = Square::factory()->create(["id" => "549","x" => "8","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2,10]);
$square = Square::factory()->create(["id" => "550","x" => "9","y" => "20","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "551","x" => "10","y" => "20","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "552","x" => "11","y" => "20","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "553","x" => "12","y" => "20","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "554","x" => "13","y" => "20","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "555","x" => "14","y" => "20","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "556","x" => "15","y" => "20","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "557","x" => "16","y" => "20","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "558","x" => "17","y" => "20","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "559","x" => "18","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "560","x" => "19","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "561","x" => "20","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "562","x" => "21","y" => "20","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "563","x" => "22","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "564","x" => "23","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "565","x" => "24","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([1]);
$square = Square::factory()->create(["id" => "566","x" => "25","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "567","x" => "26","y" => "20","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "568","x" => "0","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "569","x" => "1","y" => "21","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "570","x" => "2","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "571","x" => "3","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "572","x" => "4","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "573","x" => "5","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "1","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "574","x" => "6","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "1","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "575","x" => "7","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "576","x" => "8","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "577","x" => "9","y" => "21","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "578","x" => "10","y" => "21","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "579","x" => "11","y" => "21","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "580","x" => "12","y" => "21","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "581","x" => "13","y" => "21","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "582","x" => "14","y" => "21","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "583","x" => "15","y" => "21","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "584","x" => "16","y" => "21","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "585","x" => "17","y" => "21","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "586","x" => "18","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "587","x" => "19","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "588","x" => "20","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "589","x" => "21","y" => "21","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "590","x" => "22","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "591","x" => "23","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "592","x" => "24","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([1]);
$square = Square::factory()->create(["id" => "593","x" => "25","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "594","x" => "26","y" => "21","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "595","x" => "0","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "596","x" => "1","y" => "22","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "597","x" => "2","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "598","x" => "3","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "599","x" => "4","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "600","x" => "5","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "1","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "601","x" => "6","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "1","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "602","x" => "7","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "603","x" => "8","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "604","x" => "9","y" => "22","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "605","x" => "10","y" => "22","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "606","x" => "11","y" => "22","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "607","x" => "12","y" => "22","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "608","x" => "13","y" => "22","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "609","x" => "14","y" => "22","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "610","x" => "15","y" => "22","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "611","x" => "16","y" => "22","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "612","x" => "17","y" => "22","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "613","x" => "18","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "614","x" => "19","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "615","x" => "20","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "616","x" => "21","y" => "22","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "617","x" => "22","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "618","x" => "23","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "619","x" => "24","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([1]);
$square = Square::factory()->create(["id" => "620","x" => "25","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "621","x" => "26","y" => "22","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "622","x" => "0","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "623","x" => "1","y" => "23","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "624","x" => "2","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "625","x" => "3","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "626","x" => "4","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "627","x" => "5","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "2","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "628","x" => "6","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "2","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "629","x" => "7","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "630","x" => "8","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "631","x" => "9","y" => "23","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "632","x" => "10","y" => "23","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "633","x" => "11","y" => "23","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "634","x" => "12","y" => "23","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "635","x" => "13","y" => "23","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "636","x" => "14","y" => "23","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "637","x" => "15","y" => "23","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "638","x" => "16","y" => "23","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "639","x" => "17","y" => "23","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "640","x" => "18","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "641","x" => "19","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "642","x" => "20","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "643","x" => "21","y" => "23","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "644","x" => "22","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "645","x" => "23","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "646","x" => "24","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([1]);
$square = Square::factory()->create(["id" => "647","x" => "25","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "648","x" => "26","y" => "23","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "649","x" => "0","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "650","x" => "1","y" => "24","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "651","x" => "2","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "652","x" => "3","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "653","x" => "4","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "654","x" => "5","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "2","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "655","x" => "6","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "2","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "656","x" => "7","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "657","x" => "8","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "658","x" => "9","y" => "24","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "659","x" => "10","y" => "24","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "660","x" => "11","y" => "24","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "661","x" => "12","y" => "24","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "662","x" => "13","y" => "24","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "663","x" => "14","y" => "24","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "664","x" => "15","y" => "24","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "665","x" => "16","y" => "24","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "666","x" => "17","y" => "24","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "667","x" => "18","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "668","x" => "19","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "669","x" => "20","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "670","x" => "21","y" => "24","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "671","x" => "22","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "672","x" => "23","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "673","x" => "24","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "674","x" => "25","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "675","x" => "26","y" => "24","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "676","x" => "0","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "677","x" => "1","y" => "25","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([5]);
$square = Square::factory()->create(["id" => "678","x" => "2","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "679","x" => "3","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "680","x" => "4","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "681","x" => "5","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "3","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "682","x" => "6","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "3","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "683","x" => "7","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "684","x" => "8","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([2]);
$square = Square::factory()->create(["id" => "685","x" => "9","y" => "25","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "686","x" => "10","y" => "25","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "687","x" => "11","y" => "25","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "688","x" => "12","y" => "25","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "689","x" => "13","y" => "25","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "690","x" => "14","y" => "25","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "691","x" => "15","y" => "25","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "692","x" => "16","y" => "25","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "693","x" => "17","y" => "25","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "694","x" => "18","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "695","x" => "19","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "696","x" => "20","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "697","x" => "21","y" => "25","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([4]);
$square = Square::factory()->create(["id" => "698","x" => "22","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "699","x" => "23","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "700","x" => "24","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "701","x" => "25","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "702","x" => "26","y" => "25","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([8]);
$square = Square::factory()->create(["id" => "703","x" => "0","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,5]);
$square = Square::factory()->create(["id" => "704","x" => "1","y" => "26","road_rules" => "n","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,5]);
$square = Square::factory()->create(["id" => "705","x" => "2","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "706","x" => "3","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "707","x" => "4","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "708","x" => "5","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "709","x" => "6","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "710","x" => "7","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,2]);
$square = Square::factory()->create(["id" => "711","x" => "8","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,2]);
$square = Square::factory()->create(["id" => "712","x" => "9","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "713","x" => "10","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "714","x" => "11","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "715","x" => "12","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "716","x" => "13","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "717","x" => "14","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "718","x" => "15","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "719","x" => "16","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "720","x" => "17","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "721","x" => "18","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "722","x" => "19","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "723","x" => "20","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "724","x" => "21","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,4]);
$square = Square::factory()->create(["id" => "725","x" => "22","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square->tracks()->attach([3,3]);
$square = Square::factory()->create(["id" => "726","x" => "23","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "727","x" => "24","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "728","x" => "25","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,8]);
$square = Square::factory()->create(["id" => "729","x" => "26","y" => "26","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,8]);
$square = Square::factory()->create(["id" => "730","x" => "0","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,5]);
$square = Square::factory()->create(["id" => "731","x" => "1","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,5]);
$square = Square::factory()->create(["id" => "732","x" => "2","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "733","x" => "3","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "734","x" => "4","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "735","x" => "5","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "736","x" => "6","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "737","x" => "7","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,2]);
$square = Square::factory()->create(["id" => "738","x" => "8","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,2]);
$square = Square::factory()->create(["id" => "739","x" => "9","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "740","x" => "10","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "741","x" => "11","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "742","x" => "12","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "743","x" => "13","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "744","x" => "14","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "745","x" => "15","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "746","x" => "16","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "747","x" => "17","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "748","x" => "18","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "749","x" => "19","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "750","x" => "20","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "751","x" => "21","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,4]);
$square = Square::factory()->create(["id" => "752","x" => "22","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square->tracks()->attach([3,3]);
$square = Square::factory()->create(["id" => "753","x" => "23","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "754","x" => "24","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3]);
$square = Square::factory()->create(["id" => "755","x" => "25","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,8]);
$square = Square::factory()->create(["id" => "756","x" => "26","y" => "27","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->roads()->attach([3,8]);
$square = Square::factory()->create(["id" => "757","x" => "0","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "758","x" => "1","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "759","x" => "2","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "760","x" => "3","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "761","x" => "4","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "762","x" => "5","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "763","x" => "6","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "764","x" => "7","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "765","x" => "8","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "766","x" => "9","y" => "28","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "767","x" => "10","y" => "28","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "768","x" => "11","y" => "28","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "769","x" => "12","y" => "28","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "770","x" => "13","y" => "28","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "771","x" => "14","y" => "28","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "772","x" => "15","y" => "28","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "773","x" => "16","y" => "28","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "774","x" => "17","y" => "28","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "775","x" => "18","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "776","x" => "19","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "777","x" => "20","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "778","x" => "21","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "779","x" => "22","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square->tracks()->attach([3]);
$square = Square::factory()->create(["id" => "780","x" => "23","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "781","x" => "24","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "782","x" => "25","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "783","x" => "26","y" => "28","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "784","x" => "0","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "785","x" => "1","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "786","x" => "2","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "787","x" => "3","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "788","x" => "4","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "789","x" => "5","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "790","x" => "6","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "791","x" => "7","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "792","x" => "8","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "793","x" => "9","y" => "29","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "794","x" => "10","y" => "29","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "795","x" => "11","y" => "29","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "796","x" => "12","y" => "29","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "797","x" => "13","y" => "29","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "798","x" => "14","y" => "29","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "799","x" => "15","y" => "29","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "800","x" => "16","y" => "29","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "801","x" => "17","y" => "29","road_rules" => "","track_rules" => "","type" => "water","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "802","x" => "18","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "803","x" => "19","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "804","x" => "20","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "805","x" => "21","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "806","x" => "22","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "807","x" => "23","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "808","x" => "24","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "809","x" => "25","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);
$square = Square::factory()->create(["id" => "810","x" => "26","y" => "29","road_rules" => "","track_rules" => "","type" => "ground","building_id" => "0","city_id" => "1","created_at" => "2024-11-16 22:52:36","updated_at" => "2024-11-16 22:52:36",]);



        // **************************************************
        // **************************************************
        // **************************************************

        

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
