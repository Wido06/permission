@extends('panel.layouts.app')

@section('content')


    <div class="pagetitle">
        <h1>Edit User</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard" style="height:100%" ;>


        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit User</h5>


                        <form action="" method="post">
                            {{csrf_field()}}
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" value="{{$getRecord->name}}" required class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" name="email" value="{{$getRecord->email}}"  readonly required class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Password</label>
                                <div class="col-sm-12">
                                    <input type="password" name="password"  value="" class="form-control">
                                    (Do you want to change the password? Please add. Otherwise leave it.)

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Role</label>
                                <select class="form-control" id="" name="role_id" required>
                                    <option value="">Select</option>
                                    @foreach($getRole as $value)
                                        <option {{($getRecord->role_id) == $value->id ? 'selected' : ''}}value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>





                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>


        </div>



    </section>

    <!-- End #main -->
@endsection
