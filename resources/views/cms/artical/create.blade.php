@extends('cms.parent')

@section('title','artical');

@section('main-title','create artical')

@section('sup-title','create artical')

@section('styles')

@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">

      <h3 class="card-title">create artical</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>

      <div class="card-body">
        <div class="form-group">
            <input type="text" name="author_id" id="author_id" value="{{$id}}"
            class="form-control form-control-solid" hidden/>

        <div class="form-group col-md-12">
                <label for="category_id">category</label>
                <select class="form-control select2" name="category_id"   id="category_id" style="width: 100%;" aria-label=".form-select-sm example">
                  @foreach ($categoires as $category)
                   <option value="{{ $category->id}}">{{ $category->name}}</option>

                  @endforeach
                </select>
</div>

<div class="form-group col-md-12">
    <label for="author->id">author</label>
    <select class="form-control select2" name="author_id"   id="author_id" style="width: 100%;" aria-label=".form-select-sm example">
      @foreach ($authors as $author)
       <option value="{{ $author->id}}">{{ $author->user->first_name}}</option>

      @endforeach
    </select>
</div>

          <label for="title">artical_name</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
          <label for="short_descrption">short_descrption</label>
          <textarea type="text" class="form-control" name="short_descrption" id="short_descrption" placeholder="short_descrption">
          </textarea>
        </div>

        <div class="form-group">
            <label for="full_descrption">full_descrption</label>
            <textarea type="text" class="form-control" name="full_descrption" id="full_descrption" placeholder="full_descrption">
            </textarea>
          </div>

          <div class="form-group col-md-12">
            <label for="image">Image of artical</label>
            <input type="file" class="form-control" name="image" id="image" placeholder="Enter Image of Admin">
          </div>
      </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="button" onclick="performStore()" class="btn btn-primary">Save</button>
        <a href="{{ route('articals.index') }}" type="" class="btn btn-danger">back</a>

      </div>
    </form>
  </div>


@endsection

@section('scripts')
<script>
function performStore(){
    let formData = new FormData();
    formData.append('title',document.getElementById('title').value);
    formData.append('short_descrption',document.getElementById('short_descrption').value);
    formData.append('full_descrption',document.getElementById('full_descrption').value);
    formData.append('author_id',document.getElementById('author_id').value);
    formData.append('category_id',document.getElementById('category_id').value);
    formData.append('image',document.getElementById('image').files[0]);

    {{--  formData.append('country_id',document.getElementById('country_id').value);  --}}


    store('/cms/admin/articals' ,formData );


  }
</script>

@endsection
