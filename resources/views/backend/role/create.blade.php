@extends('backend.layouts.master')

@section('main-content')
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Thêm Mới Vai Trof</h6>

        </div>
        <div class="card-body">
            <form method="post" action="{{route('roles.store')}}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">Tên nhân viên</label>
                            <input class="form-control" id="name" type="text" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="jobTitle">Chức vụ</label>
                            <input class="form-control" id="jobTitle" type="text" name="jobTitle"
                                value="{{ old('jobTitle') }}">
                            @error('jobTitle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="quantity">Mô tả</label>
                            <input class="form-control" id="quantity" type="text" name="description"
                                value="{{ old('description') }}">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">


              <div class="col-4">
                <div class="form-group">
                  <label for="status" class="col-form-label">Trạng thái <span class="text-danger">*</span></label>
                  <select name="status" class="form-control">
                      <option value="1">Kinh Doanh</option>
                      <option value="0">Ngừng Kinh Doanh</option>
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
