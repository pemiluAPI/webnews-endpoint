<?php

class Post extends \Eloquent 
{
	protected $fillable = array('id', 'title', 'publish_date', 'content', 'excerpt', 'link', 'image_src', 'source_id');
	protected $hidden = array('created_at', 'updated_at');
	protected $table = 'posts';

	public function postSource()
	{
		return $this->hasOne('PostSource', 'id', 'source_id');
	}

	public function allPosts()
	{
		return DB::table($this->table)
			->join('post_sources', 'posts.source_id', '=', 'post_sources.id')
			->select(
				'posts.id',
				'posts.title',
				'posts.publish_date',
				'posts.excerpt',
				'posts.url',
				'posts.image_src as image',
				'post_sources.name as source_name'
				)
			->get();
	}

	public function allPostsPaged($limit=100, $offset=0, $source=null)
	{
		$query = DB::table($this->table);

		if (!empty($source))
		{
			$query = $query->where('posts.source_id', '=', $source);
		}

		$query = $query->join('post_sources', 'posts.source_id', '=', 'post_sources.id')
			->select(
				'posts.id',
				'posts.title',
				'posts.publish_date',
				'posts.excerpt',
				'posts.url',
				'posts.image_src as image',
				'post_sources.name as source_name'
				)
			->orderBy('posts.publish_date', 'desc')
			->skip($offset)->take($limit)
			->get();

		return $query;
	}

	public function onePost($post_id)
	{
		return DB::table($this->table)
			->where('posts.id', '=', $post_id)
			->join('post_sources', 'posts.source_id', '=', 'post_sources.id')
			->select(
				'posts.id',
				'posts.title',
				'posts.publish_date',
				'posts.excerpt',
				'posts.content',
				'posts.url',
				'posts.image_src as image',
				'post_sources.name as source_name'
				)
			->get();
	}
}