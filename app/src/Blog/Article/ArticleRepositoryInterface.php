<?php namespace Blog\Article;

interface ArticleRepositoryInterface
{
    /**
     * Method to find by id
     *
     * @param $articleId
     * @return mixed
     */
    public function findById($articleId);

    /**
     * Method to find an article based on its slug
     *
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);
}