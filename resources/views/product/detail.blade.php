@extends('layout.main')

@section('content')
<section class="breadcrumb-section pb-3 pt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
        </ol>
    </div>
</section>
<section class="product-page pb-4 pt-4">
    <div class="container">
        <div class="row product-detail-inner">
            <div class="col-lg-6 col-md-6 col-12">
                <div id="product-images" class="carousel slide" data-ride="carousel">
                    <!-- slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active"> <img src="{{asset('foto_barang/'.$barang->foto)}}" alt="Product 1"> </div>

                    </div> <!-- Left right -->
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="product-detail">
                    <h2 class="product-name">{{$barang->nama_barang}}</h2>
                    <div class="product-price">
                        <span class="price">IDR {{$barang->harga}}</span>
                    </div>
                    <div class="product-short-desc">
                        <p>
                            {{$barang->deskripsi}}
                        </p>

                    </div>
                    <div class="row">
                        @if($barang->pemilik != auth()->user()->id)
                        <div class="col-md-5">
                            <button type="button" class="btn btn-primary btn-block" data-target="#exampleModalCenter" data-toggle="modal">Beli</button>
                        </div>
                        @else
                        <div class="col-md-5">
                            <button type="button" class="btn btn-warning btn-block">Edit Barang</button>
                        </div>
                        @endif
                    </div>
                    <br>
                    <div class="product-categories">
                        <ul>
                            <li class="categories-title">Categories :</li>
                            <li><a href="#">{{$barang->Kategori->nama_kategori}}</a></li>
                        </ul>
                        <ul>
                            <li class="categories-title">Jenis Barang :</li>
                            <li><a href="#">{{$barang->jenis}}</a></li>
                        </ul>
                        <ul>
                            <li class="categories-title">Pemilik Barang :</li>
                            <li><a href="#">{{$barang->Pemilik->name}}</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@section('modal')
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Jenis Pembayaran</label>
                        <select name="" id="" class="form-control">
                            <option selected disabled>==Pilih==</option>
                            <option value="">BCA</option>
                            <option value="">BRI</option>
                            <option value="">BNI</option>
                            <option value="">Mandiri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">No Rekening</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Pengiriman</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Beli</button>
            </div>
        </div>
    </div>
</div>
@endsection