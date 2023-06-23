<x-layout-admin>
    <h4>Danh sách danh mục</h4>
    <div class="btn">
        <a href="{{ route('admin.danhmuc.create') }}" class="btn btn-primary my-12">
            <i class="bi bi-building-add"></i></a>
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ngày tạo</th>
                        <th>Ngày Update</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->ten_dm }}</td>
                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                            <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.danhmuc.edit', ['id' => $item->id]) }}" class="btn btn-success">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.danhmuc.destroy', ['id' => $item->id]) }}" method="post"
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
