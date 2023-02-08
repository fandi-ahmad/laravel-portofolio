@extends('dashboard.layout')

@section('content')
    <p class="card-title">Page</p>
    <div class="pb-3">
        <a href="{{ route('page.index') }}" class="btn btn-secondary text-white">
            << kembali
        </a>
    </div>
    <form action="{{ route('page.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" aria-describedby="helpId" placeholder="judul" value="{{ Session::get('judul') }}">
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control" name="isi" rows="5">{{ Session::get('isi') }}</textarea>
        </div>

        <button class="btn btn-primary text-white" name="save" type="submit">Save</button>
    </form>
@endsection