<?php namespace Blog\Comment;

interface CommentRepositoryInterface
{
    /**
     * Method to find all comments by ArticleId
     *
     * @param $articleId
     * @return mixed
     */
    public function findAllByArticleId($articleId);

    /*
     * Method to create a new comment
     */
    public function create($articleId, $contents);
}