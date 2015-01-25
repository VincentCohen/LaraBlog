<?php namespace Blog\Comment;

use Illuminate\Support\ServiceProvider;
use Blog\Comment\Entity\CommentRepository;
use Blog\Comment\Entity\Comment;

class CommentServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Blog\Comment\Entity\Comment', function() {
            return new Comment;
        });

        $this->app->bind('Blog\Comment\CommentRepositoryInterface', function($app) {
            return new CommentRepository(
                $app->make('Blog\Comment\Entity\Comment')
            );
        });
    }
}