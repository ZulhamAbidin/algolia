<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-header">
                        <form action="{{ route('index') }}" method="get">
                            <div class="row">
                                <div class="col-md-10">
                                    {{-- <input type="text" class="form-control mb-3" value="{{ $request }}" placeholder="search" name="q"> --}}
                                    <input type="text" class="form-control mb-3" value="{{ old('q', $request->input('q')) }}" placeholder="search" name="q">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="form-control mb-3" value="Search">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <table style="width: 100%">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <center class="mt-5">
                            {{ $users->withQueryString()->links() }}
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>