@extends('panel.layouts.app')

@section('content')


    <div class="pagetitle">
        <h1>Category</h1>

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
                                    <h5 class="card-title">Category list</h5>
                                </div>
                                <div class="col-md-6" style="text-align: right" ;>
                                    <a href="{{url('panel/category/add')}}" class="btn btn-primary" style="margin-top:10px"
                                        ;>Add</a>
                                </div>
                            </div>
                            <table class="table table-striped" id="categoryTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <th scope="row">{{$value->id}}</th>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->description}}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm edit-category"
                                                            data-id="{{$value->id}}"
                                                            data-name="{{$value->name}}"
                                                            data-description="{{$value->description}}">
                                                            Edit
                                                </a>


                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function () {
                                                        document.querySelectorAll('.edit-category').forEach(button => {
                                                            button.addEventListener('click', function (e) {
                                                                e.preventDefault();
                                                                let categoryId = this.getAttribute('data-id');
                                                                let categoryName = this.getAttribute('data-name');
                                                                let categoryDescription = this.getAttribute('data-description');

                                                                Swal.fire({
                                                                    title: "Edit Category",
                                                                    html: `
                                                                        <input id="swal-input-name" class="swal2-input" value="${categoryName}" placeholder="Name">
                                                                        <input id="swal-input-description" class="swal2-input" value="${categoryDescription}" placeholder="Description">
                                                                    `,
                                                                    showCancelButton: true,
                                                                    confirmButtonText: "Save",
                                                                    preConfirm: () => {
                                                                        let newName = document.getElementById('swal-input-name').value;
                                                                        let newDescription = document.getElementById('swal-input-description').value;

                                                                        if (!newName || !newDescription) {
                                                                            Swal.showValidationMessage("Both fields are required");
                                                                        }

                                                                        return { name: newName, description: newDescription };
                                                                    }
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        let form = document.createElement('form');
                                                                        form.method = "POST";
                                                                        form.action = `{{ url('panel/category/edit/') }}/${categoryId}`;
                                                                        form.innerHTML = `
                                                                            @csrf
                                                                            <input type="hidden" name="name" value="${result.value.name}">
                                                                            <input type="hidden" name="description" value="${result.value.description}">
                                                                        `;
                                                                        document.body.appendChild(form);
                                                                        form.submit();
                                                                    }
                                                                });
                                                            });
                                                        });
                                                    });
                                                </script>


                                                <a href="#" class="btn btn-danger btn-sm delete-category" data-id="{{$value->id}}">Delete</a>

                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function () {
                                                        document.querySelectorAll('.delete-category').forEach(button => {
                                                            button.addEventListener('click', function (e) {
                                                                e.preventDefault();
                                                                let categoryId = this.getAttribute('data-id');

                                                                Swal.fire({
                                                                    title: "Are you sure?",
                                                                    text: "You won't be able to revert this!",
                                                                    icon: "warning",
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: "#d33",
                                                                    cancelButtonColor: "#3085d6",
                                                                    confirmButtonText: "Yes, delete it!"
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        window.location.href = `{{ url('panel/category/delete/') }}/${categoryId}`;
                                                                    }
                                                                });
                                                            });
                                                        });
                                                    });
                                                </script>



                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <script>
                                $(document).ready(function() {
                                    $('#categoryTable').DataTable();
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
