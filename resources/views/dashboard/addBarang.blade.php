@extends('layout.main_dashboard')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Tambah Barang</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Data Barang</li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="/barang" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" required placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Category</label>
                            <select class="form-control" name="category_id" required>
                                <option selected disabled>==Pilih Kategori==</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="number" name="harga" min=1 class=" form-control" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi </label>
                            <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Singkat" required> </textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto Barang</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" required id="customFile" name="foto">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Barang</label>
                            <select class="form-control" id="jenis" name="jenis" required>
                                <option selected disabled>==Pilih==</option>
                                <option value="Object Real">Object Real</option>
                                <option value="Kepemilikan Karya">Kepemilikan Karya</option>
                            </select>
                        </div>

                        <div class="form-group" id="fileKarya">
                            <label for="exampleInputEmail1">File Karya</label>
                            <div class="custom-file">
                                <input id="karya" type="file" class="custom-file-input" id="customFile" name="file">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Form Sizing -->


            <!-- Horizontal Form -->
        </div>
    </div>
    <!--Row-->
</div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#fileKarya').hide();
        $('#jenis').on('change', function() {
            if ($('#jenis').val() == 'Object Real') {
                $('#fileKarya').hide();
                $('#karya').val('');
                $("#fileKarya").removeAttr("required");
            } else if ($('#jenis').val() == 'Kepemilikan Karya') {
                $('#fileKarya').show();
                $("#fileKarya").prop("required", true);
            }
        });
    });
</script>
@endsection