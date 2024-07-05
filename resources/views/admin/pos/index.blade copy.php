@extends('layouts.admin')

@section('content')
    <div class="container" style="left :10px;border:1px solid;margin:0 0;max-width: 100%;">
        <div class="card" style="margin: 20px auto; padding: 20px;">
            <form action="{{ route('admin.transactions.store') }}" method="post">
                @csrf
                <h3 class="text-center">DATA PEMBELI </h3>
                <div class="form-group">
                    <label for="discount">Nama Pembeli</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="discount">
                    </div>
                    <label for="discount">Alamat</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="discount">
                    </div>
                </div>
                <hr style="height: 10px;color: rgb(13, 12, 12)">
                <h3 class="text-center">UKURAN LENSA</h3>
                <br><br>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="right">Right</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" class="form-control" id="right" placeholder="ukuran"
                                    style="max-width: 50%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="row">
                            <div class="col-md-6 form-group"><label for="right-size">Pilihan</label></div>
                            <div class="col-md-6 form-group"> <select class="form-control" id="right_size"
                                    class="form-control" name="right_size">
                                    <option value="">&nbsp; Pilih </option>
                                    @for ($i = 0; $i < count($ukuran); $i++)
                                        <option value="{{ $ukuran[$i]->id }}"> &nbsp; {{ $ukuran[$i]->nama_ukuran }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="right">Left</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" class="form-control" id="right" placeholder="ukuran"
                                    style="max-width: 50%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="row">
                            <div class="col-md-6 form-group"><label for="left-size">Pilihan</label></div>
                            <div class="col-md-6 form-group"> <select class="form-control" id="left_size"
                                    class="form-control" name="left_size">
                                    <option value="">&nbsp; Pilih </option>
                                    @for ($i = 0; $i < count($ukuran); $i++)
                                        <option value="{{ $ukuran[$i]->id }}"> &nbsp; {{ $ukuran[$i]->nama_ukuran }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 form-group">
                        <label for="merek">Lensa</label>
                        <select class="form-control" id="merek" class="form-control" name="merek" required>
                            <option value="">- Nama Merek -</option>
                            @for ($i = 0; $i < count($merek); $i++)
                                <option value="{{ $merek[$i]->id }}"> &nbsp; {{ $merek[$i]->nama_merek }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="lens-type">&nbsp;</label>
                        <select class="form-control" id="merek" class="form-control" name="merek" required>
                            <option value="">- Nama Tipe -</option>
                            @for ($i = 0; $i < count($tipe); $i++)
                                <option value="{{ $tipe[$i]->id }}"> &nbsp; {{ $tipe[$i]->nama_type }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="harga">&nbsp;</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" id="harga" name="harga"
                                oninput="calculateTotal()">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-row row">
                    <div class="col-md-4 form-group"><label for="diskon">Diskon</label></div>
                    <div class="col-md-4 form-group"></div>
                    <div class="col-md-4 form-group">
                        <div class="input-group">
                            <input type="number" class="form-control" id="diskon" name="diskon"
                                oninput="calculateTotal()">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="col-md-4 form-group"><label for="total">Total</label></div>
                    <div class="col-md-4 form-group"></div>
                    <div class="col-md-4 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" disabled class="form-control" id="total-show" name="total-show">
                            <input type="hidden" disabled class="form-control" id="total" name="total">

                        </div>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="col-md-4 form-group"><label for="vascout">Vascout</label></div>
                    <div class="col-md-4 form-group"></div>
                    <div class="col-md-4 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" id="vascout" name="vascout"
                                oninput="calculateReturn()">
                        </div>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="col-md-4 form-group"><label for="sisa">Sisa</label></div>
                    <div class="col-md-4 form-group"></div>
                    <div class="col-md-4 form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" disabled class="form-control" id="sisa-show" name="sisa-show">
                            <input type="hidden" disabled class="form-control" id="sisa" name="sisa">
                        </div>
                    </div>
                </div>
                <div class="form-row row">
                    <div class="col-md-4 form-group"></div>
                    <div class="col-md-4 form-group"></div>
                    <div class="col-md-4 form-group"> <button type="submit" class="btn btn-primary btn-block"
                            style="max-width: 50%">Proses</button></div>
                </div>
            </form>



        </div>
        {{-- <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="row mb-2">
                    <div class="col">
                        <form class="d-flex">
                            <input type="text" class="form-control productCode" placeholder="Scan Barcode..." />
                            <button class="btn btn-sm rounded btn-success scan">Find</button>
                        </form>
                    </div>
                </div>
                <div class="user-cart">
                    <div class="card">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th class="text-right">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="{{ route('admin.transactions.store') }}" method="post">
                    @csrf
                    <div class="row mt-2">
                        <div class="col">Total:</div>
                        <div class="col text-right">
                            <input type="number" value="" name="total" readonly class="form-control total">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">Diterima:</div>
                        <div class="col text-right">
                            <input type="number" value="" name="accept" class="form-control received">
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">Return:</div>
                        <div class="col text-right">
                            <input type="number" value="" name="return" readonly class="form-control return">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-danger btn-block">
                                Cancel
                            </button>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">
                                Pay
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-lg-8">
                <div class="mb-2">
                    <input type="text" class="form-control search" placeholder="Search Product..." />
                </div>
                <div class="order-product product-search"
                    style="display: flex;column-gap: 0.5rem;flex-wrap: wrap;row-gap: .5rem;">
                    @foreach ($products as $product)
                        <button type="button" class="item" style="cursor: pointer; border: none;"
                            value="{{ $product->id }}">
                            @if ($product->image)
                                <img src="{{ $product->image->getUrl() }}" width="45px" height="45px" alt="test" />
                            @endif
                            <h6 style="margin: 0;">{{ $product->name }}</h6>
                            <span>(${{ $product->price }})</span>
                        </button>
                    @endforeach
                </div>
            </div>
        </div> --}}
    </div>
@endsection

@push('script-alt')
    <script>
        function calculateTotal() {
            const harga = parseInt(document.getElementById('harga').value) || 0;
            const diskon = parseInt(document.getElementById('diskon').value) || 0;
            const total = harga - (harga * (diskon / 100));

            document.getElementById('total').value = total
            document.getElementById('total-show').value = formatRupiah(total);
        }

        function calculateReturn() {
            const vascout = parseFloat(document.getElementById('vascout').value) || 0;
            const total = (document.getElementById('total').value) || 0;
            const sisa = vascout - +(total);

            document.getElementById('sisa').value = sisa
            document.getElementById('sisa-show').value = formatRupiah(sisa);
        }

        function formatRupiah(number) {
            return number.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).replace('Rp', '').trim();
        }
    </script>
    {{-- <script>
        $(document).ready(function() {

            function getCarts() {
                $.ajax({
                    type: 'get',
                    url: "carts",
                    dataType: "json",
                    success: function(response) {
                        let total = 0;
                        $('tbody').html("");
                        $.each(response.carts, function(key, product) {
                            total += product.price * product.quantity
                            $('tbody').append(`
                            <tr>
                                <td>${product.name}</td>
                                <td class="d-flex">
                                    <select class="form-control qty">
                                    ${[...Array(product.stock).keys()].map((x) => (
                                        `<option ${product.quantity == x + 1 ? 'selected' : null} value=${x + 1}>
                                                            ${x + 1}
                                                        </option>`
                                    ))}
                                    </select>
                                    <input
                                        type="hidden"
                                        class="cartId"
                                        value="${product.id}"
                                        />
                                    <button
                                        type="button"
                                        class="btn btn-danger btn-sm delete"
                                        value="${product.id}"
                                        
                                    >
                                    <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                <td class="text-right">
                                $${ product.quantity * product.price}
                                </td>
                            </tr>
                            `)
                        });

                        const test = $('.total').attr('value', `${total}`);
                    }
                })
            }

            getCarts()

            $(document).on('change', '.received', function() {
                const received = $(this).val();
                const total = $('.total').val();
                const subTotal = received - total;
                const change = $('.return').val(subTotal);
            })

            $(document).on('change', '.qty', function() {
                const qty = $(this).val();
                const cartId = $(this).closest('td').find('.cartId').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'put',
                    url: `carts/${cartId}`,
                    data: {
                        qty
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 400) {
                            alert(response.message);
                        }
                        getCarts()
                    }
                })
            })

            $(document).on('keyup', '.search', function() {
                const search = $(this).val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'post',
                    url: `products/search`,
                    data: {
                        search
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('.product-search').html("");
                        $.each(response, function(key, product) {
                            $('.product-search').append(`
                            <button type="button"
                                class="item"
                                style="cursor: pointer; border: none;"
                                value="${product.id}"
                            >
                                <img src="http://127.0.0.1:8000/storage/${product.image.id}/${product.image.file_name}" width="45px" height="45px" alt="test" />
                               
                                <h6 style="margin: 0;">${product.name}</h6>
                                <span >(${product.price})</span>
                            </button>
                            `)
                        });
                    }
                })
            })

            $(document).on('click', '.delete', function() {
                const cartId = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'delete',
                    url: `carts/${cartId}`,
                    success: function(response) {
                        if (response.status === 400) {
                            alert(response.message);
                        }
                        getCarts()
                    }
                })
            })

            $('.scan').click(function(e) {
                e.preventDefault();
                const productCode = $(this).closest('form').find('.productCode').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'post',
                    url: `carts`,
                    data: {
                        productCode
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 400 || response.status === 500) {
                            alert(response.message);
                        }
                        getCarts()
                    }
                })
            });

            $(document).on('click', '.item', function() {
                const productId = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'post',
                    url: `carts`,
                    data: {
                        productId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 400) {
                            alert(response.message);
                        }
                        getCarts()
                    }
                })

            })
        })
    </script> --}}
@endpush
