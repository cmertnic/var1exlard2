<?php

namespace Database\Seeders;

use App\Models\Statue;
use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::insert(
            [
                [
                    'title'=> 'Таганай. Поход на Двуглавую сопку',
                    'path_img'=> 'tour1.jpg',
                    'date'=> '2024-09-29',
                    'price'=> '1950',
                ],
                [
                    'title'=> 'Аракульский Шихан+ озеро Аракуль',
                    'path_img'=> 'tour2.jpg',
                    'date'=> '2024-09-19',
                    'price'=> '2200',
                ],
                [
                    'title'=> 'Хребет Зюраткуль',
                    'path_img'=> 'tour3.jpg',
                    'date'=> '2024-09-10',
                    'price'=> '2300',
                ],
                [
                    'title'=> 'Озеро Тургояк и остров Веры',
                    'path_img'=> 'tour4.jpg',
                    'date'=> '2024-09-03',
                    'price'=> '1650',
                ],
                [
                    'title'=> 'Стеклянная сказка. В гости к стеклодувам!',
                    'path_img'=> 'tour5.jpg',
                    'date'=> '2024-10-07',
                    'price'=> '3000',
                ],
                [
                    'title'=> 'Купеческий Троицк',
                    'path_img'=> 'tour6.jpg',
                    'date'=> '2024-10-02',
                    'price'=> '1900',
                ],
                [
                    'title'=> 'Обзорная экскурсия по Екатеринбургу',
                    'path_img'=> 'tour7.jpg',
                    'date'=> '2024-10-15',
                    'price'=> '2600',
                ],
            ]
        );
    }
}
