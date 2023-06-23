<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SanPham extends Model
{
    use HasFactory;
    protected $fillable = [
        "ten_sp",
        "mo_ta",
        "gia",
        "cover_img",
        "id_dm"
    ];

    //cấu hình liên kết khóa ngoại
    public function danh_mucs(): BelongsTo
    {
        return $this->belongsTo(DanhMuc::class, "id_dm", "id");
    }
}
