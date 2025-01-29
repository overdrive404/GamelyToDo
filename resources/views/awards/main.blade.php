@extends('layouts.layout')
@section('title')
    | Награды
@endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <div class="card">
        <div class="card-body">

            <div class="container mt-5">
                <h1>Награды</h1>
                <p class="text-muted mb-4"> Твоё золото: {{$character->gold}} <i class="fa-solid fa-coins"></i> </p>

                <!-- Кнопка для создания навыка -->
                <button id="add-skill-btn" class="btn btn-info">Добавить награду</button>

                <!-- Поле ввода и кнопка создания навыка -->
                <form action="{{route('user.award.store')}}" method="post" >
                    @csrf
                    <div id="skill-input-container" class="hidden mt-3">
                        <input name="title" id="skill-name" class="form-control mb-4" placeholder="Награда" />
                        <input name="price" id="skill-name" class="form-control mb-4" placeholder="Цена" />
                        <input type="submit" class="btn btn-primary" value="Создать">
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th> Награда </th>
                        <th> Цена </th>
                        <th colspan="2"> Действия </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($awards as $award)
                        <tr>
                            <td> {{$award->title}} </td>
                            <td> {{$award->price}} </td>
                            <td>
                                <form action="{{ route('user.award.buy', $award->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-fw">
                                        Купить
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('user.award.destroy', $award->id)}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fas fa-trash text-danger"> </i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
