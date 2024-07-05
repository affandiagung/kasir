<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Kecil</title>

    <?php
    $style = '<style> * {  font-family: "consolas", sans-serif; } p { display: block; margin: 3px;font-size: 10pt; } table td {font-size: 9pt;} .text-center {text-align: center;} .text-right {text-align: right;} @media print {@page {margin: 0;size: 75mm ';
    ?>
    <?php
    $style .= !empty($_COOKIE['innerHeight']) ? $_COOKIE['innerHeight'] . 'mm; }' : '}';
    ?>
    <?php
    $style .= 'html, body {width: 70mm;} .btn-print {display: none;}}</style>';
    ?>

    {!! $style !!}
</head>

<body onload="window.print()">
    <button class="btn-print" style="position: absolute; right: 1rem; top: rem;" onclick="window.print()">Print</button>
    <div class="text-center">
        <h3 style="margin-bottom: 5px;">TOKO RIA OPTIK</h3>

    </div>
    <br>
    <div>
        <p style="float: left;">Tanggal : {{ date('d-m-Y') }}</p>
    </div>
    <div class="clear-both" style="clear: both;"></div>
    <p>No: {{ $transaction->id }}</p>
    <p>{{ $transaction->name }}</p>
    <p>{{ $transaction->address }}</p>
    <p class="text-center">-----------------------------------</p>

    <p class="text-center">UKURAN LENSA </p>
    <br>
    <table width="100%" style="border: 0;">
        <tr>
            <td></td>
            <td>Ukuran</td>
            <td>Pilihan</td>
        </tr>
        <tr>
            <td>Right</td>
            <td> {{ $transaction->right_size }}</td>
            <td>{{ $transaction->right_type }}</td>
        </tr>
        <tr>
            <td>Lefts</td>
            <td>{{ $transaction->left_size }}</td>
            <td>{{ $transaction->left_type }}</td>
        </tr>

    </table>
    <br>

    <table width="100%" style="border: 0;">
        <tr>
            <td>{{ $transaction->merk }} - {{ $transaction->type }}</td>
            <td></td>
            <td class="text-right">{{ $transaction->harga }}</td>
        </tr>
    </table>
    <p class="text-center">-----------------------------------</p>

    <table width="100%" style="border: 0;">
        <tr>
            <td>Diskon:</td>
            <td class="text-right">{{ (int) $transaction->diskon }} %</td>
        </tr>
        <tr>
            <td>Total:</td>
            <td class="text-right">Rp. {{ $transaction->total }}</td>
        </tr>
        <tr>
            <td>vascout:</td>
            <td class="text-right">Rp. {{ $transaction->vascout }}</td>
        </tr>
        <tr>
            <td>Sisa:</td>
            <td class="text-right">Rp. {{ $transaction->vascout - $transaction->total }}</td>
        </tr>
    </table>

    <p class="text-center">===================================</p>
    <p class="text-center">-- TERIMA KASIH --</p>

    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
            body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight
        );

        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "innerHeight=" + ((height + 50) * 0.264583);
    </script>
</body>

</html>
