<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Наименование</th>
            <th>Норма Азот</th>
            <th>Норма Фосфор</th>
            <th>Норма Калий</th>
            <th>Группа культур</th>
            <th>Район</th>
            <th>Стоимость</th>
            <th>Назначение</th>
            <th>Описание</th>
        </tr>
    </thead>

    <tbody>
        @foreach($fertilizers as $fertilizer)
        <tr>
            <td>{{$fertilizer->id}}</td>
            <td>{{$fertilizer->name}}</td>
            <td>{{$fertilizer->nitrogen_rate}}</td>
            <td>{{$fertilizer->phosphorus_rate}}</td>
            <td>{{$fertilizer->potassium_rate}}</td>
            <td>{{$fertilizer->culture->name}}</td>
            <td>{{$fertilizer->region}}</td>
            <td>{{$fertilizer->price}}</td>
            <td>{{$fertilizer->purpose}}</td>
            <td>{{$fertilizer->description}}</td>
        </tr>
        @endforeach
    </tbody>
</table>