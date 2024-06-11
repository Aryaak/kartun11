@extends('layouts.app')

@section('content')
<!-- Dashboard Inner -->
<div class="crancy-dsinner">
    <div class="crancy-table crancy-table--v3 mg-top-30">
        <div class="crancy-customer-filter">
            <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                <div class="crancy-header__form crancy-header__form--customer">
                    <form class="crancy-header__form-inner" action="#">
                        <button class="search-btn" type="submit">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="9.78639" cy="9.78614" r="8.23951" stroke="#9AA2B1" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></circle>
                                <path d="M15.5176 15.9448L18.7479 19.1668" stroke="#9AA2B1" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <input name="search" value="{{$search}}" type="text" placeholder="Cari anggaran..." />
                    </form>
                </div>
            </div>
            <div class="crancy-customer-filter__single">
                <a href="{{route('cashflow.create')}}" class="crancy-btn crancy-projects-head__button crancy-projects-head__button--add"><i
                        class="fas fa-plus"></i>Tambah Anggaran</a>
            </div>
        </div>

        <!-- crancy Table -->
        <table class="crancy-table__main crancy-table__main-v3">
            <!-- crancy Table Head -->
            <thead class="crancy-table__head">
                <tr>
                    <th class="text-center">
                        Tanggal
                    </th>
                    <th class="text-center">
                        Nama
                    </th>
                    <th class="text-center">
                        Jenis
                    </th>
                    <th class="text-center">
                        Nominal
                    </th>
                    <th class="text-center">
                        Lampiran
                    </th>
                    <th class="text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <!-- crancy Table Body -->
            <tbody class="crancy-table__body">
                @foreach ($cashflows as $cashflow)
                <tr>
                    <td class="text-center">
                        {{\Carbon\Carbon::parse($cashflow->date)->format('d M Y')}}
                    </td>
                    <td class="text-center">
                        {{$cashflow->name}}
                    </td>
                    <td class="text-center">
                        @if ($cashflow->type == 'pemasukan')
                        <span class="fw-bold text-success">{{ucwords($cashflow->type)}}</span>
                        @else
                        <span class="fw-bold text-danger">{{ucwords($cashflow->type)}}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        {{'Rp. ' .  number_format($cashflow->nominal, 0, '.', '.')}}
                    </td>
                    <td class="text-center">
                        <a target="_blank" href="{{asset('storage/' . $cashflow->file)}}">Lihat Bukti</a>
                    </td>
                    <td class="text-center">
                        <div class="action-buttons">
                            <a href="{{route('cashflow.edit',$cashflow)}}" class="btn btn-outline-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('cashflow.destroy', $cashflow) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this cashflow?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="bi bi-x-square"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <!-- End crancy Table Body -->
        </table>
        <!-- End crancy Table -->
    </div>
</div>
<!-- End Dashboard Inner -->
@endsection
