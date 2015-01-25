<?php namespace Blog\Article\Entity;

use Blog\Article\ArticleRepositoryInterface;

/**
 * Article repository
 *
 * Class ArticleRepository
 * @package Blog\Article\Entity
 */
class ArticleRepository implements ArticleRepositoryInterface {

    /**
     * @var Article $article
     */
    protected $article;

    /**
     * Inject the article model for usage
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        return $this->article = $article;
    }

    /**
     * Find a single article based by its Id
     *
     * @param $articleId
     * @return mixed
     */
    public function findById($articleId)
    {
        return $this->article->where('id', '=', $articleId)->first();
    }

    /**
     * Finds an article based on its slug
     *
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->article->where('slug','=', $slug)->first();
    }

    /**
     * Gives a list of all articles
     *
     * @return mixed
     */
    public function findAll()
    {
        return $this->article->get();
    }
}