@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All brands</h1>
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
                        <div class="card-header">
                            <a href="{{ route('admin.brand.create') }}" class="btn btn-primary float-right">Create
                                new</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Brand image</th>
                                    <th>Brand name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @forelse ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }} </td>
                                        <td>{{ $brand->name }} </td>
                                        <td>
                                            @if ($brand->image != '')
                                                <img style="width: 60px" src="{{ asset($brand->image) }}" alt="">
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <form class="ml-1"
                                                action="{{ route('admin.brand.destroy', $brand->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No brands found!</td>
                                    </tr>

                                    @endforelse
                            </tbody>
                        </table>

                        {{ $brands->links() }}

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
