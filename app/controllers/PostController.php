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

		return $this->apiParser( $this->post->allPostsPaged($limit, $offset) );
	}

	public function getOne($id)
	{
		return $this->apiParser( $this->post->onePost($id) );
	}

	private function apiParser($posts, $error = 0)
	{
		// Result Template
		$results = array();
		$results['count'] = count($posts);
		$results['data'] = $posts;

		return XApi::response([
			'results' => $results,
			'error' => $error
		]);
	}
}
