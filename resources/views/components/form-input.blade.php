<input 
    type="{{ $type }}" 
    name="{{ $name }}" 
    id="{{ $id }}" 
    placeholder="{{ $placeholder }}" 
    class="form-control {{ $class }}" 
    {{ $required ? 'required' : '' }}>
