@extends('layouts.app')

@section('content')
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
                        <input name="search" value="{{$search}}" type="text" placeholder="Cari kegiatan..." />
                    </form>
                </div>
            </div>
            <div class="crancy-customer-filter__single">
                <a href="{{route('project.create')}}"
                    class="crancy-btn crancy-projects-head__button crancy-projects-head__button--add"><i
                        class="fas fa-plus"></i>Tambah Kegiatan</a>
            </div>
        </div>

        <table class="crancy-table__main crancy-table__main-v3 px-5">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td><img src="{{ asset('storage/' . $project->image) }}" width="50" /></td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{\Carbon\Carbon::parse($project->start_date)->format('d M Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($project->end_date)->format('d M Y')}}</td>
                    <td class="text-center d-flex" colspan="2">
                        <div class="action-buttons">
                            <a href="{{route('project.edit',$project)}}" class="btn btn-outline-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('project.destroy', $project) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this cashflow?');">
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
        </table>
    </div>
</div>
@endsection
