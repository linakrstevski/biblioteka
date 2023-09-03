@extends('_layout.cork')

@section('content')
<head><style>
 body{
    margin-top: 20px;
    margin-right:20px;
  }
.left{
  margin-right: 20px;
  float: left;
};
.right {
  float: right;
}
:root {
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


</style></head>
<main>
<div class="left">
  <img src="{{$book->img}}" alt="" width="200px" height="300px">
</div>
<div class="right">
<h1>{{$book->title}}</h1>
<h1>Категорија: {{$book->kategorii->title}}</h1>

@if (count($book->pisatel) == 1)
<h2>Автор: <a href="{{route('avtor.prikazi', ['authorId' => $book->pisatel[0]->id])}}">{{$book->pisatel[0]->name}}</a></h2>
@else

<h2>Автори:</h2>
<ul>
    @foreach($book->pisatel as $pisatel)
    <li> <a href="{{route('avtor.prikazi', ['authorId' => $pisatel->id])}}">{{$pisatel->name}}</a> </li>
    @endforeach
</ul>
</div>
@endif
<br>
<br>
<br>
<br>
<br>
<br>
<br>

    <!-- modal -->
    Add<button id="modal-btn" class="button"><h4>+</h4></button>
    <form action="{{route('rentBook.create', ['knigaId' => $book->id])}}" method="POST">
    @csrf
    <div id="my-modal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h4>Корисници</h4>
        </div>
        <div class="modal-body">
          
        <div class="faq-layouting layout-spacing">
<div class="kb-widget-section">

    <div class="row justify-content-center">
    @foreach($users as $user)
        

        <div class="col-xxl-2 col-xl-3 col-lg-3 mb-lg-0 col-md-6 mb-3">
        
           
                <div class="card-body">
                <a href="{{ route('korisnik.prikazi', ['userId' => $user->id])}}">
                <div class="card-icon mb-4">
                            <img alt="avatar" src="https://0.gravatar.com/avatar/{{ md5($user->email) }}" class="rounded-circle" />
                    </div>
                       <p class='card-title mb-0'>{{$user->name}} {{$user->surname}}</p></a>
                       
                     <input name="user[]" value="{{$user->id}}" type="checkbox"/>  
                     
                   
                
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
 <div class="table-responsive">
    <table class="table table-hover table-striped table-bordered">
        <thead>
        
            <tr>
                <th class="checkbox-area" scope="col">
                    <div class="form-check form-check-primary">
                        <input class="form-check-input" id="custom_mixed_parent_all" type="checkbox">
                    </div>
                </th>
                <th scope="col">Име и презиме</th>
                <th scope="col">Email</th>
                <th scope="col">Датум на изнајмување</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($rent as $user)
   

            <tr>
                <td>
                    <div class="form-check form-check-primary">
                        <input class="form-check-input custom_mixed_child" type="checkbox">
                    </div>
                </td>
                <td>
                    <div class="media">
                        <div class="avatar me-2">
                            <img alt="avatar" src="https://0.gravatar.com/avatar/{{ md5($user->email) }}" class="rounded-circle" />
                        </div>
                        <div class="media-body align-self-center">

                            <h6 class="mb-0">{{$user->name}} {{$user->surname}}</h6>
                           
                        </div>
                    </div>
                </td>
                <td>
                <p>{{$user->email}}</p>
                </td>
                <td>
                    <p class="mb-0">{{$user->created_at}}</p>
                </td>
                <td class="text-center">
                    <span class="badge badge-light-success">Online</span>
                </td>
                <td class="text-center">
                    <div class="action-btns"
                     class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                      
                        <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>
                        <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
       
            

            
        </tbody>
    </table>
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
