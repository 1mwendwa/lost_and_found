@extends('layouts.app')

@section('content')
<div class="container">
   <div class="form-container">
    <form method="post" action="{{ route('found_items.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="whats_found" class="form-label">What have you found?</label>
          <select name="whats_found" class="form-select" aria-label="Default select example" id="field1" required>
            <option value="">What have you Found</option>
            <option value="Document">Document</option>
            <option value="Keys">Keys</option>
            <option value="Other">Other</option>
          </select>

        </div>
        <div class="mb-3" id='field2div'>
            <label for="tod" class="form-label">Type of document found</label>
            <select class="form-select" name="tod" aria-label="Default select example" id="field2" required>
                <option value="">Type of document found</option>
                <option value="ID">ID</option>
                <option value="Driving licence">Driving licence</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="mb-3" id="field3div" >
          <label for="nod" class="form-label">Name on the document</label>
          <input type="text" class="form-control" name="nod" id="field3" required>
        </div>

        <div class="mb-3">
            <label for="where" class="form-label">Where did you find it</label>
            <input type="text" class="form-control" name="where" required>
        </div>

        <div class="mb-3" id="desc">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" placeholder="describe what you found" id="floatingTextarea" name="description" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <div class="input-group">
                <input type="file" name="photo" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>

<script type="text/javascript">
    window.onload = function() {
        var eSelect = document.getElementById('field1');
        var eSelect1 = document.getElementById('field2');
        var optTod = document.getElementById('field2div');
        var optNod = document.getElementById('field3div');
        var optDescription = document.getElementById('desc');
        eSelect.onchange = function() {
            if(eSelect.value === "Document") {
                optTod.style.display = 'block';
                optNod.style.display = 'block';
                optDescription.style.display = 'none';
            } else if(eSelect.value === "other") {
                optTod.style.display = 'none';
                document.getElementById("field2").removeAttribute("required");
                optNod.style.display = 'none';
                document.getElementById("field3").removeAttribute("required");
                optDescription.style.display = 'block';
                // document.getElementById("field2").removeAttribute("required");
                // document.getElementById("field3").removeAttribute("required");
            } else {
                optTod.style.display = 'none';
                document.getElementById("field2").removeAttribute("required");
                optNod.style.display = 'none';
                document.getElementById("field3").removeAttribute("required");
                optDescription.style.display = 'block';
                // document.getElementById("field2").removeAttribute("required");
                // document.getElementById("field3").removeAttribute("required");
            }
        }
        eSelect1.onchange = function() {
            if(eSelect1.value === "Other") {
                optDescription.style.display = 'block';
            } else {
                optDescription.style.display = 'none';
                document.getElementById("floatingTextarea").removeAttribute("required");
            }
        }

    }
  </script>


@endsection
