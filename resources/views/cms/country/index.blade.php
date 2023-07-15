@extends('cms.parent')

@section('title','country');

@section('main-title','Index country')

@section('sup-title','Index country')

@section('styles')

@endsection

@section('content')
<div class="row">


    <div class="col-12">
      <div class="card">

        <div class="card-header">

            <a href="{{ route('countries.create') }}" type="button" class="btn btn-outline-success">create country</a>



          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>country_name</th>
                <th>code</th>
                <th>setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $countries as $country )
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->country_name }}</td>
                    <td>{{ $country->code }}</td>



                    <td>


                            <div class="btn-group">

                              <a href="{{ route('countries.edit',$country->id) }}"  type="button"  class="btn btn-success" >edit</a>
                              <a href="{{ route('countries.show',$country->id) }}"  type="button"  class="btn btn-primary" >show</a>


                              <a onclick="prefomrDestroy({{ $country->id }}, this)"  type="button"  class="btn btn-danger" >delet</a>




                              {{--  <a href="{{ route('countries.show',$country->id) }}" type="button" class="btn btn-primary">view</a>  --}}
                            </div>


                    </td>

                  </tr>

                @endforeach



            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>

      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

<script>

    function prefomrDestroy(id ,reference){
        confirmDestroy('/cms/admin/countries/'+id,reference);
    }
</script>

@endsection
