@extends('cms.parent')

@section('title','author');

@section('main-title','Index author')

@section('sup-title','Index author')

@section('styles')

@endsection

@section('content')
<div class="row">


    <div class="col-12">
      <div class="card">

        <div class="card-header">

            <a href="{{ route('authors.create') }}" type="button" class="btn btn-outline-success">create author</a>



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
                <tr>
                    <th>ID</th>
                    <th>first_name</th>
                    <th>middel_name</th>
                    <th>last_name</th>

                    <th>phone</th>

                    <th>date_of_birthday</th>

                    <th>gender</th>

                    <th>image</th>

                    {{--  <th>password</th>  --}}

                    <th>email</th>

                    <th>setting</th>
                  </tr>
              </tr>
            </thead>
            <tbody>
                @foreach( $authors as $author )
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->user->first_name}}</td>
                    <td>{{ $author->user->middel_name}}</td>
                    <td>{{ $author->user->last_name}}</td>
                    <td>{{ $author->user->phone}}</td>
                    <td>{{ $author->user->date_of_birthday}}</td>
                    <td>{{ $author->user->gender}}</td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{asset('/storage/images/author/'. $author->user->image)}}" width="50" height="50" alt="User Image">
                    </td>

                     <td><a href="{{route('indexArtical',['id'=>$author->id])}}"
                        class="btn btn-info">({{$author->articals_count}})
                        articals/s</a> </td>

                                        {{--  <td>{{ $author->password }}</td>  --}}
                    <td>{{ $author->email}}</td>




                    <td>




                    <td>


                        <div class="btn-group">

                            <a href="{{ route('authors.edit',$author->id) }}"  type="button"  class="btn btn-success" >edit</a>
                            <a href="{{ route('authors.show',$author->id) }}"  type="button"  class="btn btn-primary" >show</a>


                            <a onclick="prefomrDestroy({{ $author->id }}, this)"  type="button"  class="btn btn-danger" >delet</a>




                            {{--  <a href="{{ route('countries.show',$author->id) }}" type="button" class="btn btn-primary">view</a>  --}}
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
        confirmDestroy('/cms/admin/authors/'+id,reference);
    }
</script>

@endsection
