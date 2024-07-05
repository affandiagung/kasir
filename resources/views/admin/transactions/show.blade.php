@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('List Product') }}
                    <a href="{{ route('admin.transactions.index') }}" class="btn btn-dark float-right">
                        <span class="text">{{ __('Go Back') }}</span>
                    </a>
                </h6>
            </div>
            <div class="card-body">
                <div class="card-responsive">
                    <table class="table mt-3 table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Alamat</th>
                                <th>Resep </th>
                                <th>Merek</th>
                                <th>Tipe</th>
                                <th>Left Size</th>
                                <th>Left Type</th>
                                <th>Right Size</th>
                                <th>Right Typpe</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $transaction['name'] }}</td>
                                <td>{{ $transaction['address'] }}</td>
                                <td>{{ $transaction['resep'] }}</td>
                                <td>{{ $transaction['merk'] }}</td>
                                <td>{{ $transaction['type'] }}</td>
                                <td>{{ $transaction['left_size'] }}</td>
                                <td>{{ $transaction['left_type'] }}</td>
                                <td>{{ $transaction['right_size'] }}</td>
                                <td>{{ $transaction['right_type'] }}</td>
                                <td>Rp. {{ $transaction['harga'] }}</td>
                                <td> {{ (int) $transaction['diskon'] }} %</td>
                                <td>Rp. {{ $transaction['total'] }}</td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <h3>Total : ${{ $transaction->total_price }}</h3>
                <button class="btn btn-success"
                    onclick="notaKecil('{{ route('admin.transactions.print_struck', $transaction->id) }}', 'print_struck')">Print</button>
            </div>
        </div>
    </div>
@endsection

@push('script-alt')
    <script>
        // tambahkan untuk delete cookie innerHeight terlebih dahulu
        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

        function notaKecil(url, title) {
            popupCenter(url, title, 625, 500);
        }

        function popupCenter(url, title, w, h) {
            const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screenX;
            const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screenY;

            const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document
                .documentElement.clientWidth : screen.width;
            const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document
                .documentElement.clientHeight : screen.height;

            const systemZoom = width / window.screen.availWidth;
            const left = (width - w) / 2 / systemZoom + dualScreenLeft
            const top = (height - h) / 2 / systemZoom + dualScreenTop
            const newWindow = window.open(url, title,
                `
            scrollbars=yes,
            width  = ${w / systemZoom}, 
            height = ${h / systemZoom}, 
            top    = ${top}, 
            left   = ${left}
        `
            );

            if (window.focus) newWindow.focus();
        }
    </script>
@endpush
