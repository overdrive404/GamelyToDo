@extends('layouts.layout')

@section('title', ' | Дневник')

@section('content')

    <div class="container mt-3">
        <div class="post-header text-center mb-4">
            <h2>{{ $post->title }}</h2>
            <p class="text-muted">Опубликовано {{ $post->created_at->diffForHumans() }}</p>
        </div>

        @if($post->image)
            <div class="text-center mb-4">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="Изображение поста">
            </div>
        @endif

        <div class="post-content">
            <p>{{ $post->content }}</p>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('user.post.index') }}" class="btn btn-secondary">Назад к записям</a>
            <a href="{{ route('user.post.edit', $post->id) }}" class="btn btn-info">Редактировать</a>

            <form action="{{ route('user.post.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Вы уверены, что хотите удалить этот пост?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>

@endsection
