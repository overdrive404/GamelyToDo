@extends('layouts.layout')
@section('title')
    | Дневничок
@endsection
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4>Создать запись в дневнике</h4>
                <p class="card-description">Расскажи, что нового произошло</p>
                <form class="forms-sample" method="POST" action="{{ route('user.post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок" required>
                    </div>

                    <div class="form-group">
                        <label>Добавить к посту картинку:</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="content">Текст</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Создать</button>
                </form>
            </div>
        </div>
    </div>


@endsection
