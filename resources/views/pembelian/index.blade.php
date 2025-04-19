@extends('main')
@section('title', 'Pembelian')
@section('breadcrumb', 'Pembelian')
@section('page-title', 'Pembelian')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('formatexcel') }}" class="btn btn-primary">
                <i class="bi bi-file-earmark-excel"></i> Export Pembelian (.xlsx)
            </a>
        </div>
        @if (Auth::user()->role == 'kasir')
        <div>
            <a href="{{ route('pembelians.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Pembelian
            </a>
        </div>
        @endif
    </div>

    <div class="row mb-4">
        <div class="col-md-6 d-flex align-items-center">
            <label class="me-2">Tampilkan</label>
            <select class="form-select w-auto">
                <option>10</option>
                <option>15</option>
                <option>20</option>
            </select>
            <label class="ms-2">Entri</label>
        </div>
        <div class="col-md-6">
            <form method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Harga</th>
                    <th>Dibuat Oleh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaction as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->member ? $item->member->name : 'Non Member' }}</td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                    <td>Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalDetail{{ $item->id }}">
                                <i class="bi bi-eye"></i> Lihat
                            </button>
                            <a href="{{ route('formatpdf', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-download"></i> Unduh
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Tidak ada data pembelian.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <div>
            Menampilkan 1 hingga 10 dari 100 entri
        </div>
        <div>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

@foreach ($transaction as $item)
<!-- Modal Detail Pembelian -->
<div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel{{ $item->id }}">Detail Pembelian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <p>Status Member : <strong>{{ $item->member ? 'Member' : 'Non Member' }}</strong></p>
                    <p>No. HP : {{ $item->member->phone_number ?? '-' }}</p>
                    <p>Poin Member : {{ $item->member->poin_member ?? '-' }}</p>
                    <p>Bergabung Sejak :
                        {{ $item->member ? \Carbon\Carbon::parse($item->member->created_at)->format('d F Y') : '-' }}
                    </p>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->details as $detail)
                            <tr>
                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->qty }}</td>
                                <td>Rp {{ number_format($detail->product->price, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($detail->product->price * $detail->qty, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total</strong></td>
                                <td><strong>Rp {{ number_format($item->total_price, 0, ',', '.') }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <p class="mt-3 text-muted">
                    <small>Dibuat pada: {{ $item->created_at->format('d M Y H:i') }}<br>
                    Oleh: {{ $item->user->name }}</small>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
