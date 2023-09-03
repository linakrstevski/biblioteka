@extends('_layout.cork')


@section('content')


  <style>:root {
  --modal-duration: 1s;
  --modal-color: #1b1a21;
}


.button {
  background: none;
  padding: 1em 2em;
  color: #fff;
  border: 0;
  border-radius: 5px;
  cursor: pointer;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  overflow: auto;
  background-color: none
}

.modal-content {
  margin: 10% auto;
  width: 50%;
  box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 7px 20px 0 rgba(0, 0, 0, 0.17);
  animation-name: modalopen;
  animation-duration: var(--modal-duration);
}

.modal-header h2,
.modal-footer h3 {
  margin: 0;
}

.modal-header {
  background: none;
  padding: 15px;
  color: none;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.modal-body {
  padding: 10px 20px;

}

.modal-footer {
  background: none;
  padding: 10px;
  color: none;
  text-align: center;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

.close {
  color: #ccc;
  float: right;
  font-size: 30px;
  color: #fff;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

@keyframes modalopen {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
</style>
    <br>
    <!-- opis na user -->
    <div class="media">
                        <div class="avatar me-2">
                            <img alt="avatar" src="https://0.gravatar.com/avatar/{{ md5($users->email) }}" width="50px" height="70px" class="rounded-circle" />
                        </div>
                        <div class="media-body align-self-center">
                           <h2>{{$users->name}} {{$users->surname}}</h2>
                           
                        </div>
                    </div>

    
    <!-- modal -->
    Add<button id="modal-btn" class="button"><h4>+</h4></button>
    <form action="{{route('rent.create', ['userId' => $users->id])}}" method="POST">
    @csrf
    <div id="my-modal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h4>Mоментално слободни книги</h4>
        </div>
        <div class="modal-body">
          
        <div class="faq-layouting layout-spacing">
<div class="kb-widget-section">

    <div class="row justify-content-center">
    @foreach($books as $book)
        

        <div class="col-xxl-2 col-xl-3 col-lg-3 mb-lg-0 col-md-6 mb-3">
        
           
                <div class="card-body">
                <a href="{{ route('kniga.prikazi', ['bookId' => $book->id])}}">
                <div class="card-icon mb-4">
                    <img src="{{ $book->img}}" alt="" width="50px" height="70px">
                    </div>
                       <p class='card-title mb-0'>{{$book->title}}</p></a>
                       
                     <input name="book[]" value="{{$book->id}}" type="checkbox"/>  
                     
                   
                
            </div>
        </div>
        @endforeach
        </div>
            </div>
            </div>
            
    </div>

    <button type="submit" class="button">Додај</button>

        </div>
        
      </div>
     

    

</form>
      <div class="table-responsive">
    <table class="table table-hover table-striped table-bordered">
        <thead>
        
            <tr>
                <th class="checkbox-area" scope="col">
                    <div class="form-check form-check-primary">
                        <input class="form-check-input" id="custom_mixed_parent_all" type="checkbox">
                    </div>
                </th>
                <th scope="col">Наслов</th>
                <th scope="col">ISBN</th>
                <th scope="col">Изнајмена на</th>
                <th scope="col">Вратена на</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col"></th>
            </tr>
        </thead>
        <tbody>


        @foreach($rent as $kniga)
            <tr>
                <td>
                    <div class="form-check form-check-primary">
                        <input class="form-check-input custom_mixed_child" type="checkbox">
                    </div>
                </td>
                <td>
                    <div class="media">
                        <div class="avatar me-2">
                            <img alt="avatar" src="{{ $kniga->img}}" width="50px" height="70px" class="rounded-circle" />
                        </div>
                        <div class="media-body align-self-center">
                           <a href="{{ route('kniga.prikazi', ['bookId' => $book->id])}}"><p class="mb-0">{{$kniga->title}}</p></a>
                           
                        </div>
                    </div>
                </td>
                <td>
                <p class="mb-0">00000</p>
                </td>
                <td>
                    <p class="mb-0">{{$kniga->created_at}}</p>
                </td>
                <td>
                    <p class="mb-0">{{$kniga->return_date}}</p>
                </td>
                
                <td class="text-center">
                @if (is_null($kniga->return_date)) 
                  <span class="badge badge-light-success">Изнајмена</span>
                 @else 
                  <span class="badge badge-light-danger">Вратена</span>

             
             @endif
                </td>

                <td class="text-center">
                @if (is_null($kniga->return_date)) 
                <a href="{{route('rent.update', ['rentId' => $kniga->rent_id])}}" title="Врати книга">
                        <p class="mb-0">Врати</p>
                        </a>
                        @else 
                       <p></p>
                        @endif
                </td>
            </tr>
           
            @endforeach
       
            

            
        
        
          </tbody>
    </table>
</div>
    </div>
    
 
   



<script>// Get DOM Elements
const modal = document.querySelector('#my-modal');
const modalBtn = document.querySelector('#modal-btn');
const closeBtn = document.querySelector('.close');

// Events
modalBtn.addEventListener('click', openModal);
closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', outsideClick);

// Open
function openModal() {
  modal.style.display = 'block';
}

// Close
function closeModal() {
  modal.style.display = 'none';
}

// Close If Outside Click
function outsideClick(e) {
  if (e.target == modal) {
    modal.style.display = 'none';
  }
}
</script>


@endsection