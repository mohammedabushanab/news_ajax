@extends('cms.parent')

@section('title','category');

@section('main-title','Index category')

@section('sup-title','Index category')

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




                  <p class="text-muted text-center">{{ $countries->category_name}}</p>
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
                                <th>category name</th>
                                <th>descrption/th>

                                <th>setting</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>{{ $categories->id }}</td>
                                <td>{{ $categories->name}}</td>
                                <td>{{ $categories->descrption}}</td>
                                <td>
                                    <div class="btn-group">

                                        <a href="{{route('categories.index')}}" class="btn btn-primary btn-block"><b> index</b></a>


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
