<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index()
    {
        $data = SanPham::orderByDesc('id')->paginate(5);
        return view('admin.sanpham.index')->with('data', $data);
    }

    public function create()
    {
        return view("admin.sanpham.create");
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = SanPham::findOrFail($id);
        return view('admin.sanpham.edit')->with('data', $data);
    }

    public function upsert(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        //truong hop them moi
        $file = $request->file("cover_img");
        if ($id == null) {
            $filename = "";
            if (!empty($file)) {
                $filename = $file->hashName(); // chuyen ten file thanh chuoi ngau nhien de dam bao ten file anh se khong bi trung  ten gay loi
                $file->storeAs("/file", $filename);
                $filename = "/file/" . $filename;
            }
            $data["cover_img"] = $filename;
        } else {
            if (empty($file)) {
                unset($data["cover_img"]);
            } else {
                $filename = $file->hashName();
                $file->storeAs("/file", $filename);
                $filename = "/file/" . $filename;
                $data["cover_img"] = $filename;
            }
        }
        SanPham::updateOrCreate(["id" => $id], $data);
        if ($id == NULL) {
            $msg = "Thêm sản phẩm mới thành công!";
        } else {
            $msg = "Cập nhật sản phẩm thành công!";
        }
        return redirect()->route('admin.sanpham.index')->with('_success', $msg);
    }

    public function destroy($id)
    {
        //xóa dữ liệu trong db dựa theo id. 
        $sp = SanPham::findOrFail($id);
        $ten_sp = $sp->ten_sp;
        SanPham::destroy($id);
        // $request->session()->flash('_success', "Xóa danh mục thành công.");
        $msg = "Đã xóa sản phẩm '$ten_sp' thành công!";
        return redirect()->route('admin.sanpham.index')->with('_success', $msg);
    }
}
