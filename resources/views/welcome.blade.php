<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet " />
    <script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/colors/color1.css') }}" />
</head>

<body>

    <div class="container mt-4">

        <div class="row row-sm">
            <div class="col-lg-12">
                
                <div class="card mt-2">
                    <div class="card-body pb-0">
                        <form action="{{ route('index') }}" class="mb-3" method="get">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-lg mb-3" value="" placeholder="Search...." name="q">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="userTableBody"
                                class="table  text-nowrap key-buttons border-bottom">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0">#</th>
                                        <th class="border-bottom-0">Name</th>
                                        <th class="border-bottom-0">Email</th>
                                        <th class="border-bottom-0">Terdaftar Pada</th>
                                        <th class="border-bottom-0">Diupdate Pada</th>
                                    </tr>
                                </thead>
                                <tbody id="userTableBody">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                            {{ $users->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                let typingTimer;
                let doneTypingInterval = 100; // Waktu delay setelah pengguna selesai mengetik

                // Fungsi untuk mengirim permintaan pencarian
                function searchAlgolia(query) {
                    $.ajax({
                        url: "{{ route('index') }}",
                        type: "GET",
                        data: {
                            q: query
                        },
                        success: function(response) {
                            // Perbarui isi tabel dengan hasil pencarian yang diterima dari server
                            $('#userTableBody').html($(response).find('#userTableBody').html());
                            $('.mt-5').html($(response).find('.mt-5').html());
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText); // Tangani kesalahan jika ada
                        }
                    });
                }

                // Mendengarkan perubahan pada input pencarian
                $('input[name="q"]').on('keyup', function() {
                    clearTimeout(typingTimer);
                    let query = $(this).val();

                    // Timer untuk menunggu sebelum mengirim permintaan pencarian ke server
                    typingTimer = setTimeout(function() {
                        searchAlgolia(query); // Panggil fungsi pencarian setelah selesai mengetik
                    }, doneTypingInterval);
                });
            });
        </script>

        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>
</body>

</body>

</html>
