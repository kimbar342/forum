
<nav class="navbar navbar-expand-lg navbar-light bg-light container  justify-content-between">
    <div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav mr-auto justify-content-between ">
                    <div class="">
                        <div class="d-flex">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a href="{{ route('home.index') }}" class="nav-link">{{ __('Главная') }}</a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{ route('about.index') }}" class="nav-link">{{ __('О компании') }}</a>
                                </li>
                                @if(Auth::check())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                       aria-expanded="false">
                                        Поиск
                                    </a>
                                    <div class="dropdown-menu" style="min-width: 350px">
                                        <div style=" max-width: 350px">
                                            <form action="{{ route('show_topic') }}" class="d-flex flex-row  mb-2" method="post">
                                                @csrf
                                                <input class="form-control mr-sm-2" type="search" name="topic"
                                                       placeholder="Поиск по темам"
                                                       aria-label="Search">
                                                <button class="btn btn-outline-success my-2 my-sm-0 ms-2" type="submit">
                                                   {{ __('Поиск') }}
                                                </button>
                                            </form>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <div style=" max-width: 350px">
                                            <form method="post" action="{{ route('show_worker') }}" class="d-flex mb-2">
                                                @csrf
                                                <input class="form-control mr-sm-2" name="worker" type="search" placeholder="Поиск сотрудника" aria-label="Search">
                                                <input class="btn btn-outline-success ms-2" type="submit" value="Поиск">
                                            </form>
                                        </div>
                                        <div class="dropdown-divider"></div>

                                        <div style=" max-width: 350px">
                                            <form action="{{ route('show_post') }}" method="post" class="d-flex ">
                                                @csrf
                                                <p>
                                                    <select name="post" class="form-control mr-sm-2">
                                                        <optgroup label="Руководящий состав">
                                                            <option value="{{ __('Директор') }}"> {{ __('Директор') }}</option>
                                                            <option value="{{ __('Зам.директора') }}">{{ __('Зам.директора') }}</option>
                                                            <option value="{{ __('Директор по развитию') }}">{{ __('Директор по развитию') }}</option>
                                                            <option value="{{ __('Финансовый директор') }}">{{ __('Финансовый директор') }}</option>
                                                        </optgroup>
                                                        <optgroup label="Юридический отдел">
                                                            <option value="5">{{ __('Главный юрист') }}</option>
                                                            <option value="{{ __('Специалист по претензиям') }}">{{ __('Специалист по претензиям') }}</option>
                                                        </optgroup>
                                                        <optgroup label="Бухгалтерия">
                                                            <option value="{{ __('Главный бухгалтер') }}">{{ __('Главный бухгалтер') }}</option>
                                                            <option value="{{ __('Бухгалтер по кадрам') }}">{{ __('Бухгалтер по кадрам') }}</option>
                                                            <option value="{{ __('Делопроизводитель') }}">{{ __('Делопроизводитель') }}</option>
                                                        </optgroup>
                                                        <optgroup label="Отдел оформления">
                                                            <option value="{{ __('Менеджер') }}">{{ __('Менеджер') }}</option>
                                                            <option value="{{ __('Кассир') }}">{{ __('Кассир') }}</option>
                                                            <option value="{{ __('Специалист контактного центра') }}">{{ __('Специалист контактного центра') }}</option>
                                                        </optgroup>
                                                        <optgroup label="Транспорный отдел">
                                                            <option value="{{ __('Логист') }}">{{ __('Логист') }}</option>
                                                            <option value="{{ __('Механик') }}">{{ __('Механик') }}</option>
                                                            <option value="{{ __('Водитель ам') }}">{{ __('Водитель ам') }}</option>
                                                        </optgroup>
                                                        <optgroup label="Склад">
                                                            <option value="{{ __('Начальник склада') }}">{{ __('Начальник склада') }}</option>
                                                            <option value="{{ __('Кладовщик') }}">{{ __('Кладовщик') }}</option>
                                                            <option value="{{ __('Грузчик') }}">{{ __('Грузчик') }}</option>
                                                            <option value="{{ __('Водитель погрузчика') }}">{{ __('Водитель погрузчика') }}</option>
                                                        </optgroup>
                                                    </select>
                                                </p>
                                                <p><input class="btn btn-outline-success ms-2 my-2 my-sm-0"
                                                          type="submit"
                                                          value="Поиск"></p>
                                            </form>
                                        </div>

                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Auth::user())
    <div class="d-flex">
       <a href="#" style="text-decoration: none"> {{ __('Сообщения:') }}</a>
        <p><strong> count</strong></p>
    </div>
    @endif
                <div style="margin-right: 123px">

                    @if(!Auth::check())
                        <a class="dropdown-item btn btn-light me-3"
                           href="{{ route('login.index') }}">{{ __('Логин') }}</a>
                    @else
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-expanded="false">
                            <img src="{{ asset('storage/uploads'). "/" . session('user')->avatar }}" alt="image" width="30px" height="30px" style="border-radius: 50%">
                            {{ session('user')->first_name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item btn btn-light"
                               href="{{ route('user.user_profile.profile' , session('user')->id ) }}" style="min-width: 170px">{{ __('Профиль') }}</a>
                            @if(session('user')->post === __('Бухгалтер по кадрам'))
                            <a class="dropdown-item btn btn-light"
                               href="{{ route('personnel_department.index') }}"
                               style="min-width: 170px">{{ __('Отдел кадров') }}</a>
                            @endif
                            @if(session('user')->root == 1)
                            <a class="dropdown-item" href="{{ route('admin.admin_panel.index') }}"
                               style="min-width: 170px">{{ __('Админ
                                панель') }}</a>
                            @endif
                            <a class="dropdown-item btn btn-light" href="{{ route('topic.create') }}"
                               style="min-width: 170px">{{ __('Добавить
                                тему') }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item btn btn-light" href="/logout"
                               style="min-width: 170px">{{ __('Выход') }}</a>
                        </div>
                    </div>
                </div>
    @endif
</nav>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
crossorigin="anonymous"></script>
