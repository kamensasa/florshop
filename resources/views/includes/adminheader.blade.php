<header class="py-3 border-bottom">

    <div class="d-flex justify-content-between">

        <div>

            <a href="{{route('admin.posts')}}">

                Главная

            </a>

        </div>

        <div>

            <a href="{{route('admin.categories')}}">
                Категории
            </a>

        </div>

        {{-- <div>

            <a href="{{route('basket')}}">
                Корзина
            </a>

        </div> --}}

        <div>

            @guest

            <ul>

                <li>

                    <a href="{{route('register')}}">

                        Регистрация

                    </a>

                </li>

                <li>

                    <a href="{{route('login')}}">

                        Вход

                    </a>

                </li>

            </ul>

            @endguest

            @auth

            <ul>

                <li>

                    <x-form action="{{route('logout')}}" method="get">

                    <button class="btn btn-warning">

                        Выйти

                    </button>

                    </x-form>

                </li>


            </ul>

            @endauth

        </div>

    </div>

    </header>
