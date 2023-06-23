@php
    $label = $attributes['label'] ?? '';
    $name = $attributes['name'] ?? '';
    $value = $attributes['value'] ?? '';
    $type = $attributes['type'] ?? 'text';
    
    //Giữ lại giá trị cũ khi lỗi
    $old_value = old($name);
    $value = empty($old_value) ? $value : $old_value;
@endphp

<div class="mt-3">
    <label class="form-label"> {{ $label }} </label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select">
        <option value="">--Chọn một giá trị--</option>
        @foreach ($data as $item)
            @if ($selected != null && $item->$displayMember == $selected)
                {
                <option value="{{ $item->$valueMember }}" selected>{{ $item->$displayMember }}</option>
                }
            @else
                {
                <option value="{{ $item->$valueMember }}">{{ $item->$displayMember }}</option>
                }
            @endif
        @endforeach
    </select>

    @error($name)
        <span class="text-danger fts-italic">{{ $message }}</span>
    @enderror
</div>
