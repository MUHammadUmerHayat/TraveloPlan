@extends('layouts.app')
@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
  input[type='password'],
  input[type='email'],
  input[type='text'],
  input[type='number'] {
    background-color: #EFEFEF;
    padding: 20px;
    color: #6F6F6F;
    font-size: 15px;
  }

  input[type='date'],
  input[type='datetime-local'] {
    background-color: #EFEFEF;  
    color: #6F6F6F;
    font-size: 15px;
  }

  input[type='file'],
  #description,
  #city {
    background-color: #EFEFEF;
    color: #6F6F6F;
    font-size: 15px;
  }

  #event-card{
    font-size: 35px;
    background: #21ab64
  }

</style>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">

        <div class="card-header text-center text-white" id="event-card">Add Events</div>

        <div class="card-body">

          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif

          @if (session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif
          <form action="/Event" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group mt-4">
              <label for="title"> Title</label>
              <input class="form-control" type="text" required name="title" required>
            </div>

            <div class="form-group mt-4">
              <label for="description">Short Description</label>
              <textarea rows="4" name="description" class="form-control" id="description" required></textarea>
            </div>

            <div class="form-group mt-4">
              <label for="city">Cities</label>
              <input type="text" name="city" class="form-control" id="city" required></textarea>
            </div>

            <div class="form-group mt-4">
              <label for="Starting_date">Event Starts on</label>
              <input type="date" name="Starting_date" class="form-control" required>
            </div>

            <div class="form-group mt-4">
              <label for="End_date">Event End on</label>
              <input type="date" name="End_date" class="form-control" required>
            </div>

            <div class="form-group mt-4">
              <label>Bidding Ends on</label>
              <input type="datetime-local" name="End_Time" class="form-control" required>
            </div>

            <div class="form-group mt-4">
              <label for="max_price">Min Price</label>
              <input type="number" name="minimum_price" class="form-control" min="0" required>
            </div>

            <div class="form-group mt-4">
              <label for="minimum_price">Max Price</label>
              <input type="number" name="max_price" class="form-control" min="0" required>
            </div>

            <div class="form-group mt-4">
              <label for="detail_description">Detailed Description</label><br>
            </div><br />
            
            <div class="" id="editor" style="height:100px; width: 100%" onmouseout="a()" onkeydown="a()"></div>

            <div class="form-group mt-4">
              <label for="image">Image</label>
              <input type="file" name="filename[]" class="form-control" multiple required>
            </div>
            <input type="text" id="ab" name="detail_desc" hidden>
            <button type="submit" class="btn mt-5" style="background:#0e8e4c;color:#fff">Add Event</button>


          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script type="text/javascript">


  var toolbarOptions = [
    [{ 'size': ['small', false, 'large', 'huge'] }],
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    ['underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],              
    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
    [{ 'indent': '-1' }, { 'indent': '+1' }],         

    [{ 'color': [] }, { 'background': [] }],          
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean'] 
  ];

  var quill = new Quill('#editor', {
    modules: {
      toolbar: toolbarOptions
    },
    theme: 'snow'
  });

  function a() {
  
    document.getElementById('ab').value = quill.container.childNodes[0].innerHTML;
    console.log(quill.container.childNodes[0].innerHTML);
  
  }


</script>
@endsection