@extends('layout')

@section('content')
    <div class="single">
        <article>
            <div class="article-head">
                <h2 class="article-title"><a href="articles/{{ $article->slug }}">{{ $article->title }}</a></h2>
                <span class="article-author">Posted by {{ $article->author}} on {{ $article->created_at }}</span>
            </div>
            <div class="article-description">
                <p>{{ $article->description }}</p>
            </div>
            <div class="article-contents">
                {{ $article->contents }}
            </div>
        </article>

        <section id="comments">
            @if (Session::has('message'))
                <div class="message green">{{ Session::get('message') }}</div>
            @endif

            <h3>Comments</h3>
            <form method="post" action="comments">

                <input type="hidden" name="article_id" value="{{ $article->id }}"/>
                <textarea name="contents"></textarea>

                <input type="submit"/>
            </form>

            @foreach ($comments as $comment)
                <div class="comment">
                    <strong class="comment-author">{{ $comment->author == '' ? 'Anon' : $comment->author }}</strong>
                    <span class="comment-date">{{ $comment->created_at }}</span>

                    <p>{{ $comment->contents }}</p>
                </div>
            @endforeach
        </section>
    </div>

@stop