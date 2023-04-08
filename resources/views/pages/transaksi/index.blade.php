@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Code</th>
                <th scope="col">Cash</th>
                <th scope="col">Change</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaction as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th>{{ $item->code_invoice }}</th>
                    <th>{{ $item->cash }}</th>
                    <th>{{ $item->change }}</th>
                    <td>
                        <a href="{{ route('transaction.print', $item->id) }}" class="btn btn-primary">Cetak</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal{{ $item->id }}">Detail</button>
                    </td>
                </tr>
                <!-- Detail History Modal -->
                <div class="modal fade" id="addCategoryModal{{ $item->id }}" tabindex="-1"
                    aria-labelledby="addCategoryModalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCategoryModalLabel{{ $item->id }}">Detail History</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li>Total: Rp{{ $item->cash }}</li>
                                    <li>Kembalian: Rp{{ $item->change }}</li>
                                    <li>Create at: {{ $item->created_at }}</li>
                                    <br>
                                    <li>Data:</li>
                                    <!-- Tambahkan kode untuk menampilkan detail transaksi berdasarkan ID-nya -->
                                    @foreach ($transaction_details as $temp)
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
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection
