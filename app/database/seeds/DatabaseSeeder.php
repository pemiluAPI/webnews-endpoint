<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        // Uncomment to seed
        // $this->call('PostSourcesTableSeeder');
        // $this->call('PostsTableSeeder');
    }
}
