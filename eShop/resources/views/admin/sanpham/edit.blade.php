<x-layout-admin title="Sửa sản phẩm">
    <div class="row">
        <div class="col=12">
            <h2 class="mt-4">Sửa sản phẩm</h2>
        </div>
        <div class="col-md-6">
            {{-- truyền file báo lỗi khi user nhập sai --}}
            {{-- @include('include/errors') --}}
            <form action="{{ route('admin.sanpham.upsert', ['id' => $data->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mt-3">
                    <x-app-input name="ten_sp" label="Tên sản phẩm" value="{{ $data->ten_sp }}" />
                    <x-app-input name="gia" label="Giá" type="number" value="{{ $data->gia }}" />
                    <x-app-input name="mo_ta" label="Mô tả" value="{{ $data->mo_ta }}" />
                    <x-app-input name="cover_img" label="Ảnh" type="file" />
                    <x-app-input name="id_dm" label="ID Danh mục" value="{{ $data->id_dm }}" />

                </div>
                <div class="mt-3">
                    <input type="submit" class="btn btn-success" value="Sửa sản phẩm">
                </div>
            </form>
        </div>
    </div>
</x-layout-admin>
