@extends('layouts.layout')
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



            <script>
                // Получаем элементы
                const addButton = document.getElementById('add-skill-btn');
                const inputContainer = document.getElementById('skill-input-container');
                const createSkillButton = document.getElementById('create-skill-btn');

                // Событие для показа поля ввода
                addButton.addEventListener('click', () => {
                    inputContainer.classList.toggle('hidden');
                });

                // Событие для обработки создания навыка
                createSkillButton.addEventListener('click', () => {
                    const skillName = document.getElementById('skill-name').value;
                    if (skillName) {
                        alert(`Навык "${skillName}" успешно создан!`);
                        // Здесь вы можете добавить код для отправки данных на сервер
                        document.getElementById('skill-name').value = ''; // Очистка поля
                        inputContainer.classList.add('hidden'); // Скрыть поле ввода после создания
                    } else {
                        alert('Пожалуйста, введите название навыка.');
                    }
                });
            </script>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th> Навык </th>
                        <th> Прогресс </th>
                        <th> Уровень </th>
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
                        </tr>
                    @endforeach




                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
