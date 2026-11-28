
@extends('layouts.app')

@section('title', 'Kategori - Mori Coffee')

@section('content')
<div class="container-fluid py-4">

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Kategori Menu</h2>
            <p class="text-muted mb-0">
                Kelola kategori menu Mori Coffee
            </p>
        </div>

        <a href="{{ route('categories.create') }}"
           class="btn btn-primary">
            + Tambah Kategori
        </a>
    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Pesan error --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- Tabel kategori --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Produk</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>
                                    {{ $categories->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $category->name }}
                                </td>

                                <td>
                                    {{ $category->description ?? '-' }}
                                </td>

                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $category->products_count }} Produk
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        {{-- Edit --}}
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        {{-- Hapus --}}
                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <p class="text-muted mb-2">
                                        Belum ada kategori.
                                    </p>

                                    <a href="{{ route('categories.create') }}"
                                       class="btn btn-primary btn-sm">
                                        Tambahkan Kategori Pertama
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-between align-items-center mt-3">

                <small class="text-muted">
                    Menampilkan {{ $categories->count() }}
                    dari {{ $categories->total() }} kategori
                </small>

                {{ $categories->links() }}

            </div>

        </div>
    </div>

</div>
@endsection
