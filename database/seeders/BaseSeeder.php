<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Address;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'service_name' => 'Design',
                'service_price' => 110,
                'service_code' => 'D10',
                'service_type' => 1
            ],
            [
                'service_name' => 'Development',
                'service_price' => 5000,
                'service_code' => 'D12',
                'service_type' => 1
            ],
            [
                'service_name' => 'Meetings',
                'service_price' => 60,
                'service_code' => 'D15',
                'service_type' => 1
            ],
            [
                'service_name' => 'Tax',
                'service_price' => 10,
                'service_code' => 'T01',
                'service_type' => 9
            ]
        ];
        
        $address = [
            [
                'address_recipient_name' => 'John Doe',
                'address_location' => '23 Omaha Beach, France'
            ],
            [
                'address_recipient_name' => 'Michael Angelo',
                'address_location' => '23 Vatican, Rome'
            ],
            [
                'address_recipient_name' => 'Ir. Soekarno',
                'address_location' => '12 Jakarta, Indonesia'
            ]
        ];

        foreach ($services as $key => $value) {
            $newService = new Service();
            $newService->service_name = $value['service_name'];
            $newService->service_price = $value['service_price'];
            $newService->service_code = $value['service_code'];
            $newService->service_type = $value['service_type'];
            $newService->save();
        }

        foreach ($address as $key => $value) {
            $newAddress = new Address();
            $newAddress->address_recipient_name = $value['address_recipient_name'];
            $newAddress->address_location = $value['address_location'];
            $newAddress->save();
        }
    }
}
