@vite(['resources/css/app.css'])

<div class="container">
    <h1 class="admin-h1">Admin</h1>
    <a href="/">Back</a>

     <div class="table-wrapper">
            <table class="booking-table">
                <thead>
                    <tr>
                        <th>Дата заїзду, з</th>
                        <th>Дата виїзду, до</th>
                        <th>Статус</th>
                        <th>Телефон</th>
                        <th>E-mail</th>
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
                            <td>{{$booking->phone}}</td>
                            <td>{{$booking->email}}</td>
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
</div>
