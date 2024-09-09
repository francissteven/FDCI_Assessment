@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid px-4">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h1 class="mt-4">Dashboard</h1>
        <button type="button" class="btn btn-outline-secondary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#addContact">Add Contact</button>
        
        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="search" class="form-control" placeholder="Search Contacts">
                </div>
            </div>
        </div>
        

        <div id="contactsTable">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="contactsTableBody">
                    @include('partials.contacts')
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-start mt-3">
            <nav id="paginationLinks">
                {{ $contacts->links() }}
            </nav>
        </div>
    </div>        
    
    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                let query = $(this).val();
                $.ajax({
                    url: "{{ route('dashboard.search') }}",
                    type: "GET",
                    data: {
                        query: query
                    },
                    success: function (data) {
                        $('#contactsTableBody').html(data);
                        $('#paginationLinks').html($('.pagination').html());
                    }
                });
            });

            // DELETE CONFIRM MODAL
            $(document).on('click', 'button[data-bs-toggle="modal"]', function () {
                const formAction = $(this).data('form-action');
                $('#deleteForm').attr('action', formAction);
            });
        });
    </script>
@endsection
