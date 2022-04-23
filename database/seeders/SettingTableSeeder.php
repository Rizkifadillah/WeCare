<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::query()->updateOrCreate(
            [
                'email' => 'wecare@gmail.org'
            ],
            [
                'email' => 'wecare@gmail.org',
                'phone' => '081222333444',
                'phone_hours' => 'Senin - Jum\'at, 08:00 s/d 16:00',
                'instagram_link' => '-',
                'twitter_link' => '-',
                'fanpage_link' => '-',
                'google_plus_link' => '-',
                'short_description' => '-',
                'keyword' => '-',
                'about' => '-',
                'address' => '-',
                'postal_code' => 12345,
                'city' => '-',
                'province' => '-',
            ]
        );
    }
}
