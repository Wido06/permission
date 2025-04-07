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




{{--
                                @livewire(name: 'select-country-city') --}}





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





                            <!-- Bouton pour ouvrir la modale -->
                            {{-- <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                                Ajouter un rôle
                            </button>

                             <!-- Modal -->

                        <div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                        <h5 class="modal-title" id="addRoleModalLabel">Ajouter un nouveau rôle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                    </div>

                                    <form action="{{ url('panel.role.store') }}" method="post" id="addRoleForm">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nom du rôle</label>
                                                <input type="text" name="name" required class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label"><b>Permissions</b></label>
                                                @foreach ($getPermission as $value)
                                                    <div class="mb-2">
                                                        <strong>{{ $value['name'] }}</strong>
                                                        <div class="d-flex flex-wrap ms-3">
                                                            @foreach ($value['group'] as $group)
                                                                <div class="form-check me-3 mb-2">
                                                                    <input class="form-check-input" type="checkbox" name="permission_id[]"
                                                                        value="{{ $group['id'] }}" >
                                                                    <label class="form-check-label" for="perm_{{ $group['id'] }}">
                                                                        {{ $group['name'] }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                                {{-- script pouur le modal --}}






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
