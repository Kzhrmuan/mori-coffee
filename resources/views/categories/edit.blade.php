
@extends('layouts.app')

@section('title', 'Edit Kategori - Mori Coffee')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Edit Kategori</h2>
        <p class="text-muted mb-0">
            Perbarui informasi kategori menu Mori Coffee
        </p>
    </div>

    {{-- Form --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('categories.update', $category->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- Nama kategori --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">
                        Nama Kategori <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $category->name) }}"
                           required>

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">
                        Deskripsi
                    </label>

                    <textarea name="description"
                              id="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="4">{{ old('description', $category->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary">
                        Update Kategori
                    </button>

                    <a href="{{ route('categories.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection
