@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Thêm Mới nhân viên</h6>

        </div>
        <div class="card-body">
            <form method="post" action="{{ route('department.store') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">Mã nhân viên</label>
                            <input class="form-control" id="codeEmployee" type="text" name="codeEmployee"
                                value="{{ old('codeEmployee') }}">
                            @error('codeEmployee')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="fullName">Tên nhân viên</label>
                            <input class="form-control" id="fullName" type="text" name="fullName"
                                value="{{ old('fullName') }}">
                            @error('fullName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">email</label>
                            <input class="form-control" id="email" type="text" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-3">
                        <div class="form-group">
                            <label for="dateOfBirth">Ngày sinh</label><br>
                            <input type="date" name='dateOfBirth' id='dateOfbirth' value="{{old('dateOfBirth')}}">
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label for="handyNumber">Số điện thoại<span class="text-danger">*</span></label>
                            <input type="text" name="handyNumber", id="handyNumber" value="{{old('handyNumber')}}">
                            @error('handyNumber')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-3">
                        <div class="form-group">
                            <label for="cat_id">Danh mục <span class="text-danger">*</span></label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option value="">--Chọn danh mục--</option>
                                @foreach ($categories as $key => $cat_data)
                                    <option value='{{ $cat_data->id }}'>{{ $cat_data->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group d-none" id="child_cat_div">
                            <label for="child_cat_id">Danh Mục Con</label>
                            <select name="child_cat_id" id="child_cat_id" class="form-control">
                                <option value="">--Chọn danh mục con--</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="discount" class="col-form-label">Khuyến mãi(%)</label>
                      <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount"  value="{{old('discount')}}" class="form-control">
                      @error('discount')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div> --}}

                  {{-- <div class="col-4">
                    <div class="form-group">
                      <label for="position" class="col-form-label">Chức danh</label>
                      <select name="position[]" class="form-control selectpicker"  multiple data-live-search="true">
                        <option value="">--Select any position--</option>
                        <option value="Chef">Giám đốc</option>
                        <option value="leader">Trưởng phòng</option>
                        <option value="Employee">Nhân viên</option>
                        <option value="Guard">Bảo vệ</option>
                    </select>
                      @error('position')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div> --}}

                {{-- <div class="col-4">
                  <div class="form-group">
                    <label for="brand_id" class="col-form-label">Thương hiệu</label>
                    <select name="brand_id" class="form-control">
                        <option value="">--Chọn thương hiệu--</option>
                       @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->title}}</option>
                       @endforeach
                    </select>
                  </div>
                </div>
                </div> --}}

                {{-- <div class="form-group">
                  <label for="summary" class="col-form-label">Chi tiết nhân viên<span class="text-danger">*</span></label>
                  <textarea class="form-control" id="summary" name="summary">{{old('summary')}}</textarea>
                  @error('summary')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div> --}}
        
                <div class="form-group">
                  <label for="description" class="col-form-label">Chi tiết nhân viên</label>
                  <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                  @error('description')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>

            <div class="row">

              {{-- <div class="col-4">
                <div class="form-group">
                  <label for="condition">Tình trạng</label>
                  <select name="condition" class="form-control">
                      <option value="">--Chọn tình trạng--</option>
                      <option value="0">Mặc Định</option>
                      <option value="1">Mới</option>
                      <option value="2">Hot</option>
                  </select>
                </div>
              </div> --}}

              <div class="col-4">
                <div class="form-group">
                  <label for="inputPhoto" class="col-form-label">Hình Ảnh {{_('(Kích Thước Ảnh 400X266)')}}<span class="text-danger">*</span></label>
                  <div class="input-group">
                      <span class="input-group-btn">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                          <i class="fa fa-picture-o"></i>Chọn ảnh
                          </a>
                      </span>
                  <input id="thumbnail" class="form-control" type="text" name="avatar" value="{{old('avatar')}}">
                </div>
                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                  @error('avatar')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>

              <div class="col-4">
                <div class="form-group">
                  <label for="status" class="col-form-label">Trạng thái <span class="text-danger">*</span></label>
                  <select name="status" class="form-control">
                      <option value="1">Hoạt động</option>
                      <option value="0">Ngừng hoạt động</option>
                  </select>
                  @error('status')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
              </div>
              
            </div>
            <div class="form-group mb-3">
              <button type="reset" class="btn btn-warning">Làm mới</button>
               <button class="btn btn-success" type="submit">Lưu</button>
            </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#summary').summernote({
                placeholder: "Mô tả ngắn.....",
                tabsize: 2,
                height: 100
            });
        });

        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Mô tả sản phẩm.....",
                tabsize: 2,
                height: 200
            });
        });
        // $('select').selectpicker();
        $(document).ready(function() {
            $('#specifications').summernote({
                placeholder: "Thông số kỹ thuật.....",
                tabsize: 2,
                height: 200
            });
        });
    </script>

    <script>
        $('#cat_id').change(function() {
            var cat_id = $(this).val();
            // alert(cat_id);
            if (cat_id != null) {
                // Ajax call
                $.ajax({
                    url: "/admin/category/" + cat_id + "/child",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: cat_id
                    },
                    type: "POST",
                    success: function(response) {
                        if (typeof(response) != 'object') {
                            response = $.parseJSON(response)
                        }
                        // console.log(response);
                        var html_option = "<option value=''>----Chọn danh mục con----</option>"
                        if (response.status) {
                            var data = response.data;
                            // alert(data);
                            if (response.data) {
                                $('#child_cat_div').removeClass('d-none');
                                $.each(data, function(id, title) {
                                    html_option += "<option value='" + id + "'>" + title +
                                        "</option>"
                                });
                            } else {}
                        } else {
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            } else {}
        })
    </script>
@endpush
