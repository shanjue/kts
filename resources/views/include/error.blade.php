@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
  @endforeach
@endif

@if (session('message'))
<div class="text-center">
  <p class="alert alert-success">{{ session('message') }}</p>

</div>
@endif
