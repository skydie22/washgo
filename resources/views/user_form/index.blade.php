<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wash Go</title>
    <link rel="icon" href="{{ asset('/assets/static/images/logo/favicon.png') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/app-dark.css') }}">
</head>

<body>
    <script src="{{ asset('/assets/static/js/initTheme.js') }}"></script>
    <nav class="navbar navbar-light">
        <div class="container d-block mt-5">
            <a href="{{ route('home') }}"><i class="bi bi-chevron-left"></i></a>
            <span>kembali</span>
        </div>
    </nav>

    <div class="container">

        <div class="card card mt-3">
            @if (session('success'))
            <div class="alert alert-light-success color-success alert-dismissible fade show"><i class="bi bi-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="card-header">
                <h4 class="card-title">Form Booking</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Pilih Harga</label>
                                </div>
                                <div class="col-md-8 form-group">
                                   <select name="price_id" id="price" class="form-select">
                                    @foreach ($harga as $h)
                                    <option value="{{ $h->id }}">{{ $h->price }}</option>
                                    @endforeach
                                   </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nama</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="first-name-horizontal" class="form-control" name="name"
                                        placeholder="Nama" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="email-horizontal">Email</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="email" id="email-horizontal" class="form-control" name="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="contact-info-horizontal">No Hp</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="phoneId" class="form-control"
                                        name="phone" placeholder="No Hp"  required>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="region-horizontal">Wilayah</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select name="region" class="form-select" id="basicSelect" required>
                                        <option value="">Pilih Wilayah</option>
                                        <option value="jakarta pusat">Jakarta Pusat</option>
                                        <option value="jakarta utara">Jakarta Utara</option>
                                        <option value="jakarta barat">Jakarta Barat</option>
                                        <option value="jakarta selatan">Jakarta Selatan</option>
                                        <option value="jakarta timur">Jakarta Timur</option>
                                        <option value="bekasi selatan">Bekasi Selatan</option>
                                        <option value="bekasi barat">Bekasi Barat</option>
                                        <option value="bekasi timur">Bekasi Timur</option>

                                    </select>
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="date-horizontal">Tanggal Booking</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input class="form-control" type="date" name="date" id="dateInput" required min="{{ now()->addDay()->toDateString() }}">
                                </div>

                                <div class="col-md-4 form-group">
                                    <label for="time-horizontal">Jam Booking</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-control" name="time_id" id="timeSelect" required>
                                        <option value="">Pilih Tanggal Dulu</option>
                                    </select>
                                </div>



                                <div class="col-md-4 form-group">
                                    <label for="address-horizontal">Alamat</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <textarea name="address" class="form-control" required></textarea>
                                </div>

                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Kirim Booking</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('dateInput').addEventListener('change', function () {
            let selectedDate = this.value;
            let timeSelect = document.getElementById('timeSelect');

            fetch(`/available-times?date=${selectedDate}`)
                .then(response => response.json())
                .then(data => {
                    timeSelect.innerHTML = '<option value="">Pilih Jam</option>';
                    data.forEach(time => {
                        let option = document.createElement('option');
                        option.value = time.id;
                        option.textContent = time.time;
                        timeSelect.appendChild(option);
                    });
                });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let phoneInput = document.getElementById("phoneId");

            // Tambahkan +62 jika belum ada
            if (!phoneInput.value.startsWith("+62")) {
                phoneInput.value = "+62";
            }

            // Mencegah user menghapus +62
            phoneInput.addEventListener("input", function () {
                if (!this.value.startsWith("+62")) {
                    this.value = "+62";
                }
            });

            // Mencegah copy-paste tanpa +62
            phoneInput.addEventListener("paste", function (event) {
                event.preventDefault();
                let pasteData = (event.clipboardData || window.clipboardData).getData("text");
                this.value = "+62" + pasteData.replace(/^(\+62|0)/, '');
            });
        });
        </script>


    <script src="{{ asset('/assets/compiled/js/app.js') }}"></script>

</body>

</html>
