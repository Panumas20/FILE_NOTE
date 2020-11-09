@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Note</div>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                        Open Modal
                    </button>
                    <a href="{{route('note.create')}}" class="btn btn-info">สร้าง</a>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <form action="{{route('note.store')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="topic">Topic</label>
                                            <input type="text" class="form-control" name="topic" id="topic">
                                        </div>
                                        <div class="form-group">
                                            <label for="detial">Detial</label>
                                            <textarea name="detial" class="form-control" name="detial" id="detial"
                                                rows="30" cols="80">
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="form-control" data-dismiss="modal">Save</button>
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection