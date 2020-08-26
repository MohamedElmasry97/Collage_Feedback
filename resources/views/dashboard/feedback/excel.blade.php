@extends('dashboard.layouts.master')
@section('content')

<div class="col-md-8">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Feedback question Excel Sheet</h3>
      </div>
      @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
      <!-- /.card-header -->
      <form role="form" action="{{ route('feedback.store.excel') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="form-group">
            <label for="file">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="file">
                <label class="custom-file-label" for="file">Choose file</label>
              </div>
              <div class="input-group-append">
                <input type="submit" value="upload">
              </div>
            </div>
          </div>
      </form>

@endsection

@push('scripts')
<script>
    $('#file').on('change',function(){
    //get the file name
    var fileName = $(this).val().replace('C:\\fakepath\\', " ");
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
});
</script>
@endpush
