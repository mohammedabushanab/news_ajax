@extends('cms.parent')

@section('title','city');

@section('main-title','create city')

@section('sup-title','create city')

@section('styles')

@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">edit city</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form >


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
          <label for="city_name">city name</label>
          <input type="text" class="form-control" name="city_name" id="city_name" placeholder="city_name"
          value="{{ $cities->city_name}}">
        </div>
        <div class="form-group">
          <label for="street">street</label>
          <input type="text" class="form-control" name="street" id="street" placeholder="code"
          value="{{ $cities->street }}">
        </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a type="button" onclick="performUpdate({{ $cities->id }})" class="btn btn-primary" >update</a>

      </div>
    </form>
  </div>


@endsection

@section('scripts')

<script>

    function performUpdate(id){
        let formData = new FormData();
        formData.append('city_name',document.getElementById('city_name').value);
        formData.append('country_id',document.getElementById('country_id').value);
        formData.append('street',document.getElementById('street').value);
        storeRoute('/cms/admin/cities_update/'+id ,formData);
    }

</script>
@endsection
