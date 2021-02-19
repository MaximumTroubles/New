<nav>
    <div class="upper_header">
        <div class="container">
            <div class="upper_header_menu_wrap">
                <ul class="left_menu">
                    <li><a href="">Доставка и оплата</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                    <li><a href="/news">Блог</a></li>
                    <li><a href="/reviews">Отзывы</a></li>
                    <li><a href="/sale">Наши магазины</a></li>
                    @role('admin')
                    <li>
                      <a class="admin_link" href="/admin ">Admin Panel</a>
                    </li>
                    @endrole
                </ul>
                <ul class="right_menu">
                    @guest
                        @if (Route::has('login'))
                            <li>
                                <a href="{{ route('login') }}">{{ __('Вход') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li >
                                <a href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                        @else
                        <li class="dropdown">
                            <a id="navbarDropdown" class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
{{-- main_header --}}
<nav>
    <div class="main_header">
        <div class="container">
            <div class="main_header_inner_wrap">
                <div class="main_header_logo_section">
                    <a href="/">Logo</a>
                </div>
                <div class="main_header_search_section">
                    <div class="serach_input">
                        <input type="text" class="input" placeholder="Найдет все что угодно">
                        <a href="#" class="search-btn">
                        </a>
                    </div>
                </div>
                <div class="main_header_phone_section_popup">
                    <a href="tel:+380651033385"><span>065</span> 10 333 85</a>
                    <p><a href="#">Заказать звонок</a></p>
                </div>
                <div class="main_header_phone_section">
                    <a href="tel:+380651033385"><span>068</span> 10 333 85</a>
                    <p>9:00 - 19:00 Пн-Вс</p>
                </div>
                <div class="main_header_favorite_section">
                    <a href="/favorite">
                        <img src="/img/fav.svg" alt="">
                    </a>
                </div>
                <div class="main_header_cart_section">
                    <a href="/cart">
                        <img src="/img/cart.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
{{-- nav_menu_header --}}
<nav>
    <div class="nav_menu_header">
        <div class="container"></div>
    </div>
</nav>

