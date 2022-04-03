@extends('layouts.master')

@section('titlepage', 'Profil Perusahaan | Mitra')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/styleMitra.css">

    <style>
        /* STYLING DETAIL WRAPPER */

        .rounded-custom {
            border-radius: 30px;
        }

        .detail-wrapper .header {
            border-radius: 30px 30px 0px 0px;
            height: 250px;
            margin-bottom: 70px;
            background-image: linear-gradient(to right, #2e51d1, #9cb0f0);
        }

        .detail-wrapper .content .prestasi div.img div {
            width: 100px;
            height: 100px;
            background-color: rgb(165, 163, 163);
        }

        .detail-wrapper .content .pelamar a.btn {
            font-size: 20px;
        }

        .detail-wrapper .header .img {
            background: rgb(220, 219, 219);
            height: 200px;
            width: 200px;
            border: 7px solid #fff;
            top: 50%;
            left: 3%;
        }

        /* CUSTOMIZE GALLERY */

        .gallery .img {
            height: 400px;
            width: 100%;
        }

        .gallery .img .big-img div,
        .gallery .img .small-img div {
            height: 100%;
        }

        .gallery .img .big-img div div {
            height: 100%;
            width: 100%;
            background-color: rgb(202, 202, 202);
        }

        .gallery .img .small-img div div {
            height: 100%;
            background-color: rgb(202, 202, 202);
        }

        .row {
            --bs-gutter-x: 0px;
        }

        /* table {
                    table-layout: fixed;
                    word-wrap: break-word;
                } */

    </style>
@endsection

@section('section')
    @include('layouts.navbar')

    <div class="main-page">
        @include('layouts.sidebar-mitra')

        <img src="/assets/img/wave2.svg" class="position-absolute waves">

        <div class="container py-3 content-wrapper">
            <!-- TITLE -->
            <div class="title-page text-white mb-5">
                <h1 class="fw-light">Main</h1>
                <h1 class="fw-bold">Profile</h1>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissable rounded-15">{{ session('success') }}</div>
            @endif

            <div class="detail-wrapper shadow bg-white shadow-custom-2 rounded-custom mb-5">
                <!-- HEADER -->
                <div class="header d-flex align-items-center position-relative">
                    <div
                        class="img overflow-hidden position-absolute rounded-circle d-flex justify-content-center align-items-center">
                        <img src="{{ $mitra->foto ? '/assets/img/' . $mitra->foto : '' }}" width="200px">
                    </div>
                </div>
                <div class="content py-3 px-5">
                    <div class="mb-4 d-flex justify-content-between">
                        <!-- TITLE NEWS -->
                        <div>
                            <h1 class="fw-900 mb-0">{{ $mitra->jenis }}. {{ $mitra->nama }}<i
                                    class='bx bxs-badge-check align-middle text-primary ms-1'></i></h1>
                            <h4 class="text-secondary">{{ $mitra->kategori }}</h4>
                            <h4 class="mt-3"></h4>
                            <h5 class="mt-3"><i
                                    class='bx bx-current-location align-middle me-1'></i>{{ $mitra->wilayah }}</h5>
                        </div>
                        <!-- TOOLS UNTUK EDIT DAN DELETE -->
                        <div class="tools d-flex">
                            <div class="rounded-15 d-flex justify-content-center align-items-start">
                                <a href="/mt/profil/ubah/{{ $mitra->id }}"
                                    class="btn btn-warning text-white rounded-15 fw-bold">Ubah</a>
                            </div>
                        </div>
                    </div>
                    <!-- CONTENT INFORMASI -->
                    <div class="mb-3">
                        <h4 class="fw-bold">Overview</h4>
                        <p align="justify">{!! $mitra->overview !!}</p>
                    </div>
                </div>
            </div>

            <div class="kantor-wrapper mb-4">
                <div class="rounded-custom bg-white shadow-custom-2 p-3 px-5">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <h2 class="fw-bold mb-0">Kantor</h2>
                            <p>Daftar kantor yang anda miliki.</p>
                        </div>
                        <div>
                            <a href="/mt/kantor/tambah" class="btn btn-primary rounded-15 fw-bold">Tambah</a>
                        </div>
                    </div>
                    <div>
                        <table class="table table-borderless overflow-scroll">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">No. Telp</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kantor as $key => $item)
                                    @php
                                        $key++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $key }}</th>
                                        <td><a href="#" class="text-link-black text-decoration-none">{{ $item->id }}</a>
                                        </td>
                                        <td>{{ $item->kota }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td class="d-flex"><a href="/mt/kantor/ubah/{{ $item->id }}"
                                                class="btn btn-warning rounded-15 fw-bold me-1"><i
                                                    class='bx bxs-edit align-middle'></i></a><button type="button"
                                                class="btn btn-danger rounded-15 fw-bold"><i
                                                    class='bx bxs-trash-alt align-middle'
                                                    onclick="deleteData('{{ $item->id }}')"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- <div class="gallery">
                <h2 class="fw-bold">Gallery</h2>
                <!-- IMAGE INFORMASI -->
                <div class="img row mb-3">
                    <div class="col-8 big-img">
                        <div class="p-2">
                            <div class="rounded-20 p-2"></div>
                        </div>
                    </div>
                    <div class="col-4 row">
                        <div class="col-6 small-img">
                            <div class="p-2">
                                <div class="rounded-20 p-2"></div>
                            </div>
                        </div>
                        <div class="col-6 small-img">
                            <div class="p-2">
                                <div class="rounded-20 p-2"></div>
                            </div>
                        </div>
                        <div class="col-6 small-img">
                            <div class="p-2">
                                <div class="rounded-20 p-2"></div>
                            </div>
                        </div>
                        <div class="col-6 small-img">
                            <div class="p-2">
                                <div class="rounded-20 p-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

@section('script')
    <!-- SWEETALERT -->
    <script src="../../../assets/js/sweetalert.min.js"></script>
    <script src="../../../assets/js/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteData(id) {
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ url('/mt/kantor/hapus') }}" + '/' + id,
                            type: "POST",
                            data: {
                                '_method': 'POST'
                            },
                            success: function() {
                                swal({
                                    title: "Success!",
                                    text: "Redirecting in 2 seconds.",
                                    icon: "success",
                                    timer: 2000,
                                    button: true
                                }).then(function() {
                                    window.location.replace(
                                        "http://127.0.0.1:8000/mt/profil");
                                });
                            },
                            error: function() {
                                swal({
                                    title: 'Opps...',
                                    text: 'Ada masalah saat menghapus data.',
                                    icon: 'error',
                                    timer: '1500'
                                })
                            }
                        })
                    } else {
                        swal("Data tidak dihapus!");
                    }
                });
        }
    </script>
@endsection
