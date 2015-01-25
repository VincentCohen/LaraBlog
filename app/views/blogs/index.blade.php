@extends('layout')

@section('content')
    <div class="list">
    @foreach ($articles as $article)
        <article>
            <div class="article-head">
                <h2 class="article-title"><a href="articles/{{ $article->slug }}">{{ $article->title }}</a></h2>
                <span class="article-author">Posted by {{ $article->author}} on {{ $article->created_at }}</span>
            </div>
            <div class="article-description">
                <p>{{ $article->description }}</p>
            </div>

        </article>
    @endforeach
    </div>
@stop