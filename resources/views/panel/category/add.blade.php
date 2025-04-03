@extends('panel.layouts.app')

@section('content')


    <div class="pagetitle">
        <h1>Add New Category</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard" style="height:100%" ;>


        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Category</h5>


                        <form action="" method="post">
                            {{csrf_field()}}
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" required class="form-control">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-12 col-form-label">Description</label>
                                <div class="col-sm-12">
                                   <textarea name="description" id="description" class="form-control"></textarea>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
