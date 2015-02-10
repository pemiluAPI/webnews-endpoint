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
		return $this->apiParser( $this->post->allPostsPaged() );
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
