<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            ['key' => 'maintenance', 'value' => 0],
            ['key' => 'theme', 'value' => 'default'],
            ['key' => 'recaptcha', 'value' => 0],
            ['key' => 'recaptcha_site_key', 'value' => null],
            ['key' => 'recaptcha_secret_key', 'value' => null],
            ['key' => 'seo_title', 'value' => 'Paymenter'],
            ['key' => 'seo_description', 'value' => 'Change this description in settings'],
            ['key' => 'seo_keywords', 'value' => null],
            ['key' => 'seo_twitter_card', 'value' => 1],
            ['key' => 'seo_image', 'value' => 'https://paymenter.org/assets/images/paymenter.png'],
            ['key' => 'currency_sign', 'value' => '$'],
            ['key' => 'home_page_text', 'value' => 'Welcome to Paymenter'],
            ['key' => 'advanced_mode', 'value' => false],
            ['key' => 'currency_position', 'value' => 'left'],
            ['key' => 'app_name', 'value' => 'Paymenter'],
            ['key' => 'sidebar', 'value' => 0],
            ['key' => 'currency', 'value' => 'USD'],
            ['key' => 'language', 'value' => 'en'],
            ['key' => 'snow', 'value' => 0],
            ['key' => 'allow_auto_log', 'value' => 0],
        ];

        DB::table('settings')->insert($settings);
    }
}
