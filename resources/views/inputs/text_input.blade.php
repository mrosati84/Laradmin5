<div class="form-group">
    <label for="{{ $field_name }}">{{ $label }}</label>
    <input name="{{ $field_name }}" id="{{ $field_name }}" class="form-control" type="text" value="{{ $row->$field_name }}">
</div>