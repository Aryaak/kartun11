@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-body p-5">
        <form action="{{ route('cashflow.update', $cashflow) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="form-group col-12 mb-3">
                    <label class="form-label" for="file">Lampiran</label>
                    <input type="file" class="form-control" id="file" name="file">
                    @if($cashflow->file)
                        <p class="mt-2">Bukti sekarang: <a href="{{ asset('storage/' . $cashflow->file) }}" target="_blank">Lihat bukti</a></p>
                    @endif
                </div>

                <div class="form-group col-12 col-md-6 mb-3">
                    <label class="form-label" for="name">Nama</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" value="{{ $cashflow->name }}">
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="nominal">Nominal</label>
                    <input required type="number" class="form-control" id="nominal" name="nominal" placeholder="Masukkan nominal" value="{{ $cashflow->nominal }}">
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="date">Tanggal</label>
                    <input required type="date" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::parse($cashflow->date)->format('Y-m-d') }}">
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="type">Jenis</label>
                    <select required name="type" id="type" class="form-select">
                        <option disabled>Pilih Jenis</option>
                        <option value="pemasukan" {{ $cashflow->type == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                        <option value="pengeluaran" {{ $cashflow->type == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                    </select>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Ubah</button>
        </form>
    </div>
</div>
@endsection
