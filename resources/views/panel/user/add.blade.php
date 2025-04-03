@extends('panel.layouts.app')

@section('content')




    <div class="pagetitle">
        <h1>Add New User</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard" style="height:100%" ;>


        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New User</h5>


                        <form action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                          

                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" value="{{ old('name') }}" required class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" name="email" value="{{ old('email') }}" required class="form-control">
                                    <div style="color: red;">{{ $errors->first('email') }}</div>
                                </div>
                            </div>


                           


                            @livewire('select-country-city')





                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Password</label>
                                <div class="col-sm-12">
                                    <input type="password" name="password" class="form-control">
                                    <div style="color: red;">{{ $errors->first('password') }}</div>
                                </div>
                            </div>


                             <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Role</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="role_id" id="roleSelect" required>
                                        <option value="">Select</option>
                                         @foreach($getRole as $value)
                                            <option value="{{ $value->id }}" {{ old('role_id') == $value->id ? 'selected' : '' }}>
                                                {{ $value->name }}
                                            </option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div> 






                            {{-- <div class="row mb-3">
                                <div class="col-sm-12">
                                    <input type="button" class="btn btn-dark" value="Ajouter une nouvelle option" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                </div>
                            </div> --}}


                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Sexe</label>
                                <div class="col-sm-12">
                                    <label for="feminin">Féminin</label>
                                    <input type="radio" name="sexe" id="feminin" value="Féminin"
                                           {{ old('sexe') == 'feminin' ? 'checked' : '' }} required>

                                    <label for="masculin">Masculin</label>
                                    <input type="radio" name="sexe" id="masculin" value="Masculin"
                                           {{ old('sexe') == 'masculin' ? 'checked' : '' }} required>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label">Image</label>
                                <div class="col-sm-12">
                                    <input type="file" name="file" class="form-control" accept=".pdf,.png,.jpg,.jpeg">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" wire:click="save">Submit</button>
                                </div>
                            </div>
                        </form>


                    @if (session()->has('message'))
                        <div style="color: green;">
                            {{ session('message') }}
                        </div>
                    @endif


                    </div>
                </div>

            </div>


        </div>



    </section>

    <!-- End #main -->
@endsection
