@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h4>Data Booking</h4>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">data-pendaftar</li> --}}

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Tanggal</th>
                                <th>Wilayah</th>
                                <th>Waktu Booking</th>
                                <th>Alamat Rumah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        {{-- @foreach ($bookingsorder as $b) --}}
                        <tbody id="bookingData">
                            {{-- <td>{{ $loop->iteration }}</td>
                            <td>{{ $b->name }}</td>
                            <td>{{ $b->email }}</td>
                            <td>{{ $b->phone }}</td>
                            <td>{{ $b->date }}</td>
                            <td>{{ $b->region }}</td>
                            <td>{{ $b->time->time }}</td>
                            <td>{{ $b->address }}</td> --}}


                        </tbody>
                        {{-- @endforeach --}}
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
            function loadBookings() {
            $.ajax({
                url: "/admin/bookings",
                method: "GET",
                success: function(response) {
                    var tableBody = $('#bookingData');
                    tableBody.html(''); // Kosongkan tabel sebelum diisi ulang

                    response.forEach(function(booking, index) {
                        tableBody.append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${booking.name}</td>
                                <td>${booking.email}</td>
                                <td>${booking.phone}</td>
                                <td>${booking.date}</td>
                                <td>${booking.region}</td>
                                <td>${booking.time.time}</td>
                                <td>${booking.address}</td>
                                <td><a href="https://wa.me/${booking.phone}/?text=*Konfirmasi Booking WashGo*  %0a Halo *${booking.name}* %0a Terima kasih telah melakukan booking layanan carwash di WashGo. Berikut detail booking Anda:%0a *Tanggal*: ${booking.date}%0a *Jam*: ${booking.time.time}%0a *Wilayah*: ${booking.region}%0a *Alamat*: ${booking.address}%0a Booking Anda telah *dikonfirmasi*! Kami akan datang sesuai jadwal. Jika ada perubahan, silakan hubungi kami.%0a *Kontak*: +6281292675345%0a Terima kasih telah mempercayakan kendaraan Anda kepada kami!%0a Salam, *WashGo*">Hubungi Whatsapp</a></td>
                            </tr>
                        `);
                    });
                }
            });
        }

        // Cek booking baru setiap 5 detik
        setInterval(loadBookings, 5000);
        loadBookings();
    </script>
