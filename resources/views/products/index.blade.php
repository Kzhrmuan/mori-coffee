@extends('layouts.app')

@section('title', 'Produk')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Menu Produk</h2>
            <p class="text-muted">Kelola menu Mori Coffee</p>
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Tambah Produk
        </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Notifikasi error --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Ketersediaan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $products->firstItem() + $loop->index }}</td>

                                <td class="fw-semibold">
                                    {{ $product->name }}
                                </td>

                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $product->category->name }}
                                    </span>
                                </td>

                                <td>
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>

                                {{-- Status ketersediaan --}}
                                <td>
                                    @if($product->availability == 'Ready')
                                        <span class="badge bg-success">
                                            Ready
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Sold Out
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $product->description ?? '-' }}
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        <a href="{{ route('products.edit', $product) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('products.destroy', $product) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    Belum ada produk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $products->links() }}
            </div>

        </div>
    </div>

</div>
@endsection