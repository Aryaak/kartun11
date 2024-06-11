@extends('layouts.app')

@section('content')
<div class="card mt-5">
    <div class="card-body p-5">
        <form action="{{ route('project.update', $project) }}" method="POST" enctype="multipart/form-data" class="row">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="image">Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group mb-3 col-12">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $project->name }}" required>
            </div>
            <div class="form-group mb-3 col-12">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control" required cols="30" rows="10"
                    style="height: 300px">{{ $project->description }}</textarea>
            </div>
            <div class="form-group mb-3 col-6">
                <label for="start_date">Tanggal Mulai</label>
                <input type="date" name="start_date" class="form-control" value="{{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }}" required>
            </div>
            <div class="form-group mb-3 col-6">
                <label for="end_date">Tanggal Selesai</label>
                <input type="date" name="end_date" class="form-control" value="{{ \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
</div>
@endsection
