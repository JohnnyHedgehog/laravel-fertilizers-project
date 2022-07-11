<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Наименование</th>
            <th>Дата договора</th>
            <th>Стоимость поставки, руб.</th>
            <th>Регион</th>
        </tr>
    </thead>

    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->dateOfSigned()->translatedFormat('d.m.Y') }}</td>
            <td>{{ $client->purchase }}</td>
            <td>{{ $client->region }}</td>
        </tr>
        @endforeach
    </tbody>
</table>