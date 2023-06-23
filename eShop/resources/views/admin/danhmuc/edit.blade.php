<x-layout-admin title="Sửa danh mục">
    <div class="row">
        <div class="col=12">
            <h2 class="mt-4">Sửa danh Mục</h2>
        </div>
        <div class="col-md-6">
            {{-- truyền file báo lỗi khi user nhập sai --}}
            {{-- @include('include/errors') --}}
            <form action="{{ route('admin.danhmuc.upsert', ['id' => $data->id]) }}" method="POST">
                @csrf
                <div class="mt-3">
                    {{-- <label class="form-label" for="">Tên Danh Mục</label> --}}
                    <x-app-input name="ten_dm" label="Tên Danh Mục" value="{{ $data->ten_dm }}" />
                </div>
                <div class="mt-3">
                    <input type="submit" class="btn  btn-success" value="Thêm mới danh Mục">
                </div>
            </form>
        </div>
    </div>
</x-layout-admin>
