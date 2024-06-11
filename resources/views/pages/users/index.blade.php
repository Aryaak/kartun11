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
                        <input name="search" value="{{$search}}" type="text" placeholder="Cari anggota..." />
                    </form>
                </div>
            </div>
            <div class="crancy-customer-filter__single">
                <a href="{{route('user.create')}}"
                    class="crancy-btn crancy-projects-head__button crancy-projects-head__button--add"><i
                        class="fas fa-plus"></i>Tambah Anggota</a>
            </div>
        </div>

        <!-- crancy Table -->
        <table class="crancy-table__main crancy-table__main-v3">
            <!-- crancy Table Head -->
            <thead class="crancy-table__head">
                <tr>
                    <th class="text-center">
                        <div class="crancy-wc__checkbox">
                            <span>Nama</span>
                        </div>
                    </th>
                    <th class="text-center">
                        Email
                    </th>
                    <th class="text-center">
                        No. HP
                    </th>
                    <th class="text-center">
                        Posisi
                    </th>
                    <th class="text-center">
                        Hak Akses
                    </th>
                    <th class="text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <!-- crancy Table Body -->
            <tbody class="crancy-table__body">
                @foreach ($users as $user)
                <tr>
                    <td class="text-center">
                        <div class="crancy-table__customer">
                            <div class="crancy-wc__checkbox">
                                <label for="checkbox" class="crancy-table__customer-img">
                                    <img src="{{asset('storage/' . $user->photo)}}" alt="User Photo" />
                                    <span class="text-sm">{{$user->name}}</span>
                                </label>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        {{$user->email}}
                    </td>
                    <td class="text-center">
                        {{$user->phone}}
                    </td>
                    <td class="text-center">
                        {{$user->position}}
                    </td>
                    <td class="text-center">
                        {{$user->role->name}}
                    </td>
                    <td class="text-center">
                        <div class="action-buttons">
                            <a href="{{route('user.edit',$user)}}" class="btn btn-outline-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('user.destroy', $user) }}" method="POST"
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
            <!-- End crancy Table Body -->
        </table>
        <!-- End crancy Table -->
    </div>
</div>
<!-- End Dashboard Inner -->
@endsection
