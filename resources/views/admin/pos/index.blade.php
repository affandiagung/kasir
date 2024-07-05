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
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <label for="address">Alamat</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <label for="resep">Resep</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="resep" name="resep" required>
                    </div>
                </div>
                <hr style="height: 10px;color: rgb(13, 12, 12)">
                <h3 class="text-center">UKURAN LENSA</h3>
                <br><br>
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="right_size">Right</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" class="form-control" name="right_size" id="right_size"
                                    placeholder="ukuran" style="max-width: 50%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="row">
                            <div class="col-md-6 form-group"><label for="right-type">Pilihan</label></div>
                            <div class="col-md-6 form-group"> <select class="form-control" id="right_type"
                                    class="form-control" name="right_type">
                                    <option value="">&nbsp; Pilih </option>
                                    @for ($i = 0; $i < count($ukuran); $i++)
                                        <option value="{{ $ukuran[$i]->nama_ukuran }}"> &nbsp;
                                            {{ $ukuran[$i]->nama_ukuran }}
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
                                <label for="left_size">Left</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" class="form-control" id="left_size" name="left_size"
                                    placeholder="ukuran" style="max-width: 50%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="row">
                            <div class="col-md-6 form-group"><label for="left-type">Pilihan</label></div>
                            <div class="col-md-6 form-group"> <select class="form-control" id="left_type"
                                    class="form-control" name="left_type">
                                    <option value="">&nbsp; Pilih </option>
                                    @for ($i = 0; $i < count($ukuran); $i++)
                                        <option value="{{ $ukuran[$i]->nama_ukuran }}"> &nbsp;
                                            {{ $ukuran[$i]->nama_ukuran }}
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
                                <option value="{{ $merek[$i]->nama_merek }}"> &nbsp; {{ $merek[$i]->nama_merek }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="lens-type">&nbsp;</label>
                        <select class="form-control" id="tipe" class="form-control" name="tipe" required>
                            <option value="">- Nama Tipe -</option>
                            @for ($i = 0; $i < count($tipe); $i++)
                                <option value="{{ $tipe[$i]->nama_type }}"> &nbsp; {{ $tipe[$i]->nama_type }}</option>
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
                            <input type="hidden" class="form-control" id="total" name="total">

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
    </div>
@endsection

@push('script-alt')
    <script>
        function calculateTotal() {
            const harga = parseInt(document.getElementById('harga').value) || 0;
            const diskon = parseInt(document.getElementById('diskon').value) || 0;
            const total = harga - (harga * (diskon / 100));

            document.getElementById('total').value = total
            // $('#editUser .data-id').val(data.id);
            document.getElementById('total-show').value = formatRupiah(total);
        }

        function calculateReturn() {
            const vascout = parseFloat(document.getElementById('vascout').value) || 0;
            const total = (document.getElementById('total').value) || 0;
            const sisa = vascout - +(total);

            document.getElementById('sisa').value = sisa
            console.log(document.getElementById('sisa').value);
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
@endpush
