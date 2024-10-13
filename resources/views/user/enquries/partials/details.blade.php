<div class="row">
    <div class="col-md-6" style="position: relative; min-height: 100vh;">
        <div class="sender-details">
            <div class="details">
                <p>
                    <strong>Remarks:</strong>
                </p>
            </div>
        </div>
        <div class="sender-details" >
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
        <div style=" bottom: 0; width: 100%;">
            <form action="{{ route('user.remarks.store') }}" method="POST" id="remarkForm">
                @csrf
                <input type="hidden" name="enquiry_id" value="{{ $enquiry->id }}"> <!-- Enquiry ID -->
                <input type="hidden" name="user_id" value="{{ Auth::id() }}"> <!-- Logged-in user ID -->
                <input type="hidden" name="user_email" value="{{ $enquiry->user->email }}">
                <input type="hidden" name="status" value="0">
                <div class="form-group">
                    <label for="summernoteExample">Remark Description</label>
                    <div id="summernoteExample">
                    </div>
                </div>
                <input type="hidden" id="remark" name="remark" value="">
                <input type="hidden" id="uploaded_file_path" name="uploaded_file_path" value="">
                <div class="form-group">
                    <!-- Add the custom file upload button -->
                    <button type="button" id="myFileUploadButton" class="btn btn-primary">
                        <i class="fa fa-file-pdf"></i> Upload File
                    </button>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="send_mail" value="0" id="sendMailCheckbox">&nbsp;&nbsp;Send Mail

                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Sumbit</button>
                </div>
            </form>
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
    // for checkbox
    document.getElementById('sendMailCheckbox').addEventListener('change', function () {
        if (this.checked) {
            this.value = 1; // Set value when checked
        } else {
            this.value = 0; // Set value when unchecked
        }
    });


    // Add the event listener to the custom upload button
    document.getElementById('myFileUploadButton').addEventListener('click', function () {
        $('<input type="file" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .txt, .csv, .odt, .rtf, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.presentation, text/plain, application/csv">')
        .click().on('change', function () {
            var file = this.files[0];
            // Handle the file upload
            uploadFile(file);
        });
    });


    // Initialize Summernote for remark input
    if ($("#summernoteExample").length) {
        $('#summernoteExample').summernote({
            height: 200,
            tabsize: 2,
            // toolbar: [
            //     ['style', ['style', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6']],
            //     ['style', ['bold', 'italic', 'underline', 'clear']],
            //     ['fontname', ['fontname']],
            //     ['color', ['color']],
            //     // Paragraph options
            //     ['para', ['ul', 'ol', 'paragraph']],
            
            //     // Insert options including the custom file upload
            //     ['insert', ['picture', 'link', 'video', 'table', 'myFileUpload']],
            // ],
            // buttons: {
            //     // Add the file upload button with minimal code
            //     myFileUpload: function () {
            //         var ui = $.summernote.ui;
            //         var button = ui.button({
            //             contents: '<i class="fa fa-file-pdf"/>', // File icon
            //             tooltip: 'Upload File',
            //             click: function () {
            //                 $('<input type="file" accept=".pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .txt, .csv, .odt, .rtf, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.presentation, text/plain, application/csv">').click().on('change', function () {
                                
            //                     var file = this.files[0];
            //                     // You can handle the file upload here
            //                     uploadFile(file); // You can add your own file upload logic here
            //                 });
            //             }
            //         });
            //         return button.render(); // Return the button HTML
            //     }
            // },
        });
    }
    // Minimal file upload handler (you can customize it)
    function uploadFile(file) {
        var csrfToken = "{{ csrf_token() }}";
        var data = new FormData();
        data.append('file', file);
        data.append('_token', csrfToken);
        data.append('_token', csrfToken); // Add CSRF token to FormData
        $.ajax({
            url: '{{ url("/save-mail-details/") }}', // Your backend file upload endpoint
            method: 'POST',
            data: data,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Set CSRF token in headers
            },
            success: function (response) {
                var filePath = response.filePath; // Adjust based on your response structure
                console.log(response.fileName)
                var fileUrl = '{{ url("storage") }}' + '/' + filePath;
                $('#uploaded_file_path').val(filePath); 
                // $('#uploaded_file_path').val(response.fileName); 
                alert("File uploaded");
                
            },
            error: function (jqXHR, textStatus, errorThrown) {
            // Get the response message
                var errorMessage = 'File upload failed.';

                if (jqXHR.responseJSON && jqXHR.responseJSON.errors) {
                    // If the server returned validation errors, get the first error message
                    var errors = jqXHR.responseJSON.errors;
                    errorMessage = errors.file ? errors.file[0] : errorMessage;
                } else if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                    // If there is a custom error message, use it
                    errorMessage = jqXHR.responseJSON.message;
                }

                // Display the error message
                alert(errorMessage);
                console.error('File upload failed:', errorThrown);
            }
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