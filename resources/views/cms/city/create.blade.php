@extends('cms.parent')

@section('title','city');

@section('main-title','create city')

@section('sup-title','create city')

@section('styles')

@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">

      <h3 class="card-title">create city</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>

      <div class="card-body">
        <div class="form-group">
            <div class="form-group col-md-12">
                <label for="country_id">country</label>
                <select class="form-control select2" name="country_id"   id="country_id" style="width: 100%;" aria-label=".form-select-sm example">
                  @foreach ($countries as $country)
                   <option value="{{ $country->id}}">{{ $country->country_name}}</option>

                  @endforeach
                </select>
</div>
          <label for="city_name">city_name</label>
          <input type="text" class="form-control" name="city_name" id="city_name" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="street">code</label>
          <input type="text" class="form-control" name="street" id="street" placeholder="Password">
        </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" onclick="performStore()" class="btn btn-primary">Save</button>
        <a href="{{ route('cities.index') }}" type="" class="btn btn-danger">back</a>

      </div>
    </form>
  </div>


@endsection

@section('scripts')
<script>
function performStore(){
    let formData = new FormData();
    formData.append('city_name',document.getElementById('city_name').value);
    formData.append('street',document.getElementById('street').value);
    formData.append('country_id',document.getElementById('country_id').value);


    store('/cms/admin/cities' ,formData );


  }
</script>

@endsection
