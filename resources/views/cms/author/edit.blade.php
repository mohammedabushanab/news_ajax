@extends('cms.parent')

@section('title','author');

@section('main-title','create author')

@section('sup-title','create author')

@section('styles')

@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">edit author</h3>
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
<div class="form-group col-md-4">
    <label for="gender">Gender </label>
    <select class="form-control" name="gender" style="width: 100%;"
        id="gender" aria-label=".form-select-sm example">
            <option value="" >Chosse Gender</option>
            <option value="male" >Male</option>
            <option value="female" >FeMale</option>

    </select>
</div>


          <label for="first_name">first_name</label>
          <input value="{{ $authors->user->first_name}}" type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="middel_name">middel_name</label>
          <input value="{{ $authors->user->middel_name}}" type="text" class="form-control" name="middel_name" id="middel_name" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="last_name">last_name</label>
            <input value="{{ $authors->user->middel_name}}" type="text" class="form-control" name="last_name" id="last_name" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="email">email</label>
            <input value="{{ $authors->email}}" type="email" class="form-control" name="email" id="email" placeholder="Password">
          </div>

          <div class="form-group">
            <label for="phone">phone</label>
            <input value="{{ $authors->user->phone}}" type="number" class="form-control" name="phone" id="phone" placeholder="Password">
          </div>



          <div class="row">
            <div class="form-group col-md-4">
           <label for="date_of_birthday"> Date of Birth</label>
           <input value="{{ $authors->user->date_of_birthday}}" type="date" class="form-control" name="date_of_birthday" id="date_of_birthday" placeholder="Enter First Date of birth">
         </div>



         <div class="row">
            <div class="form-group col-md-12">
             <label for="image">Image of Admin</label>
             <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image of Admin">
           </div>
           </div>

      </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a type="button" onclick="performUpdate({{ $authors->id }})" class="btn btn-primary" >update</a>

      </div>
    </form>
  </div>


@endsection

@section('scripts')

<script>

    function performUpdate(id){
        let formData = new FormData();
        formData.append('first_name',document.getElementById('first_name').value);
    formData.append('middel_name',document.getElementById('middel_name').value);
    formData.append('last_name',document.getElementById('last_name').value);
    formData.append('phone',document.getElementById('phone').value);
    formData.append('email',document.getElementById('email').value);
    {{--  formData.append('password',document.getElementById('password').value);  --}}

    formData.append('gender',document.getElementById('gender').value);
    formData.append('date_of_birthday',document.getElementById('date_of_birthday').value);
    formData.append('image',document.getElementById('image').files[0]);
    formData.append('country_id',document.getElementById('country_id').value);

    storeRoute('/cms/admin/authors_update/'+id ,formData);

    }

</script>
@endsection
