<!-- /.content-wrapper -->

</div>
<!-- /.wrapper -->
<!-- Start Core Plugins
         =====================================================================-->
<!-- jQuery -->
<script src="{{ asset('public/admin_assets/plugins/jQuery/jquery-1.12.4.min.js')}}" type="text/javascript"></script>
<!-- jquery-ui -->
<script src="{{ asset('public/admin_assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{{ asset('public/admin_assets/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- lobipanel -->
<script src="{{ asset('public/admin_assets/plugins/lobipanel/lobipanel.min.js')}}" type="text/javascript"></script>
<!-- Pace js -->
<script src="{{ asset('public/admin_assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{ asset('public/admin_assets/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"> </script>
<!-- FastClick -->
<script src="{{ asset('public/admin_assets/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
<!-- CRMadmin frame -->
<script src="{{ asset('public/admin_assets/dist/js/custom.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_assets/dist/js/inputtag.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_assets/dist/js/fSelect.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_assets/plugins/icheck/icheck.min.js')}}" type="text/javascript"></script>
      
<script src="{{ asset('public/admin_assets/plugins/summernote/summernote.js')}}" type="text/javascript"></script>

<script src="{{ asset('public/admin_assets/plugins/counterup/waypoints.js')}}" type="text/javascript"></script>
<script src="{{ asset('public/admin_assets/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('public/admin_assets/plugins1/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/admin_assets/plugins1/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('public/admin_assets/plugins1/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('public/admin_assets/plugins1/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('public/admin_assets/plugins1/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="{{ asset('public/admin_assets/plugins/bootstrap-toggle/bootstrap-toggle.min.js')}}" type="text/javascript">
</script>


<!-- End Page Lavel Plugins
         =====================================================================-->
<!-- Start Theme label Script
         =====================================================================-->
<!-- Dashboard js -->
<script src="{{ asset('public/admin_assets/dist/js/dashboard.js')}}" type="text/javascript"></script>
<!-- End Theme label Script
         =====================================================================-->
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="{{ asset('admin_assets/image-uploader/dist/image-uploader.min.js')}}"></script>
@stack('custom_js')
<script>
$('.input-images').imageUploader();

var base_path='@php echo url('/'); @endphp';
	
//	tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
	
	
	toggleClass();
function toggleClass() {
    $('.toggle-class').change(function() {
        var formAction=$(this).attr('action');
		
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: base_path+'/'+formAction,
            data: {
                'status': status,
                'user_id': user_id
            },
            success: function(data) {
                console.log(data.success)
                toastr.success(data.success);
            }
        });
    })
}


// camcel order
$('body').on('click', '.cancelOrder', function () {
	toastr.options = {
		"closeButton": true,
		"newestOnTop": true,
		"positionClass": "toast-top-right"
	};
	var status = $(this).attr('status');
	var id = $(this).data('id');
	var user_id = $(this).data('user_id');
	var sale_id = $(this).data('sale_id');
	var status_id = $(this).data('status');
	var order = $(this).data('order');
	
	  $.ajax({
		  type: "post",
		 
		  url: base_path+'/admin/sales/calcel-order',
		   dataType:'json',
		  data: {
				'id': id, 'user_id':user_id, 'sale_id':sale_id, 'status':status_id, 'order':order
			},
		  headers: {
			 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
		  },
		  success: function (data) {
				$(".formModeldata").html(data.html);
				$('.formModel').modal('show');
		  },
		  error: function (data) {
			  console.log('Error:', data);
			  toastr.error(data.error);
		  }
	});
});


//add remark of calcel-order
function statusCancelRemark(){
$("form#remark").submit(function(e){
	e.preventDefault();
	toastr.options = {
		"closeButton": true,
		"newestOnTop": true,
		"positionClass": "toast-top-right"
	};
	var formId=$(this).attr('id');
	var formAction=$(this).attr('action');
	var formLoader=$(this).data('loader');
	
	$.ajax({
		url: formAction,
		 headers: {
			 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 
		 },
		data: new FormData(this),
		type: 'post',
		dataType:'json',
		beforeSend: function(){
			$('.button_'+formLoader).prop('disabled', true);
		},
		error:function(xhr,textStatus){
			if (textStatus == 'timeout') {
				toastr.error(xhr.status + ': ' + xhr.statusText);
				
			}else{
				toastr.error(xhr.status + ': ' + xhr.statusText);
			}
			$('.button_'+formLoader).prop('disabled', false);
		},
		success: function(data){
			if(data.error){
				toastr.error(data.msg);
				$('.button_'+formLoader).prop('disabled', false);
			}else{
				$('.formModel').modal('hide');
				var oTable = $('.sales').dataTable(); 
				 oTable.fnDraw(false);
				toastr.success(data.success);
				$('.button_'+formLoader).prop('disabled', false);
			}
		},
		cache:false,
		contentType:false,
		processData:false, 
	});
});
}
</script>
    <script>
	var base_path='@php echo url('/'); @endphp';
    $(document).ready(function () {
        $('.data-table').DataTable({
            "order": [[ 0, "desc" ]],
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                'csv'
            ],
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('admin/users') }}",
                     "dataType": "json",
                     "type": "get",
				   },
				   "fnDrawCallback": function() {
						$('.toggle-class').bootstrapToggle();
						toggleClass();
					},
				 
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status', searchable: false},
                    {data: 'delete', name: 'delete', searchable: false},
                ],
        });
		$('body').on('click', '.edit-user', function () {
		var formAction=$(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).attr('status');
        var user_id = $(this).data('id');
			  $.ajax({
				  type: "get",
				  url: base_path+'/'+formAction,
				  data: {
						'status': status,
						'user_id': user_id
					},
				  success: function (data) {
				  var oTable = $('.data-table').dataTable(); 
				  oTable.fnDraw(false);
				  toastr.success(data.success);
				  },
				  error: function (data) {
					  console.log('Error:', data);
					  toastr.error(data.error);
				  }
			  });
		});
    });
	
	
	//products
	$(document).ready(function () {
        $('.products').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                'csv'
            ],
            "processing": true,
            "serverSide": true,
			"ajax":{
                     "url": "{{ url('admin/products/products') }}",
                     "dataType": "json",
                     "type": "get",
				   },
				   "fnDrawCallback": function() {
						$('.toggle-class').bootstrapToggle();
						toggleClass();
					},
                columns: [
					
                    {data: 'id', name: 'id'},
                    {data: 'category', name: 'category'},
                    {data: 'brand', name: 'brand'},
                    {data: 'model', name: 'model'},
                    {data: 'km', name: 'km'},
                    {data: 'owners', name: 'owners'},
                    {data: 'price', name: 'price'},
                    {data: 'date', name: 'date'},
					{data: 'status', name: 'status'},
					{data: 'sold', name: 'sold'},
					{data: 'view', name: 'view'},
					{data: 'edit', name: 'edit'},
					{data: 'delete', name: 'delete'},
                ]
        });
		
		
		$('body').on('click', '.edit-product', function () {
		var formAction=$(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).attr('status');
        var user_id = $(this).data('id');
			  $.ajax({
				  type: "get",
				  url: base_path+'/'+formAction,
				  data: {
						'status': status,
						'user_id': user_id
					},
				  success: function (data) {
				  var oTable = $('.products').dataTable(); 
				  oTable.fnDraw(false);
				  toastr.success(data.success);
				  },
				  error: function (data) {
					  console.log('Error:', data);
					  toastr.error(data.error);
				  }
			  });
		});
    });
	
	//coupon code ajax data-table
	$(document).ready(function () {
        $('.coupon').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                'csv'
            ],
            "processing": true,
            "serverSide": true,
			"ajax":{
                     "url": "{{ url('admin/products/coupon') }}",
                     "dataType": "json",
                     "type": "get",
				   },
				   "fnDrawCallback": function() {
						$('.toggle-class').bootstrapToggle();
						toggleClass();
					},
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'start_date', name: 'start_date'},
                    {data: 'end_date', name: 'end_date'},
                    {data: 'coupon_code', name: 'coupon_code'},
                    {data: 'discount', name: 'discount'},
					{data: 'type', name: 'type'},
					{data: 'image', name: 'image'},
					{data: 'status', name: 'Active /Inactive'},
					{data: 'action', name: 'action'},
                ]
        });
		$('body').on('click', '.edit-coupon', function () {
		var formAction=$(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).attr('status');
        var user_id = $(this).data('id');
			  $.ajax({
				  type: "get",
				  url: base_path+'/'+formAction,
				  data: {
						'status': status,
						'user_id': user_id
					},
				  success: function (data) {
				  var oTable = $('.coupon').dataTable(); 
				  oTable.fnDraw(false);
				  toastr.success(data.success);
				  },
				  error: function (data) {
					  console.log('Error:', data);
					  toastr.error(data.error);
				  }
			  });
		});
		
	//contact ajax
	$('.contact').DataTable({
        dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                'csv'
            ],
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('admin/contact') }}",
                     "dataType": "json",
                     "type": "get",
				   },
				 
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'email', name: 'email'},
                    {data: 'message', name: 'message'},
                    {data: 'action', name: 'action', searchable: false},
                ],
        });
		//bulk enquiry
		$('.enquiry').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                'csv'
            ],
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('admin/bulk-enquiry') }}",
                     "dataType": "json",
                     "type": "get",
				   },
				 
                columns: [
                    {data: 'id', name: 'id'},
					{data: 'company_name', name: 'company_name'},
                    {data: 'contact_person', name: 'contact_person'},
                    {data: 'email', name: 'email'},
					{data: 'phone', name: 'phone'},
                    {data: 'message', name: 'message'},
                    {data: 'action', name: 'action', searchable: false},
                ],
        });
		
		//Login activity
		$('.activity').DataTable({
            "order": [[ 0, "desc" ]],
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                'csv'
            ],
            "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('admin/login-activity') }}",
                     "dataType": "json",
                     "type": "get",
				   },
				 
                columns: [
                    {data: 'id', name: 'id'},
					{data: 'name', name: 'name'},
					{data: 'mobile', name: 'mobile'},
                    {data: 'email', name: 'email'},
					{data: 'created_at', name: 'created_at'},
                ],
        });
		
		
		
		//blog datatable ajax
		
		 $('.blog').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                'csv'
            ],
            "processing": true,
            "serverSide": true,
			"ajax":{
                     "url": "{{ url('admin/blogs/blog') }}",
                     "dataType": "json",
                     "type": "get",
				   },
				   "fnDrawCallback": function() {
						$('.toggle-class').bootstrapToggle();
						toggleClass();
					},
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
					{data: 'status', name: 'Active /Inactive'},
					{data: 'action', name: 'action'},
                ]
        });
		$('body').on('click', '.edit-blog', function () {
		var formAction=$(this).attr('action');
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        var status = $(this).attr('status');
        var user_id = $(this).data('id');
			  $.ajax({
				  type: "get",
				  url: base_path+'/'+formAction,
				  data: {
						'status': status,
						'user_id': user_id
					},
				  success: function (data) {
				  var oTable = $('.blog').dataTable(); 
				  oTable.fnDraw(false);
				  toastr.success(data.success);
				  },
				  error: function (data) {
					  console.log('Error:', data);
					  toastr.error(data.error);
				  }
			  });
		});
		
    });
	
	//sales details ajax
	$('.sales').DataTable({
		dom: 'Bfrtip',
		lengthMenu: [
			[10, 25, 50, -1],
			['10 rows', '25 rows', '50 rows', 'Show all']
		],
		buttons: [
			'pageLength',
			'csv'
		],
		"processing": true,
		"serverSide": true,
		"ajax":{
				 "url": "{{url()->current()}}",
				 "dataType": "json",
				 "type": "get",
			   },
			columns: [
				{data: 'id', name: 'id'},
				{data: 'name', name: 'name'},
				{data: 'mobile', name: 'mobile'},
				{data: 'order_id', name: 'order_id'},
				{data: 'date', name: 'date'},
				{data: 'net_amount', name: 'net_amount'},
				{data: 'address', name: 'address'},
				{data: 'payment_type', name: 'payment_type'},
				{data: 'status', name: 'status'},
				{data: 'action', name: 'action'},
			]
	});
	
//products
$(document).ready(function () {
        $('.user-products').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                'csv'
            ],
            "processing": true,
            "serverSide": true,
			"ajax":{
                     "url": "{{ url('admin/user/products') }}",
                     "dataType": "json",
                     "type": "get",
				   },
				   "fnDrawCallback": function() {
						$('.toggle-class').bootstrapToggle();
						toggleClass();
					},
                columns: [
					
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'category', name: 'category'},
                    {data: 'brand', name: 'brand'},
                    {data: 'model', name: 'model'},
                    {data: 'km', name: 'km'},
                    {data: 'owners', name: 'owners'},
                    {data: 'price', name: 'price'},
                    {data: 'date', name: 'date'},
					{data: 'status', name: 'status'},
					{data: 'sold', name: 'sold'},
					{data: 'view', name: 'view'},
					{data: 'edit', name: 'edit'},
					{data: 'delete', name: 'delete'},
                ]
        });	
    });	

    //products
$(document).ready(function () {
        $('.user-enquery').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                'csv'
            ],
            "processing": true,
            "serverSide": true,
			"ajax":{
                     "url": "{{ url('admin/user/enquery') }}",
                     "dataType": "json",
                     "type": "get",
				   },
				   "fnDrawCallback": function() {
						$('.toggle-class').bootstrapToggle();
						toggleClass();
					},
                columns: [
					
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'message', name: 'message'},
                    {data: 'date', name: 'date'},
                    {data: 'product', name: 'product'},
                    {data: 'seller', name: 'seller'},
                    {data: 'view', name: 'view'}
                ]
        });	
    });	
</script>

<script>
$(document).ready(function() {
    $('#example2').dataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
            'pageLength',
            'csv'
        ]
    });
});




(function($) {
    $(function() {
        $('.test').fSelect();
    });
})(jQuery);

$('#startDate').datepicker({
    dateFormat: 'dd-mm-yy',
    changeYear: true,
    minDate: '-D'
});
$('#endDate').datepicker({
    dateFormat: 'dd-mm-yy',
    changeYear: true,
    minDate: '-D'
});
$('.date').datepicker({
    dateFormat: 'dd-mm-yy',
    yearRange: "-60:+0",
    changeYear: true,
});
</script>
<script>
//Summernote
function sumnote() {
    var note = $('.summernote');
    $(note).summernote({
        height: 200, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: true // set focus to editable area after initializing summernote
    });
}
sumnote();
</script>
<script>
$(document).ready(function() {
    // show the alert
    window.setTimeout(function() {
        $(".alert").show(5, function() {
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };
            @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
            @elseif(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
            @endif
        });
    }, 10);
});


// add attributs of products
var i = 0;

$("#add").click(function() {

    ++i;

    $("#dynamicTable").append(
        '<tr><td><input required type="text" name="color[]" placeholder="Enter Products Color" class="form-control" /></td><td><input type="text" name="size[]" placeholder="Enter Products Color" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
        );
});

$(document).on('click', '.remove-tr', function() {
    $(this).parents('tr').remove();
});


//drag and drop image code


function loadFile() {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
}
</script>



</body>

</html>