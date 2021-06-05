<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    private $dataSet = [
        [
            'username' => 'edna.krabappel',
            'firstname' => 'Edna',
            'surname' => 'Krabappel',
            'address' => '82 Evergreen Terrace Springfield'
        ],
        [
            'username' => 'homer.simpson',
            'firstname' => 'Homer',
            'surname' => 'Simpson',
            'address' => '742 Evergreen Terrace Springfield'
        ],
        [
            'username' => 'marge.simpson',
            'firstname' => 'Marge',
            'surname' => 'Simpson',
            'address' => '742 Evergreen Terrace Springfield'
        ],
        [
            'username' => 'barney.gumble',
            'firstname' => 'Barney',
            'surname' => 'Gumble',
            'address' => 'Moes Taverne Springfield'
        ],
        [
            'username' => 'apu.nahasapeemapetilon',
            'firstname' => 'Apu',
            'surname' => 'Nahasapeemapetilon',
            'address' => 'Kwik-E-Mart Springfield'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->dataSet);
    }
}
