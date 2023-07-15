@extends('cms.parent')

@section('title','country');

@section('main-title','create country')

@section('sup-title','create country')

@section('styles')

@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">edit country</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form >


      <div class="card-body">
        <div class="form-group">
          <label for="country_name">country name</label>
          <input type="text" class="form-control" name="country_name" id="country_name" placeholder="country_name"
          value="{{ $countries->country_name}}">
        </div>
        <div class="form-group">
          <label for="code">code</label>
          <input type="text" class="form-control" name="code" id="code" placeholder="code"
          value="{{ $countries->code }}">
        </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a type="button" onclick="performUpdate({{ $countries->id }})" class="btn btn-primary" >update</a>

      </div>
    </form>
  </div>


@endsection

@section('scripts')

<script>

    function performUpdate(id){
        let formData = new FormData();
        formData.append('country_name',document.getElementById('country_name').value);
        formData.append('code',document.getElementById('code').value);
        storeRoute('/cms/admin/countries_update/'+id ,formData);
    }

</script>
@endsection
