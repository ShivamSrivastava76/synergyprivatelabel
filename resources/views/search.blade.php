@include('layouts.app')
@include('layouts.navBar')

    <!-- breadcrumb start -->
    <div class="innerpagebanner py-4">
        <div class="container">
            <ul class="list-unstyled d-flex align-items-center m-0">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>
                    <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.4">
                            <path
                                d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                                fill="#000" />
                        </g>
                    </svg>
                </li>
                <li>Search</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->
    
    <main id="MainContent" class="content-for-layout">
        <div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="detailsCont">
                            <h3 class="text-center">Search our site</h3>
                            <div class="h-search-form text-center mt-5">
                                <input type="search" id="search" placeholder="Search..">
                                <ul id="myUL">
                                            
                                </ul>
                                <!--<div id="autocomplete-results"></div>-->
                                <!--<button onclick="searchproductlist()"><ion-icon class="bi bi-search" name="search-outline">-->
                                <!--    <svg class="icon icon-search" width="20" height="20" viewBox="0 0 20 20" fill="none"-->
                                <!--        xmlns="http://www.w3.org/2000/svg">-->
                                <!--        <path-->
                                <!--            d="M7.75 0.250183C11.8838 0.250183 15.25 3.61639 15.25 7.75018C15.25 9.54608 14.6201 11.1926 13.5625 12.4846L19.5391 18.4611L18.4609 19.5392L12.4844 13.5627C11.1924 14.6203 9.5459 15.2502 7.75 15.2502C3.61621 15.2502 0.25 11.884 0.25 7.75018C0.25 3.61639 3.61621 0.250183 7.75 0.250183ZM7.75 1.75018C4.42773 1.75018 1.75 4.42792 1.75 7.75018C1.75 11.0724 4.42773 13.7502 7.75 13.7502C11.0723 13.7502 13.75 11.0724 13.75 7.75018C13.75 4.42792 11.0723 1.75018 7.75 1.75018Z"-->
                                <!--            fill="black" />-->
                                <!--    </svg>-->
                                <!--</button>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collection-product-container"></div>
            </div>
        </div>
        
    </main>
<script>


    // function searchproductlist()
    // {
    //     key = $('#search').val();
    //     $.ajax({
    //         url: "searchproductlist/"+key,
    //         method: 'GET',
    //         success: function(data) {
    //             $('.collection-product-container').html(data);
    //         },
    //         error: function(err) {
    //             console.log('Error:', err);
    //         }
    //     });
    // }
</script>
@include('layouts.footer')
<script>
    $(document).ready(function(){
    $('#search').on('input', function(){
        let query = $(this).val();
        if(query.length > 1){
            $.ajax({
                url: '{{ route("searchproductlist") }}', // Your route for search
                method: 'GET',
                data: { query: query },
                success: function(response){
                    $('#myUL').html(response); // Display the results
                }
            });
        } else {
            $('#myUL').html(''); // Clear suggestions if query is short
        }
    });
});
</script>