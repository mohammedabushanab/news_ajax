@extends('cms.parent')

@section('title','author');

@section('main-title','Index author')

@section('sup-title','Index author')

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
                                <td>{{ $authors->id }}</td>
                                <td>{{ $authors->user->first_name}}</td>
                                <td>{{ $authors->user->middel_name}}</td>
                                <td>{{ $authors->user->last_name}}</td>
                                <td>{{ $authors->user->phone}}</td>
                                <td>{{ $authors->user->date_of_birthday}}</td>
                                <td>{{ $authors->user->gender}}</td>
                                <td>
                                    <img class="img-circle img-bordered-sm" src="{{asset('/storage/images/author/'. $authors->user->image)}}" width="50" height="50" alt="User Image">
                                </td>
                                                                {{--  <td>{{ $author->password }}</td>  --}}
                                <td>{{ $authors->email}}</td>
                                <td>
                                    <div class="btn-group">

                                        <a href="{{route('authors.index')}}" class="btn btn-primary btn-block"><b> index</b></a>


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
