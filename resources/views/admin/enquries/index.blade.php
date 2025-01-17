@extends('admin.layout.master')
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </ul>
    </div>
@endif
<div class="email-wrapper wrapper">
    <div class="row align-items-stretch"> 
        <div class="mail-list-container col-md-4 pt-4 pb-4 border-right bg-white">
            <div class="border-bottom pb-4 mb-3 px-3">
                <form class="form-group" id="search-enquiries">
                    <input class="form-control w-100" type="search" placeholder="Search by mail, name" id="search-enquiry">
                </form>
            </div>
            <div id="search-enquiry-data">
                @include('admin.compment.enquiriesList')
            </div>
               
        </div>
        <div class="mail-view col-md-8 col-lg-8 bg-white">
            <div id="enquiry-details">
                <div class="message-body">
                    <p>Select an enquiry to view details</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    // Show the first enquiry details by default
    var firstEnquiryId = $('.mail-list:first').data('id');
    if (firstEnquiryId) {
        loadEnquiryDetails(firstEnquiryId);
    }

    // Click event for each enquiry
    $('.mail-list').click(function () {
        var enquiryId = $(this).data('id');

        // Remove 'active' class from all items and add to the clicked item
        $('.mail-list').removeClass('active');
        $(this).addClass('active');

        // Load the clicked enquiry details
        loadEnquiryDetails(enquiryId);
    });

    // Function to load enquiry details using AJAX
    function loadEnquiryDetails(enquiryId) {
        // Show loader or message while loading
        $('#enquiry-details').html('<div class="message-body"><p>Loading...</p></div>');

        // AJAX request to get enquiry details
        $.ajax({
            url: '{{ url("/admin/enquiries/") }}' + '/' + enquiryId,
            type: 'GET',
            success: function (response) {
                // Display the enquiry details in the mail-view container
                $('#enquiry-details').html(response);
            },
            error: function (xhr) {
                $('#enquiry-details').html('<div class="message-body"><p>Error loading enquiry details.</p></div>');
            }
        });
    }

    // Search functionality
    $('#mail-search').on('keyup', function() {
        var searchValue = $(this).val().toLowerCase();
        console.log(searchValue);
        $('.mail-list').each(function() {
            var name = $(this).find('.sender-name').text().toLowerCase();
            var company = $(this).find('.message_text').text().toLowerCase();

            if (name.includes(searchValue) || company.includes(searchValue)) {
                $(this).show(); // Show matching enquiries
            } else {
                $(this).hide(); // Hide non-matching enquiries
            }
        });
    });
});

    function ipaddresslock(ip)
    {
        $.ajax({
            type: 'POST',
            url: '{{ url("/admin/iplock/") }}',
            data: {
                    _token: '{{ csrf_token() }}',
                    ip: ip,
                    status: 1
                },
            success: function(data) {
                window.location.reload();
                }
            });
    }

    function ipaddressunlock(ip)
    {
        $.ajax({
            type: 'POST',
            url: '{{ url("/admin/iplock/") }}',
            data: {
                    _token: '{{ csrf_token() }}',
                    ip: ip,
                    status: 0
                },
            success: function(data) {
                window.location.reload();
                }
            });

    }

    $('#search-enquiries').on('keyup', function() {
        var searchValue = $('#search-enquiry').val().toLowerCase();
        console.log(searchValue)
        $.ajax({
            type: 'POST',
            url: '{{ url("/admin/search-enquiries/") }}',
            data: {
                    _token: '{{ csrf_token() }}',
                    searchValue: searchValue,
                },
            success: function(data) {
                // window.location.reload();
                $('#search-enquiry-data').html(data)
                }
            });
    });
</script>
@endsection