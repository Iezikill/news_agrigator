<?php

namespace App\Services;

class SocialDrivers
{
    public static function getSocialDriverInfo(): array
    {
        $drivers = [
            'vkontakte' => [
                'driverName' => 'vkontakte',
                'img' => 'assets/images/vk.png',
                'name' => 'Vkontakte',
            ],
            'github' => [
                'driverName' => 'github',
                'img' => 'assets/images/github.png',
                'name' => 'GitHub',
            ],
        ];

        return $drivers;
    }

}
