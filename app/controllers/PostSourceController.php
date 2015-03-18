<?php

class PostSourceController extends BaseController {

    /**
     * Post Repository
     *
     * @var Post
     */
    protected $postSource;

    public function __construct(PostSource $postSource)
    {
        $this->postSource = $postSource;
    }

    public function getAll()
    {
        $limit = Input::get('limit', 100);
        $offset = Input::get('offset', 0);

        return XApi::parser($this->postSource->allSources());
    }
}
