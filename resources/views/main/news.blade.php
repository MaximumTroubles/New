@extends('layouts.main')
@section('content')


    <h3 class="text-center">News</h3>
    {{ $news->links() }}
    <div class="news-container">
        @foreach ($news as $item)
            <div class="article-container">
                <div class="img-container">
                    <img src="{{ $item->img }}" alt="{{ $item->title }}">
                </div>
                <div class="text-container">
                    <div class="title-container">
                        <h3>
                            <a href="{{ $item->slug }}">{{ $item->title }}</a>
                        </h3>
                    </div>
                    <div class="about-article-container">
                        <p class="created-at">
                            {{ $item->created_at }}
                        </p>
                        <p class="author">
                           Author: <a href="#{{ $item->user_id }}">user_id {{ $item->user_id }}</a>
                        </p>

                    </div>
                    <div class="short-content-container">
                        <p class="short-content">
                            {{ $item->short_content }}
                        </p>
                    </div>
                </div>
            </div>
        
        @endforeach
    </div>

    {{ $news->links() }}
    
@endsection