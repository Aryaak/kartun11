@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-body p-5">
        <form action="{{route('cashflow.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="form-group col-12 mb-3">
                    <label class="form-label" for="file">Lampiran</label>
                    <input required type="file" class="form-control" id="file" name="file">
                </div>

                <div class="form-group col-12 col-md-6 mb-3">
                    <label class="form-label" for="name">Nama</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama">
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="nominal">Nominal</label>
                    <input required type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukkan nominal">
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="date">Tanggal</label>
                    <input required type="date" class="form-control" id="date" name="date">
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="type">Jenis</label>
                    <select required name="type" id="type" class="form-select">
                        <option selected disabled>Pilih Jenis</option>
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Tambah</button>
        </form>
    </div>
</div>
@endsection
