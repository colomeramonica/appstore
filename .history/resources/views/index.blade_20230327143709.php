<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>tESTE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>TESTANDO</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('apps.create') }}"> Create app</a>
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
                    <th>S.No</th>
                    <th>app Name</th>
                    <th>app Email</th>
                    <th>app Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apps as $app)
                    <tr>
                        <td>{{ $app->id }}</td>
                        <td>{{ $app->name }}</td>
                        <td>{{ $app->description }}</td>
                        <td>{{ $app->status }}</td>
                        <td>
                            <form action="{{ route('apps.destroy',$app->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('apps.edit',$app->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $apps->links() !!}
    </div>
</body>
</html>
