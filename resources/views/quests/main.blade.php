@extends('layouts.layout')
@section('title')
    | Квесты
@endsection
@section('content')

    <form action="{{route('user.quest.create')}}" method="GET" style="display:inline;" class="p-4">
            <button type="submit" class="btn btn-primary">Создать Квест</button>
    </form>
    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Список квестов</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> Описание </th>
                                <th> Сложность </th>
                                <th> Характеристика </th>
                                <th> Навык </th>
                                <th> Опыт навыка</th>
                                <th> Опыт </th>
                                <th> Золото </th>
                                <th colspan="3"> Действия </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($quests as $quest)
                                <tr>
                                    <td class="break-word">{{ $quest->description }}</td> <!-- Используем класс break-word -->
                                    <td>
                                        @switch($quest->difficulty)
                                            @case('easy') Легкий @break
                                            @case('normal') Нормальный @break
                                            @case('hard') Сложный @break
                                            @case('extreme') Экстремальный @break
                                            @default Неизвестно
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($quest->characteristic)
                                            @case('strength') Сила @break
                                            @case('intelligence') Интеллект @break
                                            @case('creativity') Творчество @break
                                            @case('health') Здоровье @break
                                            @default Неизвестно
                                        @endswitch
                                    </td>
                                    <td>{{ $quest->skill ? $quest->skill->title : 'Нет навыка' }}</td>
                                    <td>
                                        @switch($quest->difficulty)
                                            @case('easy')
                                                5
                                                @break
                                            @case('normal')
                                                10
                                                @break
                                            @case('hard')
                                                15
                                                @break
                                            @case('extreme')
                                                20
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($quest->difficulty)
                                            @case('easy')
                                                5
                                                @break
                                            @case('normal')
                                                10
                                                @break
                                            @case('hard')
                                                15
                                                @break
                                            @case('extreme')
                                                20
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($quest->difficulty)
                                            @case('easy')
                                                5
                                                @break
                                            @case('normal')
                                                10
                                                @break
                                            @case('hard')
                                                15
                                                @break
                                            @case('extreme')
                                                20
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <form action="{{ route('user.quest.complete', $quest->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="bg-success">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>

                                        <a href="{{route('user.quest.edit', $quest->id)}}"> <i class="fas fa-pen"></i> </a>
                                    </td>
                                    <td>

                                        <form action="{{ route('user.quest.destroy', $quest->id) }}" method="POST" style="display:inline;">
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
        </div>
    </div>

@endsection
