@extends('layouts.app')

@section('content')
@php
session_start();
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Note
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#create"
                            style="float: right;">
                            สร้าง Note
                        </button>
                    </h1>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!------------------------------------------------------ table-->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Topic</th>
                                <th>Open</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($note as $read_note)
                            <tr>
                                <td>{{$read_note['topic']}} </td>
                                <td>
                                    <button type="button" class="btn btn-info " data-toggle="modal"
                                        data-target="#{{$read_note['topic']}}">ดู
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning " data-toggle="modal"
                                        data-target="#edit">แก้ไข
                                    </button>

                                    <!--<a href="{{route('note.edit',$read_note->id)}}" class="btn btn-warning">แก้ไข</a>-->
                                </td>

                            </tr>
                            <!---------------------------------------------------- Modal Open-->
                            <div class="modal fade" id="{{$read_note['topic']}}" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h3 class="modal-title">{{$read_note['topic']}}</h3>
                                        </div>
                                        <form action="/note" method="post">
                                            {{csrf_field()}}
                                            <div class="modal-body">
                                                <div>
                                                    <label for="detail"></label>
                                                    <textarea name="detail" id="detail" rows="30" cols="78"
                                                        style="resize: none;">


                                                    {{$read_note->detail}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!---------------------------------------------------- Modal Open-->

                            @endforeach
                        </tbody>
                    </table>
                    <!------------------------------------------------------ table-->
                    <!---------------------------------------------------- Modal Create-->
                    <div class="modal fade" id="create" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">สร้าง Note</h4>
                                </div>
                                <form action="/note" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div>
                                            <label for="topic">Topic</label>
                                            <input type="text" name="topic" id="topic">
                                        </div>
                                        <div>
                                            <label for="detail">Detail</label>
                                            <textarea name="detail" id="detail" rows="30" cols="78"
                                                style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-success" value="บันทึก">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!---------------------------------------------------- Modal Create-->
                    <!---------------------------------------------------- Modal Edit-->
                    <div class="modal fade" id="edit" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">แก้ไข Note</h4>
                                </div>
                                <form action="{{route('note.update','test')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <div>
                                            @include('note-form')
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-success" value="บันทึก">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!---------------------------------------------------- Modal Edit-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection