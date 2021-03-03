<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->truncate();

        $data = [
            [    
                'image' => "/storage/galleries/1.jpg",
                'product_id' => 1,
                'user_id' => 2,
            ],
            [    
                'image' => "/storage/galleries/13.jpg",
                'product_id' => 1,
                'user_id' => 2,
            ],
            [    
                'image' => "/storage/galleries/14.jpg",
                'product_id' => 1,
                'user_id' => 2,
            ],
            [    
                'image' => "/storage/galleries/2.jpg",
                'product_id' => 2,
                'user_id' => 2,
            ],
            [    
                'image' => "/storage/galleries/15.jpg",
                'product_id' => 2,
                'user_id' => 2,
            ],
            [    
                'image' => "/storage/galleries/16.jpg",
                'product_id' => 2,
                'user_id' => 2,
            ],
            [    
                'image' => "/storage/galleries/3.jpg",
                'product_id' => 3,
                'user_id' => 2,
            ],
            [    
                'image' => "/storage/galleries/18.jpg",
                'product_id' => 3,
                'user_id' => 2,
            ],
            [    
                'image' => "/storage/galleries/19.jpg",
                'product_id' => 3,
                'user_id' => 2,
            ],
            [    
                'image' => "/storage/galleries/12.jpg",
                'product_id' => 3,
                'user_id' => 12,
            ],
            [    
                'image' => "/storage/galleries/11.jpg",
                'product_id' => 3,
                'user_id' => 11,
            ],
            [    
                'image' => "/storage/galleries/10.jpg",
                'product_id' => 3,
                'user_id' => 10,
            ],
            [    
                'image' => "/storage/galleries/9.jpg",
                'product_id' => 3,
                'user_id' => 9,
            ],
        ];

        DB::table('galleries')->insert($data);
    }
}
