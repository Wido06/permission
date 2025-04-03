@extends('panel.layouts.app')

@section('content')


    <div class="pagetitle">
        <h1>Role</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard" style="height:100%" ;>

        <section class="section">
            <div class="row">


                <div class="col-lg-12">
                    @include('_message')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title">Role list</h5>
                                </div>
                                <div class="col-md-6" style="text-align: right" ;>
                                    <a href="{{url('panel/role/add')}}" class="btn btn-primary" style="margin-top:10px"
                                        ;>Add</a>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <th scope="row">{{$value->id}}</th>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->created_at}}</td>
                                            <td>
                                                <a href="{{url('panel/role/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{url('panel/role/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>






                </div>


                
            </div>
        </section>
    </section>

    <!-- End #main -->
@endsection
