@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Products</h1>
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
                    <div class="card-header">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary float-right">Create new</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product name</th>
                                    <th>Product image</th>
                                    <th>Product category</th>
                                    <th>Product brand</th>
                                    <th>Product price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }} </td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if ($product->image != '')
                                                <img width="60px" src="{{ asset($product->image) }}" alt="">
                                            @endif

                                        </td>
                                        <td>{{ $product->category?->name }}</td>
                                        <td>{{ $product->brand?->name }}</td>
                                        <td> {{ $product->price }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.product.edit', $product->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                                <form class="ml-1" action="{{ route('admin.product.destroy',$product->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No product found!</td>
                                    </tr>

                                    @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
