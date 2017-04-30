<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {
            $order = new \App\Order();
            $order->good_id = rand(1,9);
            $order->price = rand(10,500);
            $order->user_id = rand(1,3);
            $order->save();
        }
    }
}
