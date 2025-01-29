@extends('layouts.layout')
@section('title')
    | Навыки
@endsection
@section('content')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <div class="card">
        <div class="card-body">

            <div class="container mt-5">
                <h2>Навыки героя</h2>

                <!-- Кнопка для создания навыка -->
                <button id="add-skill-btn" class="btn btn-info">Добавить навык</button>

                <!-- Поле ввода и кнопка создания навыка -->
                <form action="{{route('user.skill.store')}}" method="post" >
                    @csrf
                    <div id="skill-input-container" class="hidden mt-3">
                        <input name="title" id="skill-name" class="form-control mb-4" placeholder="Название навыка" />
                        <input type="submit" class="btn btn-primary" value="Создать">
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th> Навык </th>
                        <th> Прогресс </th>
                        <th> Уровень </th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($skills as $skill)
                        <tr>
                            <td> {{$skill->title}} </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$skill->experience}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td> {{$skill->level}} </td>
                            <td>

                                <form action="{{ route('user.skill.destroy', $skill->id) }}" method="POST" style="display:inline;">
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
