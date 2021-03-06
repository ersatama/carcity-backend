<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('user') }}'>
        <i class='nav-icon las la-user-circle'></i> Пользователи
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('user-bin') }}'>
        <i class='nav-icon las la-user-circle'></i> ЭЦП бины
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('position') }}'>
        <i class='nav-icon las la-user-tie'></i> Должности
    </a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon las la-feather-alt"></i> Статусы
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('completion-status') }}'>
                <i class='nav-icon las la-feather'></i> Акт выполненных работ
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('application-status') }}'>
                <i class='nav-icon las la-feather'></i> Договора и приложения
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('invoice-status') }}'>
                <i class='nav-icon las la-feather'></i> Счет на оплату
            </a>
        </li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon las la-building"></i> Реестр помещений
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('tier') }}'>
                <i class='nav-icon las la-building'></i> Ярусы
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('room-type') }}'>
                <i class='nav-icon las la-sort'></i> Тип помещения
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('room') }}'>
                <i class='nav-icon las la-sort'></i> Помещения
            </a>
        </li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon las la-globe-americas"></i> Веб-сайт
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('slider') }}'>
                <i class='nav-icon lab la-slideshare'></i> Слайдер
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('slider-detail') }}'>
                <i class='nav-icon lab la-slideshare'></i> Слайдер детали
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('about') }}'>
                <i class='nav-icon las la-address-card'></i> О нас
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('about-option') }}'>
                <i class='nav-icon las la-address-card'></i> О нас пункты
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('infrastructure') }}'>
                <i class='nav-icon lab la-ubuntu'></i> Инфраструктура
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('infrastructure-option') }}'>
                <i class='nav-icon lab la-ubuntu'></i> Инфраструктура пункты
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('vehicle-maintenance') }}'>
                <i class='nav-icon las la-car-side'></i> Обслуживанию Автотранспорта
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('contact') }}'>
                <i class='nav-icon las la-id-card'></i> Контакты
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('terms-of-use') }}'>
                <i class='nav-icon las la-id-card'></i> Пользовательское соглашение
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('rules-shopping-center') }}'>
                <i class='nav-icon las la-info-circle'></i> Правила ТЦ
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('privacy-policy') }}'>
                <i class='nav-icon las la-info-circle'></i> Политика конфиденциальности
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('rules-ad') }}'>
                <i class='nav-icon las la-info-circle'></i> Правила размещения объявлений
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('rule') }}'>
                <i class='nav-icon las la-info-circle'></i> Общие правила ТЦ
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('instruction') }}'>
                <i class='nav-icon las la-info-circle'></i> Инструкции
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('awards') }}'>
                <i class='nav-icon las la-medal'></i> Награды
            </a>
        </li>
    </ul>
</li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon las la-book"></i> Справочники
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('dictionary-spare-part') }}'>
                <i class='nav-icon las la-file'></i> Запчасти
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('dictionary-service') }}'>
                <i class='nav-icon las la-file'></i> Услуги
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('dictionary-brand') }}'>
                <i class='nav-icon las la-file'></i> Бренды

            </a>
        </li>
    </ul>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('antimat-word') }}'>
        <i class='nav-icon las la-file'></i> Антимат
    </a>
</li>
