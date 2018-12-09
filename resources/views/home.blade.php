@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @include('inc.messages')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button
                        class="btn btn-primary"  
                        data-toggle="modal" 
                        data-target="#addModal"  
                        type="button" 
                        name="button">
                            Add Bookmark
                    </button>
                    <br>
                    <hr>
                    <h2>My Bookmarks</h2>
                    <ul class="list-group">
                        @foreach($bookmarks as $bookmark)
                            <li class="list-group-item">
                                <h3>{{$bookmark->name}}</h3>
                                <p>{{$bookmark->description}}</p>
                                <a href="delete/{{ $bookmark->id }}" onclick="return confirm('Are you sure you want to delete this data ?')">delete</a>               
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Bookmark</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('bookmarks.store') }}" method="post">
            {{csrf_field()}}
            <div class="form-group">
               <label>Bookmark Name</label>
               <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Bookmark URL</label>
                <input type="text" class="form-control" name="url">
             </div>
             <div class="form-group">
                <label>Website Description</label>
                <textarea class="form-control" name="description"></textarea>
             </div>
             <div class="modal-footer">
                <input type="submit" name="submit" value="submit" class="btn btn-success">
              </div>
             
          </form>
        </div>
        
      </div>
    </div>
  </div>

@endsection
