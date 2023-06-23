<x-layout-admin title="Thêm sản phẩm">
    <h4>Thêm sản phẩm</h4>
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.sanpham.upsert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-app-input name="ten_sp" label="Tên sản phẩm" />
                <x-app-input name="gia" label="Giá" type="number" />
                <x-app-input name="mo_ta" label="Mô tả" />
                <x-app-input name="cover_img" label="Ảnh" type="file" />
                <x-app-select name="id_dm" label="ID Danh mục" model="DanhMuc" displayMember="ten_dm" valueMember="id"
                    selected="" />
                <div class="mt-3">
                    <input type="submit" value="Thêm sản phẩm mới" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</x-layout-admin>
