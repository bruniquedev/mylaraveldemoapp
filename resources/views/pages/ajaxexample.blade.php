
@extends('layouts.app') <!--The reason for this is because we this particular layout to belong to views -> layouts -> app.blade.php-->

@section('content') 
<!--paramater is passed from pageControllers under index function
is recieved and outputted like as $title in doubled braces
-->
<h1>laravel ajax Crud example </h1>
<p>This is a laravel ajax Crud example </p>
<button type="button" name="ProfileUpdate" class="btn btn-primary btn-lg">Let's get started</button>





    <div class="d-flex bd-highlight mb-4">
        <div class="p-2 w-100 bd-highlight">
            <h2>Laravel AJAX Example</h2>
        </div>
        <div class="p-2 flex-shrink-0 bd-highlight">
            <button class="btn btn-success" id="btn-add">
                Add Todo
            </button>
        </div>
    </div>

    <div>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody id="todos-list" name="todos-list">
                @foreach ($todo as $data)
                <tr id="todo{{$data->id}}">
                    <td>{{$data->id}}</td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="formModal" role="dialog" aria-labelledby="formModalLabel"
        aria-hidden="true" tabindex="-1"
         data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="formModalLabel">Create Todo</h4>
                        <button type="button" class="close Closetaskbtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" name="myForm" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter title" value="">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="Enter Description" value="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger Closetaskbtn" id="Closetaskbtn" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                        </button>
                        <input type="hidden" id="todo_id" name="todo_id" value="0">
                    </div>
                </div>
            </div>
        </div>

    </div>






@endsection
<!--code above is for templating-->
