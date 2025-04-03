@extends('panel.layouts.app')

@section('content')


    <div class="pagetitle">
        <h1>Add New Role</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard" style="height:100%" ;>


        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Role</h5>


                        <form action="" method="post">
                            {{csrf_field()}}
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" required class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label style="display: block; margin-bottom: 20px;" for="inputText" class="col-sm-12 col-form-label"><b>Permission</b></label>

                                @foreach ($getPermission as $value)
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-3">
                                            {{$value['name']}}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex flex-wrap">
                                                @foreach ($value['group'] as $group)
                                                    <div class="mr-3 mb-3" style="margin-right: 15px;"> <!-- Ajuster l'espace horizontal ici -->
                                                        <label>
                                                            <input type="checkbox" value="{{$group['id']}}" name="permission_id[]">
                                                            {{$group['name']}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                            </div>







                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>




        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Country</h5>


                        <form action="" method="post">
                            {{csrf_field()}}
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" required class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label style="display: block; margin-bottom: 20px;" for="inputText" class="col-sm-12 col-form-label"><b>Permission</b></label>

                                @foreach ($getPermission as $value)
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-3">
                                            {{$value['name']}}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex flex-wrap">
                                                @foreach ($value['group'] as $group)
                                                    <div class="mr-3 mb-3" style="margin-right: 15px;"> <!-- Ajuster l'espace horizontal ici -->
                                                        <label>
                                                            <input type="checkbox" value="{{$group['id']}}" name="permission_id[]">
                                                            {{$group['name']}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                            </div>







                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>



    </section>

    <!-- End #main -->
@endsection
