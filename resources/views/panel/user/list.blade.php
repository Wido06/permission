@extends('panel.layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>User</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard" style="height:100%">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    @include('_message')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title">User list</h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="{{ url('panel/user/add') }}" class="btn btn-primary" style="margin-top:10px;">Add</a>
                                </div>
                            </div>

                            <table class="table table-striped display nowrap" id="advancedUsersTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Pays</th>
                                        <th>Role</th>
                                        <th>Sexe</th>
                                        {{-- <th>Image</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Sexe</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($getRecord as $value)

                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->pays_id }}</td>
                                            <td>{{ $value->role_id }}</td>
                                            <td>{{  $value->Sexe }}</td>
                                            <td>
                                                @if($value->file_path)
                                                    @if(Str::endsWith($value->file_path, ['.png', '.jpg', '.jpeg']))
                                                        <a href="{{ asset($value->file_path) }}" data-lightbox="image-{{ $value->id }}">
                                                            <img src="{{ asset($value->file_path) }}" width="50">
                                                        </a>
                                                    @elseif(Str::endsWith($value->file_path, ['.pdf']))
                                                        <a href="{{ asset($value->file_path) }}" target="_blank">Voir PDF</a>
                                                    @endif
                                                @else
                                                    Aucun fichier
                                                @endif
                                            </td>


                                            <td>
                                                <a href="{{ url('panel/user/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ url('panel/user/delete/'.$value->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>

                            <script>
                                $(document).ready(function() {
                                    var table = $('#advancedUsersTable').DataTable({
                                        responsive: true,
                                        scrollX: true,
                                        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                        pageLength: 10,
                                        order: [[0, "desc"]],
                                        language: {
                                            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/English.json"
                                        },
                                        dom: '<"top"Bf>rt<"bottom"lip><"clear">',
                                        buttons: [
                                            { extend: 'copy', text: 'Copy' },
                                            { extend: 'csv', text: 'CSV' },
                                            { extend: 'excel', text: 'Excel' },
                                            { extend: 'pdf', text: 'PDF' },
                                            { extend: 'print', text: 'Print' }
                                        ],
                                        searchPanes: {
                                            cascadePanes: true,
                                            viewTotal: true
                                        },
                                        columnDefs: [
                                            { searchPanes: { show: true }, targets: [2, 3, 4] },
                                            { targets: [5, 6], orderable: false }
                                        ]
                                    });

                                    // Filtering per column
                                    $('#advancedUsersTable tfoot th').each(function() {
                                        var title = $(this).text();
                                        if (title !== "Action" && title !== "#") {
                                            $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                                        }
                                    });

                                    table.columns().every(function() {
                                        var that = this;
                                        $('input', this.footer()).on('keyup change', function() {
                                            if (that.search() !== this.value) {
                                                that.search(this.value).draw();
                                            }
                                        });
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection
