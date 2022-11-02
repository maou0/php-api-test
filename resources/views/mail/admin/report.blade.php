@component('mail::message')
    <table>
        <thead>
        <tr>
            <th colspan="2">Список чисел за сегодня</th>
        </tr>
        </thead>
        <tbody>
        @foreach (json_decode($numbers, true) as $number)
        <tr>
            <td>{{$number['id']}}</td>
            <td>{{$number['value']}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endcomponent
