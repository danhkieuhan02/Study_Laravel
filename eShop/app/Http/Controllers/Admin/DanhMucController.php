<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DanhMucController extends Controller
{
    public function index()
    {
        //hiển thị danh sách của bảng.
        // dd($data);
        // $data = DanhMuc::oderByDec("id")->paginate(2); // cách phân trang 2.
        $data = DanhMuc::orderBy("id", "desc")->paginate(5);
        // dd($allData);
        // $data = DanhMuc::all();
        return view('admin.danhmuc.index')->with('data', $data); // có thể dùng admin/danhmuc/index
        // return view('admin.danhmuc.index', compact("data")); // compact là hàm của php, không phải của laravel. nó sẽ dùng tên chuyển vào array để tìm biến tương ứng.
    }

    public function create()
    {
        return view('admin/danhmuc/create');
        //hiển thị theme để thêm danh mục.
    }
    public function store(Request $request)
    {
        //có chức năng thêm dữ liệu, đi kèm với thằng create ở trên. Nếu create là get thì store sẽ là post.
        // $data = $request->all();
        // unset($data["_token"]);

        //Ràng buộc dữ liệu
        // $this->customValidate($request);

        // $modal = new DanhMuc($data);
        // $modal->save();
        //chuyển hướng về trang "Home"
        // return redirect()->to("/");
    }

    public function show($id)
    {
        //hiển thị thông tin chi tiết của dữ liệu nào đó theo id.
    }

    public function edit($id)
    {
        //hiện lên giao diện chỉnh sửa, có chức năng chỉnh sửa thông tin chi tiết của dữ liệu nào đó theo id. 
        //gồm 2 hàm edit và update
        $data = DanhMuc::findOrFail($id);
        return view('admin.danhmuc.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        //có chức năng cập nhật giao diện những thông tin đã sửa trên giao diện. Get hiển thị, Post cập nhật.
        //Nhận data mới từ user
        // $inputData = $request->all();
        // unset($inputData["_token"]);

        // $this->customValidate($request);

        //load dữ liệu hiện tại (dữ liệu cũ)
        // $data = DanhMuc::findOrFail($id);

        //load và cập nhật dữ liệu mới
        // $data->ten_dm = $inputData['ten_dm'];
        // $data->save();
        // return redirect()->route('admin.danhmuc.index');
    }

    // hàm viết chung thằng store và thằng update. dựa vào $id để quyết định xem là update hay insert. Nếu tìm thấy id thì update, không thấy id thì create.
    public function upsert(Request $request, $id = NULL)
    {
        $data = $request->all();
        unset($data["_token"]);
        $this->customValidate($request);

        //update hoặc insert.
        DanhMuc::updateOrCreate(['id' => $id], $data);
        if ($id == NULL) {
            $msg = "Thêm danh mục mới thành công!";
        } else {
            $msg = "Cập nhật danh mục thành công!";
        }
        return redirect()->route("admin.danhmuc.index")->with("_success", $msg);
        // $request->session()->flash('_success', "Thêm danh mục thành công."); 
        return redirect()->route('admin.danhmuc.index');
    }

    public function destroy(Request $request, $id)
    {
        //xóa dữ liệu trong db dựa theo id. 
        $dm = DanhMuc::findOrFail($id);
        $ten_dm = $dm->ten_dm;
        DanhMuc::destroy($id);
        // $request->session()->flash('_success', "Xóa danh mục thành công.");
        $msg = "Đã xóa danh mục '$ten_dm' thành công!";
        return redirect()->route('admin.danhmuc.index')->with('_success', $msg);
    }

    private function customValidate(Request $request)
    {
        //Ràng buộc dữ liệu
        $rules = [
            "ten_dm" => "required|min:3|max:100" // not null, min 3 kí tự, max 100 kí tự.
        ];
        $request->validate($rules);
    }
}
