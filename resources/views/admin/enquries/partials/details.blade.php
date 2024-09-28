<!-- Remark modal -->
<div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add Remark</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.remarks.store') }}" method="POST" id="remarkForm">
                    @csrf
                    <input type="hidden" name="enquiry_id" value="{{ $enquiry->id }}"> <!-- Enquiry ID -->
                    <input type="hidden" name="user_id" value="{{ $enquiry->user->id }}"> <!-- Logged-in user ID -->
                    <input type="hidden" name="status" value="0">
                    <div class="form-group">
                        <label for="summernoteExample">Remark Description</label>
                        <div id="summernoteExample">
                        </div>
                    </div>
                    <input type="hidden" id="remark" name="remark" value="">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Sumbit</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Send Mail modal -->
<div class="modal fade" id="exampleModal-5" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add Mail Content</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.mail.store') }}" method="POST" id="emailForm">
                    @csrf
                    <input type="hidden" name="enquiry_id" value="{{ $enquiry->id }}"> <!-- Enquiry ID -->
                    <input type="hidden" name="user_email" value="{{ $enquiry->user->email }}">
                    <!-- Logged-in user ID -->
                    <input type="hidden" name="status" value="0">
                    <div class="form-group">
                        <label for="summernoteExample1">Mail Description</label>
                        <div id="summernoteExample1">
                        </div>
                    </div>
                    <input type="hidden" id="email_content" name="email_content" value="">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Sumbit</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Remark Button -->
<div class="row">
    <div class="col-md-12 mb-4 mt-4">
        <div class="btn-toolbar">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary btn-icon-text" data-toggle="modal"
                    data-target="#exampleModal-4" data-whatever="@getbootstrap"><i
                        class="fas fa-pen-square text-primary btn-icon-prepend"></i> Add Remark</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary btn-icon-text" data-toggle="modal"
                    data-target="#exampleModal-5" data-whatever="@getbootstrap"><i
                        class="far fa-envelope text-primary btn-icon-prepend"></i>Send Mail</button>
            </div>
        </div>
    </div>
</div>

<!-- Enquiry Details -->
<div class="message-body">
    <div class="sender-details">
        <img class="img-sm rounded-circle mr-3" src="{{ asset('assets/admin/images/faces/user.jpg') }}" alt="">
        <div class="details">
            <p class="msg-subject">Enquiry Details - #{{ $enquiry->id }}</p>
            <p class="sender-email">{{ $enquiry->user->name }} <a href="javascript:void">{{ $enquiry->user->email }}</a>
            </p>
        </div>
    </div>

    <!-- Additional Enquiry Information -->
    <div class="sender-details">
        <div class="details">
            <p><strong>Company:</strong> {{ $enquiry->user->company }}</p>
            <p><strong>Customizable:</strong> {{ $enquiry->customiable ? 'Yes' : 'No' }}</p>
            <p><strong>Products:</strong>
                @foreach($enquiry->enquiryProducts as $product)
                {{ $product->product->name }}, &nbsp;
                @endforeach
            </p>
        </div>


    </div>

    <div class="sender-details">
        <div class="details">
            <p><strong>Remarks:</strong></p>
        </div>
        <div class="sender-details" style="display:block;">
            @forelse($enquiry->remarks as $remark)
            <p style="padding: 20px 15px 0;
        border-bottom: 1px solid #e0e0ef;">{!! $remark->remark !!} (Created on:
                {{ $remark->created_at->format('Y-m-d') }},
                by {{ $remark->user->first_name ?? 'Unknown User' }} {{ $remark->user->last_name ?? 'Unknown User' }})
            </p>
            @empty
            <p>No remarks found.</p>
            @endforelse
            <!-- <p><strong>Customizable:</strong> {{ $enquiry->customiable ? 'Yes' : 'No' }}</p> -->
        </div>
    </div>

    <div class="attachments-sections">
        <ul>
            @foreach($enquiry->emails  as $email)
                <!-- <li>{{ $email->email_content }} - Status: {{ $email->status }}</li> -->
                <li>
                    <div class="thumb"><i class="fa fa-file-pdf"></i></div>
                    <div class="details">
                        <p class="file-name">{{$email->email_content}}</p>
                        <div class="buttons">
                            <!-- <p class="file-size">678Kb</p> -->
                            <a href="{{ asset('assets/pdf/'.$email->email_content) }}" target="_blank" class="view">View</a>
                            <a href="{{ asset('assets/pdf/'.$email->email_content) }}" download  class="download">Download</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
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