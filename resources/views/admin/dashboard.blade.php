@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Home</h1>
        </div>
        <div class="row">
            <div
                style="margin: 20px auto;padding: 20px;background-color: #f5fbdc;border: 1px solid #ddd;width: 60%;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <div class="header">
                    Selamat Datang di halaman Kasir
                </div>
                <div class="row">
                    <div class="col-lg-2" style="align-content: center;align-items: center;">
                        <center> <img src="/img/idea.png" style="max-width: 50px" alt="Lightbulb Icon"></center>
                    </div>
                    <div class="col-lg-10">
                        <div class="content">
                            <p>Silahkan gunakan program kasir ini secara bijak.</p>
                            <p>Jika ada hal-hal yang kurang dipahami,
                                silahkan klik tulisan "help" yang ada di menu sebelah kiri</p>
                            <p>Jangan lupa logout jika anda akan keluar, demi keamanan.</p>
                            <p>Terima kasih atas perhatiannya dan Selamat Bekerja...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
