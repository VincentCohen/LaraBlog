<?php
use Blog\Article\ArticleRepositoryInterface;
use Blog\Comment\CommentRepositoryInterface;
use Illuminate\Support\Facades\Redirect;

/**
 * Class CommentsController
 */
class CommentsController extends \BaseController {

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

	public function create()
	{
		$method = Request::method();

		if (Request::isMethod('post'))
		{
			$articleId = Input::get('article_id');
			$contents = Input::get('contents');

			$article = $this->articleRepository->findById($articleId);

			if ($article && $contents)
			{
				if ($comment = $this->commentRepository->create($articleId, $contents))
				{
					Session::flash('message', "Thanks for joining in the conversation!");

					return Redirect::to('articles/'.$article->getAttribute('slug'));
				}
			}
		}

	}

}