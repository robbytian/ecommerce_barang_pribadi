@extends('layout.main')

@section('content')
<section class="breadcrumb-section pb-3 pt-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </div>
</section>
<section class="products-grid pb-4 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="sidebar">

                    <div class="sidebar-widget">
                        <div class="widget-title">
                            <h3>Categories</h3>
                        </div>
                        <div class="widget-content widget-categories">
                            <ul>
                                @foreach($kategoris as $kategori)
                                <li><a href="#">{{$kategori->nama_kategori}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="/product/detail">
                                    <img src="./assets/img/products/p1.jpg" class="img-fluid" />
                                </a>
                            </div>
                            <div class="product-content">
                                <h3><a href="/product/detail">Cool &amp; Awesome Item</a></h3>
                                <div class="product-price">
                                    <span>$57.00</span>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</section>
@endsection