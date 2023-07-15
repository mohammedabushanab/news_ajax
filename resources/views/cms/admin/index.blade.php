@extends('cms.parent')

@section('title','admin');

@section('main-title','Index admin')

@section('sup-title','Index admin')

@section('styles')

@endsection

@section('content')
<div class="row">


    <div class="col-12">
      <div class="card">

        <div class="card-header">

            <a href="{{ route('admins.create') }}" type="button" class="btn btn-outline-success">create admin</a>



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
            </thead>
            <tbody>
                @foreach( $admins as $admin )
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->user->first_name}}</td>
                    <td>{{ $admin->user->middel_name}}</td>
                    <td>{{ $admin->user->last_name}}</td>
                    <td>{{ $admin->user->phone}}</td>
                    <td>{{ $admin->user->date_of_birthday}}</td>
                    <td>{{ $admin->user->gender}}</td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{asset('/storage/images/admin/'. $admin->user->image)}}" width="50" height="50" alt="User Image">
                    </td>

                    {{--  <td>{{ $admin->password }}</td>  --}}
                    <td>{{ $admin->email}}</td>









                    <td>


                        <div class="btn-group">

                            <a href="{{ route('admins.edit',$admin->id) }}"  type="button"  class="btn btn-success" >edit</a>
                            <a href="{{ route('admins.show',$admin->id) }}"  type="button"  class="btn btn-primary" >show</a>


                            <a onclick="prefomrDestroy({{ $admin->id }}, this)"  type="button"  class="btn btn-danger" >delet</a>




                            {{--  <a href="{{ route('countries.show',$admin->id) }}" type="button" class="btn btn-primary">view</a>  --}}
                          </div>



                    </td>

                  </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

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
        confirmDestroy('/cms/admin/admins/'+id,reference);
    }
</script>

@endsection
