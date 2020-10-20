<div class="form-group">
    <label for="Name" class="control-label">{{ 'Name' }}</label>
    <input type="text" class="form-control {{ $errors->has('Name')?'is-invalid':'' }}" name="Name" id="Name"
     value="{{ isset($book->Name) ? $book->Name :old('Name')}}">
    {!! $errors->first('Name', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="Author" class="control-label">{{ 'Author' }}</label>
    <input class="form-control {{ $errors->has('Author')?'is-invalid':'' }}" name="Author" type="text" id="Author"
    value="{{ isset($book->Author) ? $book->Author :old('Author')}}"></input>
    {!! $errors->first('Author', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="Category" class="control-label">{{ 'Category' }}</label>
    <select name="Category" class="form-control {{ $errors->has('Category')?'is-invalid':'' }}" id="Category" >
        @if ($category == null)
            <option value="">Sin Categorias</option>
        @else
            <option value="">Seleccione Categoria</option>
        @endif
    @foreach ($category as $optionKey => $optionValue)
        <option value="{{ $optionValue->Name }}" {{ (isset($book->Category) && $book->Category == $optionKey) ? 'selected' : ''}}>{{ $optionValue->Name }}</option>
    @endforeach
</select>
    {!! $errors->first('Category', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="Pub_Day" class="control-label">{{ 'Pub Day' }}</label>
    <input class="form-control {{ $errors->has('Pub_Day')?'is-invalid':'' }}" name="Pub_Day" type="date" id="Pub_Day" value="{{ isset($book->Pub_Day) ? $book->Pub_Day :old('Pub_Day')}}" >
    {!! $errors->first('Pub_Day', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="Status" class="control-label">{{ 'Status' }}</label>
    <select name="Status" class="form-control" id="Status" >
    @foreach (json_decode('{"Available": "available", "NotAvailable": "notavailable"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($book->Status) && $book->Status == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
