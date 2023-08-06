@extends('layouts.app')
@section('title', 'Catatan')

@section('title-header', 'Catatan')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Catatan</li>
@endsection

@section('action_btn')
    <a href="{{route('catatans.create')}}" class="btn btn-default">Tambah Catatan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Catatan</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jenis</th>
                                    <th>Nominal</th>
                                    <th>Harga Asli</th>
                                    <th>Harga Jual</th>
                                    <th>Harga Bayar</th>
                                    <th>Nama</th>
                                    <th>Sudah Bayar</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Saldo Dari</th>
                                    <th>Keuntungan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($catatans as $catatan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $catatan->tanggal }}</td>
                                        <td>{{ $catatan->jenis }}</td>
                                        <td>{{ $catatan->nominal }}</td>
                                        <td>{{ $catatan->harga_asli }}</td>
                                        <td>{{ $catatan->harga_jual }}</td>
                                        <td>{{ $catatan->harga_bayar }}</td>
                                        <td>{{ $catatan->nama }}</td>
                                        <td>{{ $catatan->is_bayar }}</td>
                                        <td>{{ $catatan->metode_id }}</td>
                                        <td>{{ $catatan->wallet_id }}</td>
                                        <td>{{ $catatan->keuntugan }}</td>
                                        <td class="d-flex jutify-content-center">
                                            <a href="{{route('catatans.edit', $catatan->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <form id="delete-form-{{ $catatan->id }}" action="{{ route('catatans.destroy', $catatan->id) }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteForm('{{$catatan->id}}')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        {{ $catatans->links() }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteForm(id){
            Swal.fire({
                title: 'Hapus data',
                text: "Anda akan menghapus data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(`#delete-form-${id}`).submit()
                }
            }) 
        }
    </script>
@endsection