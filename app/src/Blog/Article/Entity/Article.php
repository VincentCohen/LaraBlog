<?php namespace Blog\Article\Entity;

class Article extends \Eloquent {
	protected $fillable = ['title', 'slug', 'author', 'description', 'contents'];
}