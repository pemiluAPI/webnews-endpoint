<?php

class PostSourcesTableSeeder extends Seeder {

	public function run()
	{
		$table_name = 'post_sources';

		// Truncate table
		DB::table($table_name)->truncate();;

		$dataSources = array(
			array('name' => 'IPC',						'url' => 'http://ipc.or.id/?cat=3'),
			array('name' => 'parlement.net',			'url' => 'http://parlemen.net/'),
			array('name' => 'PSHK',						'url' => 'http://pshk.or.id/site/?q=id/liputan'),
			array('name' => 'Rumah Pemilu',				'url' => 'http://www.rumahpemilu.org/in'),
			array('name' => 'DPR',						'url' => 'http://dpr.go.id/agenda/index/'),
			array('name' => 'Selasar',					'url' => 'https://www.selasar.com/'),
			array('name' => 'Public Virtue Institute',	'url' => 'http://virtue.or.id/'),
		);

		// Insert Data
		DB::table($table_name)->insert($dataSources);
	}

}