<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket systeem</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Evenementen</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('events.create') }}">Nieuw evenement</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Evenement</th>
            <th>Titel</th>
            <th>Start datum</th>
            <th>Eind datum</th>
            <th>Aantal tickets</th>
            <th width="280px">Actie</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->name }}</td>
                <td>{{ $event->start_date }}</td>
                <td>{{ $event->end_date }}</td>
                <td>{{ $event->capacity }}</td>
                <td>
                    <form action="{{ route('events.destroy',$event->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Bewerk</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Verwijder</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
