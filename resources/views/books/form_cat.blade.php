<div class="form-group">
    <label for="Name" class="control-label">{{ 'Name' }}</label>
    <input type="text" class="form-control {{ $errors->has('Name')?'is-invalid':'' }}" name="Name" id="Name"
     value="{{ isset($cat->Name) ? $cat->Name :old('Name')}}"></input>
    {!! $errors->first('Name', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="Description" class="control-label">{{ 'Description' }}</label>
    <input class="form-control {{ $errors->has('Description')?'is-invalid':'' }}" name="Description" type="text" id="Description"
    value="{{ isset($cat->Description) ? $cat->Description : old('Description')}}"></input>
    {!! $errors->first('Description', '<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
