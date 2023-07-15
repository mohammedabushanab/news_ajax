@extends('cms.parent')

@section('title','artical');

@section('main-title','Index artical')

@section('sup-title','Index artical')

@section('styles')

@endsection

@section('content')
<div class="row">


    <div class="col-12">
      <div class="card">

        <div class="card-header">

            <a href="{{ route('createArtical' , 'id') }}" type="button" class="btn btn-success">Add New artical</a>



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
                <th>title</th>
                <th>short_descrtion</th>
                <th>full_descrtion</th>
<th>image</th>
                <th>setting</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $articals as $artical )
                <tr>
                    <td>{{ $artical->id }}</td>
                    <td>{{ $artical->title }}</td>
                    <td>{{ $artical->short_descrption }}</td>



                    <td>{{ $artical->full_descrption }}</td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{asset('/storage/images/artical/'. $artical->image)}}" width="50" height="50" alt="User Image">
                    </td>


                    <td>


                            <div class="btn-group">

                              <a href="{{ route('articals.edit',$artical->id) }}"  type="button"  class="btn btn-success" >edit</a>
                              <a href="{{ route('articals.show',$artical->id) }}"  type="button"  class="btn btn-primary" >show</a>


                              <a onclick="prefomrDestroy({{ $artical->id }}, this)"  type="button"  class="btn btn-danger" >delet</a>




                              {{--  <a href="{{ route('countries.show',$artical->id) }}" type="button" class="btn btn-primary">view</a>  --}}
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
        confirmDestroy('/cms/admin/articals/'+id,reference);
    }
</script>

@endsection
