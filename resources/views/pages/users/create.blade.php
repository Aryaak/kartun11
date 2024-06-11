@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
<div class="card mt-5">
    <div class="card-body p-5">
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="form-group col-12 mb-3">
                    <label class="form-label" for="photo">Foto</label>
                    <input required type="file" class="form-control" id="photo" name="photo">
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="name">Nama</label>
                    <input required type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="phone">No. HP</label>
                    <input required type="number" class="form-control" id="phone" name="phone">
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="email">Email</label>
                    <input required type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="password">Password</label>
                    <input required type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="role_uuid">Jabatan</label>
                    <select required name="role_uuid" id="role_uuid" class="form-select">
                        @foreach ($roles as $item)
                        <option value="{{$item->uuid}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label class="form-label" for="position">Posisi</label>
                    <input required type="text" class="form-control" id="position" name="position">
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Tambah</button>
        </form>
    </div>

</div>
@endsection
