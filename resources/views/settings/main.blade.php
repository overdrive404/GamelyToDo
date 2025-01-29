@extends('layouts.layout')
@section('title')
    | Настройки
@endsection
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Настройки аккаунта</h1>

                <h3>Выберите аватарку</h3>

                @if(session('success'))
                    <div>{{ session('success') }}</div>
                @endif

                <form action="{{route('user.settings.updateAvatar')}}" method="POST">
                    @csrf
                    <div class="avatar-container">
                        @foreach($avatars as $avatar)
                            <div>
                                <input type="radio" id="avatar_{{ $avatar }}" name="avatar" value="{{ $avatar }}" style="display: none;">
                                <label for="avatar_{{ $avatar }}" class="avatar" style="background-image: url('{{ asset('assets/images/faces/'.$avatar) }}');"></label>
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-info btn-fw" type="submit">Изменить аватар</button>
                </form>


                <form class="forms-sample mt-5" action="{{route('user.settings.updateName')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h3 class="" >Изменить имя</h3>
                        <input name="name" type="text" class="form-control" id="exampleInputName1" value="{{$user->name}}">
                    </div>
                    <button type="submit" class="btn btn-info btn-fw">Изменить</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Обработчик для выбора аватарок
        document.querySelectorAll('.avatar').forEach(item => {
            item.addEventListener('click', function() {
                // Снимаем выделение с остальных
                document.querySelectorAll('.avatar').forEach(avatar => avatar.classList.remove('selected'));
                // Выделяем выбранную
                this.classList.add('selected');
                // Ставим соответствующую радиокнопку в "выбранное"
                this.previousElementSibling.checked = true;
            });
        });
    </script>
@endsection
