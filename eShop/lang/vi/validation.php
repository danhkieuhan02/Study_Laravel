<?php

return [

    'required' => ':attribute là bắt buộc',
    'min' => [
        'file' => ':attribute không được nhỏ hơn :min KB.',
        'numeric' => ':attribute không được nhỏ hơn  :min.',
        'string' => ':attribute không được nhỏ hơn :min ký tự.',
    ],
    'max' => [
        'file' => ':attribute không được lớn hơn :max KB.',
        'numeric' => ':attribute không được lớn hơn :max.',
        'string' => ':attribute tối đa :max ký tự.',
    ],
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'same' => ':attribute và :order không khớp nhau.',
    'unique' => ':attribute đã tồn tại.',

    'attribute' => [
        'ten_dm' => 'Tên danh mục',
        'name' => 'Tên',
        'password' => 'Mật khẩu',
        'cf_password' => 'Xác nhận mật khẩu',
        'email' => 'Email'
    ],

];
