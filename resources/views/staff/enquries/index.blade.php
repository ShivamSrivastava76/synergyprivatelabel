@extends('staff.layout.master')
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
                <!-- <div class="form-group">
                    <input class="form-control w-100" type="search" placeholder="Search mail" id="mail-search">
                </div> -->
            </div>
            @forelse($enquiries as $index => $enquiry)
                <div class="mail-list {{ $index == 0 ? 'active' : '' }}" data-id="{{ $enquiry->id }}">
                    <div class="content flex">
                        <p class="message_text"> <strong> Id: </strong> {{ $enquiry->id }}  </p>
                        <p class="message_text"> <strong> Name: </strong> {{ $enquiry->user->first_name }} {{ $enquiry->user->last_name }}</p>
                        <p class="message_text"> <strong> Date & Time:  </strong>   {{ $enquiry->created_at }}   </p>  
                        <p class="message_text">{{ $enquiry->user->company }}  </p>      
                    </div>
                    <div class="text-rigth">
                        @if($enquiry->status == 0)
                            <i class="fa fa-unlock" onclick="ipaddresslock('{{$enquiry->ip_address}}')" ></i>
                        @else
                            <i class="fa fa-lock" onclick="ipaddressunlock('{{$enquiry->ip_address}}')"></i>
                        @endif
                    </div>
                </div>
                @empty
                <div class="content">
                        <p class="sender-name">No Enquiry Found</p>
                </div>
            @endforelse
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
            url: '{{ url("/staff/enquiries/") }}' + '/' + enquiryId,
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
            url: '{{ url("/staff/iplock/") }}',
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
            url: '{{ url("/staff/iplock/") }}',
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
</script>
@endsection