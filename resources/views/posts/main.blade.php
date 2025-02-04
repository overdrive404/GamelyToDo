@extends('layouts.layout')

@section('title', ' | Дневник')

@section('content')
    <div class="container mt-3">

        <h2 class="my-4 text-center">Мои записи</h2>
        <form action="{{route('user.post.create')}}" method="GET" style="display:inline;" class="p-4">
            <button type="submit" class="btn btn-primary">Создать пост</button>
        </form>
        @if($posts->count())
            <div class="row mt-3">
                @foreach($posts as $post)
                    <div class="col-md-6">
                        <div class="card mb-4">
                            @if($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Изображение поста">
@endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                                    <p class="text-muted">Опубликовано {{ $post->created_at->diffForHumans() }}</p>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{route('user.post.show', $post->id)}}" class="btn btn-primary">Подробнее</a>

                                        <div class="d-flex align-items-center">
                                            <!-- Кнопка редактирования -->
                                            <a href="{{ route('user.post.edit', $post->id) }}" class="btn btn-link text-primary me-3 p-0">
                                                <i class="fa-solid fa-pencil fa-lg"></i>
                                            </a>

                                            <!-- Кнопка удаления -->
                                            <form action="{{ route('user.post.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этот пост?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0">
                                                    <i class="fa-solid fa-trash-can fa-lg"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Пагинация -->
            <div class="d-flex justify-content-center">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        @else
            <p class="text-center">Пока нет записей в дневнике.</p>
        @endif
    </div>
@endsection
