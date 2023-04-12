@extends('layouts.app')
@section('web-title', 'Transaction |')
@section('content')
    <table class="table table-hover">
        <thead style="background-color: #96d059; color: white">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Code</th>
                <th scope="col">Cash</th>
                <th scope="col">Change</th>
                <th scope="col" colspan="2">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaction as $item)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $item->code_invoice }}</td>
                    <td>Rp{{ number_format($item->cash) }}</td>
                    <td>Rp{{ number_format($item->change) }}</td>
                    <td>
                        <a href="{{ route('transaction.print', $item->id) }}" class="btn btn-primary"><i class="fa-solid fa-print fa-fw me-1"></i>Cetak</a>
                        <button class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal{{ $item->id }}"><i class="fa-solid fa-circle-info fa-fw me-1"></i>Detail</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
      <!-- Detail History Modal -->
      <div class="modal" id="addCategoryModal{{ $item->id }}" tabindex="-1"
        aria-labelledby="addCategoryModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel{{ $item->id }}">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="fw-semibold text-center">laporan transaksi barang</h5>
                    <p class="text-center">tanggal : {{ $item->created_at }}</p>
                    
                    {{-- <ul>
                        <li>Total: Rp{{ $item->cash }}</li>
                        <li>Kembalian: Rp{{ $item->change }}</li>
                        <li>Create at: {{ $item->created_at }}</li>
                        <br>
                        <li>Data:</li>
                        <!-- Tambahkan kode untuk menampilkan detail transaksi berdasarkan ID-nya -->
                        @foreach ($item->transaction_details as $temp)
                            @if ($temp->transaction_id == $item->id)
                                @php
                                    $product = json_decode($temp->product);
                                @endphp
                                <li>{{ $product->name }} </li>
                                <li>{{ $product->price }} </li>
                                <li>{{ $product->description }} </li>
                                <li>{{ $temp->qty }}</li>
                                <li>{{ $temp->price }}</li>
                                <br>
                            @endif
                        @endforeach
                    </ul> --}}
                    <!-- replace <ul> with <table> and add table headers -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nama produk</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- loop through transaction details and add table rows -->
                        @foreach ($item->transaction_details as $temp)
                            @if ($temp->transaction_id == $item->id)
                            @php
                                $product = json_decode($temp->product);
                                $subtotal = $temp->qty * $temp->price;
                            @endphp
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $temp->qty }}</td>
                                <td>{{ $subtotal }}</td>
                            </tr>
                            @endif
                        @endforeach
                        <!-- add total and change rows -->
                        <tr>
                            <td colspan="4" class="text-end fw-bold">Total:</td>
                            <td>Rp{{ $item->cash }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end fw-bold">Kembalian:</td>
                            <td>Rp{{ $item->change }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end fw-bold">Create at:</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
