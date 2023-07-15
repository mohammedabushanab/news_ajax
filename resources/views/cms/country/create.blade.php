@extends('cms.parent')

@section('title','country');

@section('main-title','create country')

@section('sup-title','create country')

@section('styles')

@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">

      <h3 class="card-title">create country</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>

      <div class="card-body">
        <div class="form-group">
          <label for="country_name">country_name</label>
          <input type="text" class="form-control" name="country_name" id="country_name" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="code">code</label>
          <input type="text" class="form-control" name="code" id="code" placeholder="Password">
        </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" onclick="performStore()" class="btn btn-primary">Save</button>
        <a href="{{ route('countries.index') }}" type="" class="btn btn-danger">back</a>

      </div>
    </form>
  </div>


@endsection

@section('scripts')
<script>
function performStore(){
    let formData = new FormData();
    formData.append('country_name',document.getElementById('country_name').value);
    formData.append('code',document.getElementById('code').value);


    store('/cms/admin/countries' ,formData );


  }
</script>

@endsection
