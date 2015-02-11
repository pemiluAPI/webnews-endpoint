<?php

class PostController extends BaseController {

	/**
	 * Post Repository
	 *
	 * @var Post
	 */
	protected $post;

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	public function getAll()
	{
		$limit = Input::get('limit', 100);
		$offset = Input::get('offset', 0);
		$source = Input::get('source', 0);

		return XApi::parser( $this->post->allPostsPaged($limit, $offset, $source) );
	}

	public function getOne($id)
	{
		return XApi::parser( $this->post->onePost($id) );
	}

}
