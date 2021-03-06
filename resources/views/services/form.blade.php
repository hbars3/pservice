<div class="form-group">
    <label for="title" class="control-label">{{'Título'}}</label>
    <input
        type="text"
        class="form-control {{$errors->has('title')?'is-invalid':''}}"
        name="title"
        id="title"
        value="{{isset($service->title)?$service->title:old('title')}}">
        {!! $errors->first('title','<div class="alert alert-danger alert-dismissible">:message</div>')!!}
</div>

<!-- Categoría --> 
<div class="form-group">
  <label for="type_service_id">Seleccionar categoría: </label>
  <select class="form-control" name="type_service_id" id="type_service_id">
    @foreach($type_services as $type_service)
    <option value="{{$type_service->id}}">{{$type_service->category}}</option>
    @endforeach
  </select>
</div>

<!-- Description -->
<div class="form-group">
    <label for="description" class="control-label">{{'Descripción'}}</label>
    <textarea
        class="form-control"
        name="description"
        id="description"
        rows="3">{{ isset($service->description)?$service->description:old('description') }}</textarea>
</div>


<!-- Price -->
<div class="form-group">
    <label for="price" class="control-label">{{'Precio'}}</label>
    <input
        type="double"
        class="form-control {{$errors->has('price')?'is-invalid':''}}"
        name="price"
        id="price"
        value="{{isset($service->price)?$service->price:old('price')}}">
        {!! $errors->first('price','<div class="invalid-feedback">:message</div>')!!}
</div>


<!-- Picture -->
<script>
updateFileLabelText = function() {
    var file = document.getElementById('picture_path')
    var inputLabel = document.getElementById('custom-file-label')

    inputLabel.innerHTML = file.files.item(0).name
    size = file.files.item(0).size
    if (size > 671979) {
        alert('El archivo supera el límite de tamaño permitido')
        file.value = "";
        inputLabel.innerHTML = "";
    }
}
</script>

<div class="form-group justify-content-around">
    <label for="picture_path" class="control-label">{{'Imagen'}}</label>
    <div class="input-group">
        <div class="custom-file">
            <input
                type="file"
                class="custom-file-input"
                name="picture_path"
                id="picture_path"
                accept="image/jpeg,image/png"
                onchange="javascript:updateFileLabelText()">
            </input>
        </div>
        <label id = "custom-file-label" class="custom-file-label" for="picture_path"></label>
    </div>
</div>
