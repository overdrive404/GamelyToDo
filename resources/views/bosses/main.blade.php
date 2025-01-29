@extends('layouts.layout')
@section('title')
    | Боссы
@endsection
@section('content')
    <script>
        function markHabit() {
                        alert('Ваш персонаж потерял 10 единиц здоровья из-за вредной привычки!');
        }
    </script>

    <div class="card">
        <div class="card-body">

            <div class="container mt-5">
                <h2>БОССЫ</h2>
                <p class="text-muted mb-4"> Твоё здоровье: {{$character->health}} <i class="fa-solid fa-heart"></i> </p>

                <!-- Кнопка для создания навыка -->
                <button id="add-boss-btn" class="btn btn-info">Добавить босса</button>

                <!-- Поле ввода и кнопка создания навыка -->
                <form action="{{route('user.boss.store')}}" method="post" >
                    @csrf
                    <div id="skill-input-container" class="hidden mt-3">
                        <input name="name" id="boss-name" class="form-control mb-4" placeholder="Название вредной привычки" />
                        <input type="submit" class="btn btn-primary" value="Создать">
                    </div>
                </form>
            </div>



            <script>
                // Получаем элементы
                const addButton = document.getElementById('add-boss-btn');
                const inputContainer = document.getElementById('skill-input-container');
                const createBossButton = document.getElementById('create-boss-btn');

                // Событие для показа поля ввода
                addButton.addEventListener('click', () => {
                    inputContainer.classList.toggle('hidden');
                });

                // Событие для обработки создания навыка
                createBossButton.addEventListener('click', () => {
                    const bossName = document.getElementById('boss-name').value;
                    if (bossName) {
                        alert(`босс "${bossName}" успешно создан!`);
                        // Здесь вы можете добавить код для отправки данных на сервер
                        document.getElementById('boss-name').value = ''; // Очистка поля
                        inputContainer.classList.add('hidden'); // Скрыть поле ввода после создания
                    } else {
                        alert('Пожалуйста, введите название вредной привычки.');
                    }
                });
            </script>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th>   </th>
                        <th> Босс </th>
                        <th> Счетчик </th>
                        <th colspan="2">   </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bosses as $boss)
                        <tr>
                            <td> <img class="img-xs" src="{{asset('assets/images/bosses/boss1.svg')}}" alt=""> </td>
                            <td> {{$boss->name}} </td>
                            <td> {{$boss->count}} </td>
                            <td>
                                <form action="{{route('user.boss.damage', $boss->id)}}" method="POST" style="display:inline;">
                                    @csrf
                                    <button onclick="markHabit()" type="submit" class="btn btn-inverse-danger btn-fw">
                                        Совершил вредную привычку
                                    </button>
                                </form>
                            </td>
                            <td>

                                <form action="{{route('user.boss.destroy', $boss->id)}}" method="POST" style="display:inline;">
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
