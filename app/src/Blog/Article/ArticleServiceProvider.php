<?php namespace Blog\Article;

use Illuminate\Support\ServiceProvider;
use Blog\Article\Entity\ArticleRepository;
use Blog\Article\Entity\Article;

class ArticleServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind('Blog\Article\Entity\Article', function() {
            return new Article;
        });

        $this->app->bind('Blog\Article\ArticleRepositoryInterface', function($app) {
            return new ArticleRepository(
                $app->make('Blog\Article\Entity\Article')
            );
        });
    }
}