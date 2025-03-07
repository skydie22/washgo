@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h4>Manajemen Waktu</h4>
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
            @if (session('success'))
            <div class="alert alert-light-success color-success alert-dismissible fade show"><i class="bi bi-check-circle"></i>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
        @endif
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add-time">
                        Tambah Waktu
                    </button>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($times as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->time }}</td>
                                    <td><a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#delete-time{{ $t->id }}">delete</i></a></td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    @include('admin.schedule.create')
    @include('admin.schedule.delete')
@endsection
