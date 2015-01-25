<?php
use \Blog\Article\ArticleRepositoryInterface;

class BlogController extends \BaseController {

    /**
     * @var ArticleRepositoryInterface $articleRepository
     */
    protected $articleRepository;

    /**
     * Inject the ArticleRepository
     *
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

	/**
	 * Display a listing of the resource.
	 * GET /blogs
	 *
	 * @return Response
	 */
	public function index()
	{
        $articles = $this->articleRepository->findAll();

        return View::make('blogs/index', ['articles' => $articles]);
	}

}