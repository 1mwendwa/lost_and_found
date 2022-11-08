@extends('layouts.app')
@section('content')

<div class="container-fluid d-flex flex-column justify-space-between ">

    <div class="card offset-md-4 col-md-4" style="align-text:center;">
        <div class="card-body">

            <div class="card flex-fill">
                <div class="card-header">
                    <h3 class="fw-bold">found item</h3>
                </div>
                <img src="{{ asset('images/' . $founditem->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title fw-bolder" id="p1">Item found</h5>
                    <p class="card-text" id="p2">{{ $founditem->whats_found}} </p>
                    <h5 class="card-title fw-bolder" id="p1">type of document</h5>
                    <p class="card-text" id="p2">{{ $founditem->tod}} </p>
                    <h5 class="card-title fw-bolder" style="color: #030358"  id="p1">Name on the document</h5>
                    <p class="card-text" id="p3">{{ $founditem->nod}} </p>
                    <h5 class="card-title fw-bolder" style="color: #030358" id="p1">Item description</h5>
                    <p class="card-text" id="p4">
                        @if ($founditem->description == null)
                            N/A
                        @else
                        {{ $founditem->description}}
                        @endif
                    </p>
                    <dl class="dl-horizontal ml-3">
                        <dt>Created at:</dt>
                        <dd>{{ date('jS M, Y g:ia', strtotime($founditem->updated_at)) }}</dd>
                    </dl>

                    @if ($founditem->status == 0)
                <a href="{{ url('change_status/'.$founditem->id) }}" class="btn btn-primary" onclick="myFunction()">Claim it </a>


            @else
                <a href="#" class="btn btn-success">claimed </a>


            @endif
                </div>
            </div>



            {{-- <div id="myDIV" style=" display:none; ">
                <p>text the finder on whatsapp!</p>
                <p>
                    <ul>
                        <li> <a href="https://wa.me/{{ $founditem->user->wNo }}?text=you found someting that belongs to me. would you mind discussing how i can get it." target="_blank" rel="noopener noreferrer">
                            <svg style="color: rgb(20, 206, 20); line-height: 5px; " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                          </svg> <span>Whatsapp</span></a> </li>
                        <li>
                            <a href="tel:{{ $founditem->user->wNo }}" target="_blank" rel="noopener noreferrer">
                                <svg style="color: blue; line-height: 5px; " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                  </svg> <span>call</span>
                            </a>
                        </li>
                    </ul>
                </p>
                {{-- <p>
                    <svg style="color: rgb(20, 206, 20); " xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                  </svg>
                </p>
            </div> --}}
        </div>

{{-- <script>
    function myFunction() {
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script> --}}

    <script>
         function myFunction() {
            var locs = ['https://wa.me/{{ $founditem->user->wNo }}?text=you found someting that belongs to me. would you mind discussing how i can get it.']

            for (let i = 0; i < locs.length; i++) {
				window.open(locs[i])}
         }
    </script>

@endsection

