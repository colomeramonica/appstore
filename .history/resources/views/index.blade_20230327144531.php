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
    </div>
</body>
</html>
