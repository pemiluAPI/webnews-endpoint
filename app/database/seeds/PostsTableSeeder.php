<?php

class PostsTableSeeder extends Seeder {

	public function run()
	{
		$table_name = 'posts';

		// Truncate table
		DB::table($table_name)->truncate();;

		$dataSources = array();

		for ($i=0; $i < 10; $i++) { 
				$dataSources[$i]['title'] = 'IPC';
				$dataSources[$i]['publish_date'] = date("Y-m-d H:i:s");
				$dataSources[$i]['content'] = 'Very long description no one will ever read.';
				$dataSources[$i]['excerpt'] = 'Short description.';
				$dataSources[$i]['url'] = 'http://google.com';
				$dataSources[$i]['image_src'] = (rand(0,1)) ? 'http://lorempixel.com/400/200/sports/' . ($i+1) . '/' : '';
				$dataSources[$i]['source_id'] = rand(1,7);
		}

		// Insert data
		DB::table($table_name)->insert($dataSources);
	}

}