@extends('cms.parent')

@section('title','city');

@section('main-title','Index city')

@section('sup-title','Index city')

@section('styles')

@endsection

@section('content')
<div class="row">


    <div class="col-12">
      <div class="card">

        <div class="card-header">

            <a href="{{ route('cities.create') }}" type="button" class="btn btn-outline-success">create city</a>



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
                <th>city_name</th>
                <th>street</th>
                <th>setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $cities as $city )
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->city_name }}</td>
                    <td>{{ $city->street }}</td>



                    <td>


                            <div class="btn-group">

                              <a href="{{ route('cities.edit',$city->id) }}"  type="button"  class="btn btn-success" >edit</a>
                              <a href="{{ route('cities.show',$city->id) }}"  type="button"  class="btn btn-primary" >show</a>


                              <a onclick="prefomrDestroy({{ $city->id }}, this)"  type="button"  class="btn btn-danger" >delet</a>




                              {{--  <a href="{{ route('countries.show',$city->id) }}" type="button" class="btn btn-primary">view</a>  --}}
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
        confirmDestroy('/cms/admin/cities/'+id,reference);
    }
</script>

@endsection
