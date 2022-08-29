@extends('backend.layouts.main_themplate')

@section('content')
    <div class="col-md-2">
    </div>
    <div class="col-md-12">

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">แก้ไขรายการสินค้า</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            {{-- @if($message = Session::get('success'))
            <div class="alert alert-success text-center mb-3">
                {{ $message }}
            </div>
        @endif --}}
            <form class="form-horizontal" method="POST" action="{{ route('products.update') }}" enctype="multipart/form-data">

                @csrf 
                {{-- ป้องกันการโจมตีจากภายนอก --}}
                <div class="card-body">
                    <div class="form-group row">
                        <label for="prd_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prd_name" name="prd_name" placeholder="{{ old('prd_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prd_slug" class="col-sm-2 col-form-label">slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prd_slug" name="prd_slug" placeholder="{{ old('prd_slug') }}">
                        </div>
                    </div>
              
                    <div class="form-group row">
                        <label for="prd_description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea type="description" class="form-control" name="prd_description" id="prd_description" placeholder="{{ old('prd_description') }}" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prd_price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="prd_price" name="prd_price" placeholder="{{ old('prd_price') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prd_image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="File" class="form-control" id="prd_image"  name="prd_image" placeholder="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <div class="form-check">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">บันทึกรายการสินค้า</button>
                    <button type="submit" class="btn btn-default float-right">ยกเลิก</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->

    </div>
    <div class="col-md-2">
    </div>
@endsection
