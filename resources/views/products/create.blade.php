@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container py-4">

    <div class="mb-4">
        <h2 class="fw-bold">Tambah Produk</h2>
        <p class="text-muted">Tambahkan menu baru Mori Coffee</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                {{-- Kategori --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label">
                        Kategori
                    </label>

                    <select name="category_id" id="category_id"
                            class="form-select @error('category_id') is-invalid @enderror">

                        <option value="">-- Pilih Kategori --</option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Produk --}}
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Nama Produk
                    </label>

                    <input type="text"
                           name="name"
                           id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Contoh: Americano">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Harga --}}
                <div class="mb-3">
                    <label for="price" class="form-label">
                        Harga (Rp)
                    </label>

                    <input type="number"
                           name="price"
                           id="price"
                           class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price') }}"
                           placeholder="Contoh: 18000"
                           min="0">

                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Ketersediaan --}}
				<div class="mb-3">
					<label for="availability" class="form-label">
						Ketersediaan Menu
					</label>

					<select name="availability"
							id="availability"
							class="form-select @error('availability') is-invalid @enderror">

						<option value="">-- Pilih Status --</option>

						<option value="Ready" {{ old('availability') == 'Ready' ? 'selected' : '' }}>
							Ready
						</option>

						<option value="Sold Out" {{ old('availability') == 'Sold Out' ? 'selected' : '' }}>
							Sold Out
						</option>

					</select>

					@error('availability')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="description" class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="3"
                              class="form-control @error('description') is-invalid @enderror"
                              placeholder="Deskripsi produk">{{ old('description') }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Simpan Produk
                    </button>

                    <a href="{{ route('products.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection