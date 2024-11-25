@forelse($enquiries as $index => $enquiry)
    <div class="mail-list {{ $index == 0 ? 'active' : '' }}" data-id="{{ $enquiry->id }}">
        <div class="content d-flex justify-content-between ">
            <p class="message_text"> <strong>{{ $enquiry->id }} </strong> {{ $enquiry->user->first_name }} {{ $enquiry->user->last_name }} </p>
            <span class="online-status align-items-end"> {{ $enquiry->created_at }}  </span>      
        </div>
        
    </div>
    @empty
    <div class="content">
            <p class="sender-name">No Enquiry Found</p>
    </div>
    
@endforelse
{{ $enquiries->links('vendor.pagination.bootstrap-5') }}

<script>


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