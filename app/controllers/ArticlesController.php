<?php

use Blog\Article\ArticleRepositoryInterface;
use Blog\Article\Entity\Article;
use \Blog\Comment\CommentRepositoryInterface;

/**
 * Controller that handles everything article related
 *
 * Class ArticlesController
 */
class ArticlesController extends \BaseController {

	/**
	 * @var ArticleRepositoryInterface
	 */
	protected $articleRepository;

	/**
	 * @var CommentRepositoryInterface
	 */
	protected $commentRepository;

	/**
	 * Inject the Article repository
	 *
	 * @param ArticleRepositoryInterface $articleRepository
	 */
	public function __construct(ArticleRepositoryInterface $articleRepository, CommentRepositoryInterface $commentRepository)
	{
		$this->articleRepository = $articleRepository;
		$this->commentRepository = $commentRepository;
	}

	/**
	 * Gives you a single article based on the slug
	 *
	 * @param $slug
	 * @return mixed
	 */
	public function show($slug)
	{
		/**
		 * @var Article $article
		 */
		$article = $this->articleRepository->findBySlug($slug);

		/**
		 * @var Comment $comment
		 */
		$comments = $this->commentRepository->findAllByArticleId($article->getAttribute('id'));

		return View::make('articles/index', ['article' => $article, 'comments' => $comments]);
	}
}