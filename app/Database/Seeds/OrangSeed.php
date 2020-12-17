<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class OrangSeed extends \CodeIgniter\Database\Seeder
{
     public function run()
     {
          // $data = [
          //      [

          //           'nama'       => 'Dicky Ikba Pratama',
          //           'alamat'     => 'Jl.Jendsud',
          //           'created_at' => Time::now(),
          //           'updated_at' => Time::now()
          //      ],

          //      [

          //           'nama'       => 'Minato Namikaze',
          //           'alamat'     => 'Konoha',
          //           'created_at' => Time::now(),
          //           'updated_at' => Time::now()
          //      ],
          //      [

          //           'nama'       => 'Hashirama Senju',
          //           'alamat'     => 'Konoha',
          //           'created_at' => Time::now(),
          //           'updated_at' => Time::now()
          //      ]
          // ];
          $faker = \Faker\Factory::create('id_ID');

          for ($i = 0; $i < 10; $i++) {

               $data = [

                    'nama'       => $faker->name,
                    'alamat'     => $faker->address,
                    'created_at' => Time::createFromTimestamp($faker->unixTime()),
                    'updated_at' => Time::now()
               ];
               $this->db->table('orang')->insert($data);
          }


          // Simple Queries
          // $this->db->query(
          //      "INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:,:updated_at:)",
          //      $data
          // );

          // Using Query Builder
          // $this->db->table('orang')->insertBatch($data);
     }
}
