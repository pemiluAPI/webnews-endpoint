<?php

class PostSource extends \Eloquent 
{
	protected $fillable = ['id', 'name', 'url'];
	protected $hidden = ['created_at', 'updated_at'];
	protected $table = 'post_sources';

	public function post(){
		return $this->hasMany('Post', 'source_id', 'id');
	}

	public function allSources()
	{
		return DB::table($this->table)
			->select(
				'id',
				'name',
				'url'
				)
			->get();
	}

}