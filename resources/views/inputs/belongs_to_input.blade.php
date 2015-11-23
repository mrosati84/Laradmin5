<div class="form-group">
    <label for="{{ $field_name }}">{{ $label }}</label>
    <select name="{{ $field_name }}" id="{{ $field_name }}">
        @foreach($related_rows as $related_label => $related_value)
            <option value="{{ $related_value }}" {{ ($related_value === $actual_value) ? 'selected' : '' }}>{{ $related_label }}</option>
        @endforeach
    </select>
</div>
