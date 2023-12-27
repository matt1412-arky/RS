<!-- resources/views/roles/search.blade.php -->

@extends('layout.apps')
@section('title', 'Hak Akses')
@section('content')

<!-- ... Your existing HTML code ... -->

<div class="card p-4 m-3">
    <!-- ... Your existing content ... -->

    <div class="input-group">
        <input id="searchData" class="form-control" placeholder="Cari Data" onchange="search(this.value)">
        <button class="btn btn-primary mb-0" onclick="searchRoles()">Search</button>
    </div>

    <div id="searchResults">
        <!-- Display search results here -->
    </div>

    <!-- ... The rest of your HTML code ... -->
</div>

<!-- ... The rest of your Blade file ... -->

<script>
    function searchRoles() {
        var searchText = $('#searchData').val();

        $.ajax({
            type: 'GET',
            url: '/search-roles',
            data: { query: searchText },
            success: function (data) {
                $('#searchResults').html(data);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }
</script>

@endsection
