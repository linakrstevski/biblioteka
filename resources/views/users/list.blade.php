@extends('_layout.cork')

@section('content')

<h1>Листа на корисници:</h1>


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
                <th scope="col">Изнајмена книга</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
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
                            <h6 class="mb-0"><a href="{{ route('korisnik.prikazi', ['userId' => $user->id])}}">{{$user->name}} {{$user->surname}}</a></h6>
                           
                        </div>
                    </div>
                </td>
                <td>
                <p>{{$user->email}}</p>
                </td>
                <td>
                    <p class="mb-0">kniga</p>
                </td>
                <td class="text-center">
                    <span class="badge badge-light-success">Online</span>
                </td>
                <td class="text-center">
                    <div class="action-btns">
                    <a href="{{ route('korisnik.prikazi', ['userId' => $user->id])}}" class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </a>
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
@endsection