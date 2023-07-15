@extends('cms.parent')

@section('title','category');

@section('main-title','create category')

@section('sup-title','create category')

@section('styles')

@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">edit category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form >


      <div class="card-body">
        <div class="form-group">
            {{--  <div class="form-group col-md-12">
                <label for="country_id">country</label>
                <select class="form-control select2" name="country_id"   id="country_id" style="width: 100%;" aria-label=".form-select-sm example">
                  @foreach ($countries as $country)
                   <option value="{{ $country->id}}">{{ $country->country_name}}</option>

                  @endforeach
                </select>
</div>  --}}
<label for="name">category_name</label>
<input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ $categories->name }}">

</div>
<div class="form-group">
<label for="descrption">descrtion</label>
<textarea type="text" class="form-control" name="descrption" id="descrption" placeholder="descrption" >
    {{ $categories->descrption }}
</textarea>
</div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a type="button" onclick="performUpdate({{ $categories->id }})" class="btn btn-primary" >update</a>

      </div>
    </form>
  </div>


@endsection

@section('scripts')

<script>

    function performUpdate(id){
        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('descrption',document.getElementById('descrption').value);
        storeRoute('/cms/admin/categories_update/'+id ,formData);
    }

</script>
@endsection
