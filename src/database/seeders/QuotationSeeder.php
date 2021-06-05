<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuotationSeeder extends Seeder
{
    private $dataSet = [
        [
            'user_id' => 2,
            'quotation' => 'D\'oh!'
        ],
        [
            'user_id' => 3,
            'quotation' => 'Go out on a Tuesday? Who am I, Charlie Sheen?'
        ],
        [
            'user_id' => 3,
            'quotation' => 'I don\'t mind if you pee in the shower, but only if you\'re taking a shower.'
        ],
        [
            'user_id' => 4,
            'quotation' => 'We want chilly-willy! We want chilly-willy!'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quotations')->insert($this->dataSet);
    }
}
