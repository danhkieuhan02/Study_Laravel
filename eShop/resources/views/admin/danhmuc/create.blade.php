<x-layout-admin title="Thêm danh mục">
    <h4>Thêm danh mục</h4>
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.danhmuc.upsert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-app-input name="ten_dm" label="Tên danh mục" />
                <div class="mt-3">
                    <input type="submit" value="Thêm danh mục mới" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</x-layout-admin>
