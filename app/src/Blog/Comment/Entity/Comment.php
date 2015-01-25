<?php namespace Blog\Comment\Entity;

class Comment extends \Eloquent {
	protected $fillable = ['article_id', 'author', 'contents'];
}