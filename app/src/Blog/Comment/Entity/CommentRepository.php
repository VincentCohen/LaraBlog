<?php namespace Blog\Comment\Entity;

use Blog\Comment\CommentRepositoryInterface;

/**
 * Comment repository
 *
 * Class CommentRepository
 * @package Blog\Comment\Entity
 */
class CommentRepository implements CommentRepositoryInterface {

    /**
     * @var Comment $comment
     */
    protected $comment;

    /**
     * Inject the Comment model for usage
     *
     * @param ->comment $comment
     */
    public function __construct(Comment $comment)
    {
        return $this->comment = $comment;
    }

    /**
     * Find a single Comment based by its Id
     *
     * @param $commentId
     * @return mixed
     */
    public function findAllByArticleId($articleId)
    {
        return $this->comment
            ->where('article_id', '=', $articleId)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * Gives a list of all Comments
     *
     * @return mixed
     */
    public function findAll()
    {
        return $this->comment->get();
    }

    /**
     * Creates a new comment
     *
     * @param $article_id
     * @param $contents
     */
    public function create($articleId, $contents)
    {
        $comment = new $this->comment;
        $comment->article_id = (int) $articleId;
        $comment->contents = nl2br(htmlentities($contents));

        $comment->save();

        return $comment;
    }
}