@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create product</h1>
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
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="">Product name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="">Select category</label>
                                        <select name="category" class="form-control" required>
                                            <option value="">Select category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="">Product image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*" required>
                                        @error('image')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="">Price</label>
                                        <input type="number" name="price" class="form-control" required>
                                        @error('price')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="">Select brand</label>
                                        <select name="brand" id="" class="form-control" required>
                                            <option value="">Select brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-3">
                                        <label for="">Descriptiom</label>
                                        <textarea name="description" class="form-control summernote"></textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger">{{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="mt-3">
                                        <button class="btn btn-primary">Submit</button>
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
