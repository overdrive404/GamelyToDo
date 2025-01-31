@extends('layouts.layout')
@section('title')
    | Дневничок
@endsection
@section('content')

    <div class="container">
        <h2>Редактировать пост</h2>

        <form action="{{ route('user.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Заголовок</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
            </div>

            <div class="form-group">
                <label>Текст</label>
                <textarea name="content" class="form-control" rows="4" required>{{ $post->content }}</textarea>
            </div>

            <div class="form-group">
                <label>Изображение</label>
                <input type="file" name="image" class="form-control">
                @if($post->image)
                    <p>Текущее изображение:</p>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Изображение поста" width="150">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Обновить</button>
            <a href="{{ route('user.post.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
@endsection
