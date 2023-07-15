@extends('cms.parent')

@section('title','admin');

@section('main-title','Index admin')

@section('sup-title','Index admin')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container">
        <div class="row show">
            <div class="card card-primary card-outline col-12">
                <div class="card-body box-profile ">
                  <div class="text-center ">


                                      </div>

                  {{--  <h3 class="profile-username text-center">{{ $countries->id }}</h3>




                  <p class="text-muted text-center">{{ $countries->admin_name}}</p>
                  <p class="text-muted text-center">{{ $countries->code}}</p>  --}}


                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">


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
                                <th>email</th>
                                <th>setting</th>


                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>{{ $admins->id }}</td>
                                <td>{{ $admins->user->first_name}}</td>
                                <td>{{ $admins->user->middel_name}}</td>
                                <td>{{ $admins->user->last_name}}</td>
                                <td>{{ $admins->user->phone}}</td>
                                <td>{{ $admins->user->date_of_birthday}}</td>
                                <td>{{ $admins->user->gender}}</td>
                                <td>{{ $admins->user->image}}</td>
                                {{--  <td>{{ $admin->password }}</td>  --}}
                                <td>{{ $admins->email}}</td>
                                <td>
                                    <div class="btn-group">

                                        <a href="{{route('admins.index')}}" class="btn btn-primary btn-block"><b> index</b></a>


                                </td>

                              </tr>



                            </tbody>

                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')

@endsection
