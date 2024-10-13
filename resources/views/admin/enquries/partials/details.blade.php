<div class="row">
    <div class="col-md-6">
        <div class="sender-details">
            <div class="details">
                <p>
                    <strong>Remarks:</strong>
                </p>
            </div>
        </div>
        <div class="sender-details">
            <div class="sender-details" style="display:block;">
                @forelse($enquiry->remarks as $remark)
                    @if(Auth::user()->role == $remark->user_type )
                        @if($remark->remark_type == "remark")
                            <div class="col-md-9 grid-margin stretch-card" style="float:inline-end;">
                                <div class="card" style=" background:#c1ecc763;">
                                    <div class="card-body" style="padding: 0.5rem 0.5rem;">
                                        <div class="d-flex flex-row">
                                            <div class="ml-3">
                                                <h6>{!! $remark->remark !!}</h6>
                                                <p class="text-muted" style="margin-bottom:0px; font-size: 0.8125rem;">{{ $remark->created_at->format('Y-m-d') }}</p>
                                                <p class="mt-1 text-primary font-weight-bold" style="margin-bottom:0px; font-size: 0.8125rem;">{{ $remark->user->first_name ?? 'Unknown User' }} {{ $remark->user->last_name ?? 'Unknown User' }} 
                                                    @if($remark->user->role == 0)
                                                        (Admin)
                                                    @elseif($remark->user->role == 1)
                                                        (Staff)
                                                    @elseif($remark->user->role == 2)
                                                        (User)
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-9 grid-margin stretch-card offset-md-7">
                                <div class="attachments-sections" style=" background:#c1ecc763;">
                                    <ul style="margin-bottom:0; padding-left:0px;">
                                        <li>
                                            <div class="thumb">
                                                <i class="fa fa-file-pdf"></i>
                                            </div>
                                            <div class="details">
                                                <p class="file-name">{{$remark->remark}}</p>
                                                <div class="buttons">
                                                    <a href="{{ asset('assets/pdf/'.$remark->remark) }}" target="_blank" class="view">View</a>
                                                    <a href="{{ asset('assets/pdf/'.$remark->remark) }}" download  class="download">Download</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @else
                        @if($remark->remark_type == "remark")
                            <div class="col-md-9 grid-margin stretch-card" style="float:inline-start">
                                <div class="card" style="background:#f2f2f2;">
                                    <div class="card-body" style="padding: 0.5rem 0.5rem;">
                                        <div class="d-flex flex-row">
                                            <div class="ml-3">
                                                <h6>{!! $remark->remark !!}</h6>
                                                <p class="text-muted" style="margin-bottom:0px; font-size: 0.8125rem;">{{ $remark->created_at->format('Y-m-d') }}</p>
                                                <p class="mt-1 text-primary font-weight-bold" style="margin-bottom:0px; font-size: 0.8125rem;">{{ $remark->user->first_name ?? 'Unknown User' }} {{ $remark->user->last_name ?? 'Unknown User' }}
                                                    @if($remark->user->role == 0)
                                                        (Admin)
                                                    @elseif($remark->user->role == 1)
                                                        (Staff)
                                                    @elseif($remark->user->role == 2)
                                                        (User)
                                                    @endif

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-9 grid-margin stretch-card">
                                <div class="attachments-sections" style="background:#f2f2f2;">
                                    <ul style="margin-bottom:0; padding-left:0px;">
                                        <li>
                                            <div class="thumb">
                                                <i class="fa fa-file-pdf"></i>
                                            </div>
                                            <div class="details">
                                                <p class="file-name">{{$remark->remark}}</p>
                                                <div class="buttons">
                                                    <a href="{{ asset('assets/pdf/'.$remark->remark) }}" target="_blank" class="view">View</a>
                                                    <a href="{{ asset('assets/pdf/'.$remark->remark) }}" download  class="download">Download</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endif
                    @empty
                    <p>No remarks found.</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Enquiry Details -->
        <div class="message-body">
            <div class="sender-details">
                <img class="img-sm rounded-circle mr-3" src="{{ asset('assets/admin/images/faces/user.jpg') }}" alt="">
                <div class="details">
                    <p class="msg-subject">Enquiry Details - #{{ $enquiry->id }}</p>
                    <p class="sender-email">{{ $enquiry->user->name }} 
                        <a>{{ $enquiry->user->email }}</a>
                    </p>
                </div>
            </div>
            <!-- Additional Enquiry Information -->
            <div class="sender-details">
                <div class="details">
                    <p>
                        <strong>Company:</strong> {{ $enquiry->user->company }}
                    </p>
                    @foreach($enquiry->enquiryProducts as $product)
                        <p><strong>Product Name:</strong> {{ $product->product->name }}</p>
                        <p><strong>Customizable:</strong> {{ $product->customiable == 0 ? 'Yes' : 'No' }}
                        @if($product->customiable == 0)
                            <p><strong>formula:</strong> {{ $product->formula }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize Summernote for remark input
    if ($("#summernoteExample").length) {
        $('#summernoteExample').summernote({
            height: 200,
            tabsize: 2,
        });
    }
    // Initialize Summernote for remark input
    if ($("#summernoteExample1").length) {
        $('#summernoteExample1').summernote({
            height: 200,
            tabsize: 2,
        });
    }

    // Hide some Summernote options for a cleaner UI
    $(".note-view").hide();

    // Update hidden 'remark' input when content changes in Summernote
    $('#summernoteExample').on('summernote.change', function(we, contents, $editable) {
        $('#remark').val(contents);
    });
    // Update hidden 'remark' input when content changes in Summernote
    $('#summernoteExample1').on('summernote.change', function(we, contents, $editable) {
        $('#email_content').val(contents);
    });

    // Reset form and Summernote when the modal is closed
    // $('#exampleModal-4').on('hidden.bs.modal', function() {
    //     $('#remarkForm')[0].reset(); // Reset form fields
    //     $('#summernoteExample').summernote('reset'); // Reset Summernote content
    //     $('#remark').val('');
    // });

    // Reset form and Summernote when the modal is closed
    // $('#exampleModal-5').on('hidden.bs.modal', function() {
    //     $('#emailForm')[0].reset(); // Reset form fields
    //     $('#summernoteExample1').summernote('reset'); // Reset Summernote content
    //     $('#email_content').val('');
    // });

});
</script>