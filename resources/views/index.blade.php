<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header__phone">+38 (044) 299 27 66</div>
            <div class="logo-font">Hotel Logo</div>
            <div class="booking-btn">Забронювати</div>
        </div>
        <section class="main-section">
            <div class="title-with-image">
                <h1>Забронюйте <div style="margin-left: 200px">своє місце</div>
                </h1>
                <img src="/images/main-section-image.png" alt="Бронювання готелів">
            </div>
        </section>
        <section class="inputs-section">
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="inputs-section__inputs">
                    <div class="inputs-section__input">
                        <label for="check_on">Дата заїзду</label>
                        <input type="text" name="check_on" id="check_on" class="input-dates">
                    </div>
                    <div class="inputs-section__input">
                        <label for="check_off">Дата виїзду</label>
                        <input disabled type="text" name="check_off" id="check_off" class="input-dates">
                    </div>
                    <div class="inputs-section__input">
                        <label for="phone">Номер телефону</label>
                        <input type="text" name="phone">
                    </div>
                    <div class="inputs-section__input">
                        <label for="email">E-mail</label>
                        <input type="text" name="email">
                    </div>
                </div>
                <button type="submit" class="inputs-section__submit">Забронювати</button>
            </form>
        </section>
    </div>

    <section class="booking-section">
        <div class="container">
            <div class="title-with-image" style="margin-top: 80px;">
                <h2 style="font-size: 50px;">Історія <div style="margin-left: 110px">бронювань</div>
                </h2>
                <img style="max-width: 350px; left: 160px" src="/images/booking-section-image.png"
                    alt="Бронювання готелів">
            </div>
        </div>
        <div class="table-wrapper">
            <table class="booking-table">
                <thead>
                    <tr>
                        <th>Дата заїзду, з</th>
                        <th>Дата виїзду, до</th>
                        <th>Статус</th>
                        <th>Видалити бронювання</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->check_on }}</td>
                            <td>{{ $booking->check_on }}</td>
                            <td>
                                @if ($booking->status == 'success')
                                    <div class="success">Успішно</div>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('booking.delete', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-clear">
                                        <img src="/images/icons/delete.png" alt="">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>

    </section>

    <footer>
        <div class="container">
            <div class="footer__inner">
                <div class="logo-font" style="color: #fff">Hotel logo</div>
                <div class="booking-btn" style="color: #fff; border: 1px solid #fff">Забронювати</div>
                <div class="footer__contacts">
                    <div class="footer-contacts-item">
                        <img src="/images/icons/phone.png" alt="">
                        <span>+38 (044) 299-27-66</span>
                    </div>
                    <div class="footer-contacts-item">
                        <img src="/images/icons/phone.png" alt="">
                        <span>+38 (044) 270-44-66</span>
                    </div>
                    <div class="footer-contacts-item">
                        <img src="/images/icons/loca.png" alt="">
                        <span>пр-т. В. Лобановського 25/16 Київ, Україна</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    @vite(['resources/js/app.js'])
</body>

</html>
