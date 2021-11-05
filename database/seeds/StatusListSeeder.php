<?php

use App\StatusList;
use Illuminate\Database\Seeder;

class StatusListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'category' => 'quotation',
                'name'  =>  'generated',
                'variable' => 1
            ],
            [
                'category' => 'quotation',
                'name'  =>  'finalized',
                'variable' => 2
            ],
            [
                'category' => 'quotation',
                'name'  =>  'rejected',
                'variable' => 0
            ],
            [
                'category' => 'subscription',
                'name'  =>  'subscription created',
                'variable' => 1
            ],
            [
                'category' => 'subscription',
                'name'  =>  'quotation generated',
                'variable' => 2
            ],
            [
                'category' => 'subscription',
                'name'  =>  'quotation finalized',
                'variable' => 3
            ],
            [
                'category' => 'subscription',
                'name'  =>  'details added',
                'variable' => 4
            ],
            [
                'category' => 'subscription',
                'name'  =>  'active',
                'variable' => 5
            ],
            [
                'category' => 'subscription',
                'name'  =>  'inactive',
                'variable' => 0
            ],
        ];

        foreach ($statuses as $s) {
            StatusList::create($s);
        }
    }
}
