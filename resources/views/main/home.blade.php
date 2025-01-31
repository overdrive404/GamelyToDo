@extends('layouts.layout')
@section('content')


    <div class="row">
        <div class="col-sm-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Сила</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0"> {{$character->strength_level}}
                                    <i class="fa-solid fa-dumbbell"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Интеллект</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{$character->intelligence_level}}
                                    <i class="fa-solid fa-brain"></i>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Творчество</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{$character->creativity_level}} <i class="fa-solid fa-palette"></i></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Статистика</h4>
                                <div class="position-relative">
                                    <div class="daoughnutchart-wrapper">
                                        <img src="{{asset('assets/images/character/body-character.svg')}}">
                                    </div>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th> {{$character->name}}  </th>
                                            <th> Уровень {{$character->level}} </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                            <td> Здоровье </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$character->health}}%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td> Опыт </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$character->experience}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Золото  </td>
                                            <td>
                                                <div >
                                                    {{$character->gold}} <i class="fa-solid fa-coins"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4 class="card-title mb-1">Начни сейчас!</h4>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="preview-list">
                                            <a href="{{route('user.quest.index')}}" class="text-decoration-none text-white">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-warning">
                                                        <i class="mdi mdi-file-document"></i>
                                                    </div>
                                                </div>
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">

                                                            <h6 class="preview-subject">Вперёд за приключениями!</h6>
                                                            <p class="text-muted mb-0">Создай свой квест</p>

                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                            <a href="{{route('user.skill.index')}}" class="text-decoration-none text-white">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-success">
                                                        <i class="fa-solid fa-hammer"></i>
                                                    </div>
                                                </div>
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">

                                                        <h6 class="preview-subject">Прокачай себя</h6>
                                                        <p class="text-muted mb-0">Добавь новые навыки</p>

                                                    </div>

                                                </div>
                                            </div>
                                            </a>
                                            <a href="{{route('user.boss.index')}}" class="text-decoration-none text-white">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-danger">
                                                        <i class="fa-solid fa-skull"></i>
                                                    </div>
                                                </div>
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">

                                                        <h6 class="preview-subject">БОССЫ</h6>
                                                        <p class="text-muted mb-0">Одолей свои вредные привычки!</p>

                                                    </div>

                                                </div>
                                            </div>
                                            </a>
                                            <a href="{{route('user.award.index')}}" class="text-decoration-none text-white">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-info">
                                                        <i class="fa-solid fa-gift"></i>
                                                    </div>
                                                </div>
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">

                                                        <h6 class="preview-subject"> Награды </h6>
                                                        <p class="text-muted mb-0">Побалуй себя</p>

                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                            <a href="{{route('user.post.index')}}" class="text-decoration-none text-white">
                                            <div class="preview-item">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-primary">
                                                        <i class="fa-solid fa-book"></i>
                                                    </div>
                                                </div>
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">


                                                        <h6 class="preview-subject">Дневничок</h6>
                                                        <p class="text-muted mb-0">Записывать разные мысли...</p>

                                                    </div>

                                                </div>
                                            </div> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
