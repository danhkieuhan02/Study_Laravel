<x-layout-admin>
    <h4>Danh sách sản phẩm</h4>
    <div class="btn">
        <a href="{{ route('admin.sanpham.create') }}" class="btn btn-primary my-12">
            <i class="bi bi-building-add"></i></a>
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Ảnh</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>ID danh mục</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->ten_sp }}</td>
                            <td>{{ number_format($item->gia) }}</td>
                            <td>{{ $item->mo_ta }}</td>
                            <td> <img src="{{ $item->cover_img }}" width="100px;" height="100px;"></td>
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                            <td>{{ $item->danh_mucs->ten_dm ?? '' }}</td>
                            <td></td>
                            <td>
                                <a href="{{ route('admin.sanpham.edit', ['id' => $item->id]) }}"
                                    class="btn btn-success">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.sanpham.destroy', ['id' => $item->id]) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- giao diện phân trang --}}
            {{ $data->links() }}
            </tbody>
            </table>
        </div>

    </div>
</x-layout-admin>
