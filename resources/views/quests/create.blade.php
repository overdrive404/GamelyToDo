@extends('layouts.layout')
@section('title')
    | Создать квест
@endsection
@section('content')


    <div class="col-12 grid-margin stretch-card ">
        <div class="card">
            <div class="card-body">
                <div class="container mt-5">
                    <h1>Добавить Квест</h1>
                    <form action="{{ route('user.quest.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="difficulty">Сложность</label>
                            <select class="form-control" id="difficulty" name="difficulty" required>
                                <option value="easy">Легкий</option>
                                <option value="normal">Нормальный</option>
                                <option value="hard">Трудный</option>
                                <option value="extreme">Экстремальный</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="characteristic">Характеристика</label>
                            <select class="form-control" id="characteristic" name="characteristic" required>
                                <option value="strength">Сила</option>
                                <option value="intelligence">Интеллект</option>
                                <option value="health">Здоровье</option>
                                <option value="creativity">Креативность</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="skill_id">Навык (необязательно)</label>
                            <select class="form-control" id="skill_id" name="skill_id">
                                <option value="">Выберите навык (необязательно)</option>
                                @foreach($skills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить Квест</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
