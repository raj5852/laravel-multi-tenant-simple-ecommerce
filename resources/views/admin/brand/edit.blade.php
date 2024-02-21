@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update brand</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6"></div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="">Brand name</label>
                                        <input type="text" value="{{ $brand->name }}" name="name"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="">brand image</label>
                                        @if ($brand->image != '')
                                            <img width="50px" src="{{ asset($brand->image) }}" alt="">
                                        @endif
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-3">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
