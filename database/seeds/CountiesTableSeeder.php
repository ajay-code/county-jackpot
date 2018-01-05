<?php

use App\Models\County;
use Illuminate\Database\Seeder;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counties = [
            ['name' => 'Avon'],
            ['name' => 'Bedfordshire'],
            ['name' => 'Berkshire'],
            ['name' => 'Buckinghamshire'],
            ['name' => 'Cambridgeshire'],
            ['name' => 'Cheshire'],
            ['name' => 'Cleveland'],
            ['name' => 'Cornwall'],
            ['name' => 'Cumbria'],
            ['name' => 'Derbyshire'],
            ['name' => 'Devon'],
            ['name' => 'Dorset'],
            ['name' => 'Durham'],
            ['name' => 'East Sussex'],
            ['name' => 'Essex'],
            ['name' => 'Gloucestershire'],
            ['name' => 'Hampshire'],
            ['name' => 'Herefordshire'],
            ['name' => 'Hertfordshire'],
            ['name' => 'Isle of Wight'],
            ['name' => 'Kent'],
            ['name' => 'Lancashire'],
            ['name' => 'Leicestershire'],
            ['name' => 'Lincolnshire'],
            ['name' => 'London'],
            ['name' => 'Merseyside'],
            ['name' => 'Middlesex'],
            ['name' => 'Norfolk'],
            ['name' => 'Northamptonshire'],
            ['name' => 'Northumberland'],
            ['name' => 'North Humberside'],
            ['name' => 'North Yorkshire'],
            ['name' => 'Nottinghamshire'],
            ['name' => 'Oxfordshire'],
            ['name' => 'Rutland'],
            ['name' => 'Shropshire'],
            ['name' => 'Somerset'],
            ['name' => 'South Humberside'],
            ['name' => 'South Yorkshire'],
            ['name' => 'Staffordshire'],
            ['name' => 'Suffolk'],
            ['name' => 'Surrey'],
            ['name' => 'Tyne and Wear'],
            ['name' => 'Warwickshire'],
            ['name' => 'West Midlands'],
            ['name' => 'West Sussex'],
            ['name' => 'West Yorkshire'],
            ['name' => 'Wiltshire'],
            ['name' => 'Worcestershire'],
        ];
        County::insert($counties);
    }
}
