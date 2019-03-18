@extends('../layouts/adminLayout')

@section('title','Fotozrcadlo - ADMIN')

@section('content')
    <h3>Seznam objednávek</h3>
    <table class="table table-bordered table-hover">

        <thead>
            <tr class="active">
                <th>Jméno</th>
                <th>Příjmení</th>
                <th>Telefon</th>
                <th>E-mail</th>
                <th>Datum</th>
                <th>Typ</th>
                <th>Správa</th>
                <th>Smazat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
                <tr>
                    <td>{{$event->firstname}}</td>
                    <td>{{$event->surname}}</td>
                    <td>{{$event->phone}}</td>
                    <td>{{$event->email}}</td>
                    <td>{{$event->date ? date_format(date_create($event->date),"d.m Y") : '' }}</td>
                    <td>{{$event->type}}</td>
                    <td>{{$event->message}}</td>
                    <td>
                        {{ Form::open(['route' => array('admin.destroy', $event->id), 'method' => 'delete']) }}
                        {!! Form::submit('Vymazat', ['class' => 'form-control btn btn-primary']) !!}
                        {{ Form::close() }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="8">Žádne objednávky</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="text-center">
        {{$events->links()}}
    </div>
@endsection