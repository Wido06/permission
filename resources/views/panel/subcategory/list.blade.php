@extends('panel.layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Sub Category</h1>
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
                                    <h5 class="card-title">Sub Category list</h5>
                                </div>
                                <div class="col-md-6" style="text-align: right" ;>
                                    <a href="{{url('panel/subcategory/add')}}" class="btn btn-primary" style="margin-top:10px">Add</a>
                                </div>
                            </div>
                            <table id="subcategoryTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->description}}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm edit-subcategory"
                                                    data-id="{{$value->id}}"
                                                    data-name="{{$value->name}}"
                                                    data-description="{{$value->description}}">
                                                    Edit
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm delete-subcategory" data-id="{{$value->id}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('.edit-subcategory').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    let subcategoryId = this.getAttribute('data-id');
                    let subcategoryName = this.getAttribute('data-name');
                    let subcategoryDescription = this.getAttribute('data-description');

                    Swal.fire({
                        title: "Edit Sub Category",
                        html: `
                            <input id="swal-input-name" class="swal2-input" value="${subcategoryName}" placeholder="Name">
                            <input id="swal-input-description" class="swal2-input" value="${subcategoryDescription}" placeholder="Description">
                        `,
                        showCancelButton: true,
                        confirmButtonText: "Save",
                        preConfirm: () => {
                            let newName = document.getElementById('swal-input-name').value;
                            let newDescription = document.getElementById('swal-input-description').value;

                            if (!newName || !newDescription) {
                                Swal.showValidationMessage("All fields are required");
                            }

                            return { name: newName, description: newDescription };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let form = document.createElement('form');
                            form.method = "POST";
                            form.action = `{{ url('panel/subcategory/edit/') }}/${subcategoryId}`;
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

            document.querySelectorAll('.delete-subcategory').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    let subcategoryId = this.getAttribute('data-id');

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
                            window.location.href = `{{ url('panel/subcategory/delete/') }}/${subcategoryId}`;
                        }
                    });
                });
            });
        });
    </script>

<script>
    $(document).ready(function() {
        $('#subcategoryTable').DataTable();
    });
</script>

@endsection
