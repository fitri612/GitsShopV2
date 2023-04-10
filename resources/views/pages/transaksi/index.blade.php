@extends('layouts.app')

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
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th>{{ $item->code_invoice }}</th>
                    <th>Rp{{ number_format($item->cash) }}</th>
                    <th>Rp{{ number_format($item->change) }}</th>
                    <td>
                        {{-- <button class="btn btn-primary"><a href="{{ route('transaction.print', $item->id) }}" class="btn btn-primary"><i class="fa-solid fa-print fa-fw me-1"></i>Cetak</a></button> --}}
                        <a href="{{ route('transaction.print', $item->id) }}" class="btn btn-primary"><i class="fa-solid fa-print fa-fw me-1"></i>Cetak</a>
                        <button class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal{{ $item->id }}"><i class="fa-solid fa-circle-info fa-fw me-1"></i>Detail</button>
                    </td>
                    {{-- <td><a href="{{ route('transaction.print', $item->id) }}" class="btn btn-primary"><i class="fa-solid fa-print fa-fw me-1"></i>Cetak</a></td> --}}
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
