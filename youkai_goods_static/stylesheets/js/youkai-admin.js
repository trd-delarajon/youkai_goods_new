$(document).ready(function() {
    $('.datatable').dataTable( { bSort: false, "info": true, "paging": true, "searching": true, } );

    $('#loading').hide();
    $('#message').fadeIn(1000);
	$("#uploadForm").on('submit',(function(e) {
			e.preventDefault();
			$("#message").empty();
			fileupload 	= $('#fileupload').val();
			filename 	= $('#csvdataname').attr('data-file');
			csvdate 	= $('#csvdataname').attr('data-csvdate'); 
			csvtime 	= $('#csvdataname').attr('data-csvtime');
			user 		= $('#csvdataname').attr('data-user');


			if (fileupload=='') {
				$('#message').show().fadeOut(1500).html('<div class="alert alert-danger text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>Please choose a file!</div>');
    			$('#loading').hide();
			}else{
				$.ajax({
					url 			: "../controller/uploadcsv.php", 
					type 			: "POST",             
					data 			: new FormData(this), 
					contentType 	: false,      
					cache 			: false,           
					processData     : false,       
					success: function(data)   // A function to be called if request succeeds
					{
						if (data)
						{
							//setTimeout(function(){
	              				$('#loading').show(); //},1000)
		    					   setTimeout(function()
		    					   {
										//$("#message").html(data).show(2500);
			              				 	$('#uploadcsv').modal('hide')
			              				 	 	html = "<tr>";
												html += "<td class='info' style='color:#337ab7'>" + filename + "</td>";
												html += "<td class='info'>" + csvdate + "</td>";	
												html += "<td class='info'>" + csvtime + "<span style='float:right; font-size:9px;'>Uploaded by:" + user + "</span> </td>";	
												html += "<td class='info'>  <a class='btn btn-default disabled' href='#rest' data-toggle='modal' ><span class='glyphicon glyphicon-check'> </span> restore</a> </td>";	
												html += "</tr>";
			    				 			$('tbody').prepend(html);
			    				 			$('#newestfile').text(filename);
											$('#loading').hide();
											$('#message').hide();
											$('#fileupload').val('');
											$('#generatem').addClass('active');
											//$('#generatem').removeAttr('disabled');
			              			 		$('#generatemodal').modal('show')
			              			 		$('.messageupload').html(data).show(2500).fadeOut(2500);	
			              			 		$('#genmodal').attr('data-toggle', 'modal');

			              			},1500);
								 $('.actve td').removeAttr('style');
								 $('.actve td').removeClass('info');
								 $('.actve td, .restore').removeClass('disabled');

						}
   								 $('td').removeAttr('style');
								 $('td').removeClass('info');
								 $('td').removeClass('disabled');

					}
				});
			}
	}));//end of upload

	// restore
 	$('body').on('click', '.restore_btn', function() {
      	csvid = $(this).attr('data-csvid');
     	status = $(this).attr('csvstat');
        $('#modalrestore .modal-body').html('<h6 style="text-align:center">'+ $(this).attr('csvfilename') +  ' ' + $(this).attr('data-date')+ ' <span style="float:right;font-size:9px;">'+ $(this).attr('data-time') + 'Uploaded by:' + $(this).attr('usern') + '</span> </h6>');
        $('#modalrestore').modal('show');
        return false;
    });

 	$('.restmessage').hide();
     $('body').on('click', '.btnrestore', function(e) {
     	e.preventDefault();
        $.post('../controller/restore.php',{csvid:csvid},function(data){
        	console.log(data);

				     		$('.restmessage').attr('class', 'alert alert-info').html('<p style="text-align:center"><b>Success</b></p>').show().fadeOut(1500);
					        $('.actve td').removeAttr('style');
							$('.actve td').removeClass('info');
							$('.actve td, .restore').removeClass('disabled');

        		 	/*	if(status == 1){
				        	$('.actve td').attr('style', 'color:#337ab7');
				        	$('.actve td').addClass('info');
				        	$('.actve td, .restore').attr('disabled', 'disabled');
					        	 alert('equal');
					    }*/

						setTimeout(function(){
			              	$('#generatemodal').modal('show')
					        $('#modalrestore').modal('hide');  
					        //location.reload();
						},2500)
            });
    	});


	$('#generate').removeAttr('disabled');
	$("#form").on('submit',(function(e) {
			e.preventDefault();
				$('.progress').css("display",'block');
				$('#percent').text('0%');
			$.ajax({
					url 			: "../generateFolder.php",  
					type  			: 'GET',
					cache 			: false,
					contentType 	: false,
					processData 	: false,
					success: function(percentComplete)
					{
					        console.log(percentComplete)
					        var val 	= Math.floor((percentComplete)*100)+'%';
       							total 	=  $('.progress-bar').width(val).text(val)
       						// $('#percent').text(val);
					       	//$('.bar').css('width', (percentComplete)*100+'%');
							$('#generate').attr('disabled','disabled');
							if(percentComplete == 1){
								setTimeout(function(){ 
									$('#generatemodal').modal('hide'); 
									/*$('#generate').removeAttr('disabled');
									$('.progress').css("display",'block');
									$('#percent').text('0%');*/
									location.reload();
								},2500)

							}
					}
			});
	})); //end of progress


	










/*images.php*/


    $('li img').on('click',function(){
                var src 	= $(this).attr('src');
                var fname 	= $(this).attr('src');
                var funq 	= $(this).attr('funq');
                var img 	= ' <button type="button" funq="'+funq+'" class="btn btn-danger btn-xs btnimg" fname="'+ fname +'"> <span class="glyphicon glyphicon-trash"></span></button> <center> <img style="width:300px; hieght:300px" src="' + src + '" class="img-responsive"/> </center>';
                $('#modalimage').modal();
                $('#modalimage').on('shown.bs.modal', function(){
                    $('#modalimage .modal-body').html(img);
                    $('#modalimage .modal-footer').hide();
                });
                $('#modalimage').on('hidden.bs.modal', function(){
                    $('#modalimage .modal-body').html('');
                });
           });

           $('body').on('click', '.btnimg', function() {
		      	var filename = $(this).attr('fname');
                var funq 	 = $(this).attr('funq');

		        $('#modalimage .modal-body').html('<h6> <center> Are you sure you want to delete <img style="width:55px; hieght:55px" src="' + filename + '" ></span></center></h6>');
                $('#modalimage .modal-footer').show();
		        $('#modalimage .modal-footer').html('<button type="button" class="btn btn-danger btn-sm removedimg" funq="'+funq+'" flname="'+filename+'">Confirm</button> <button type="button" class="btn btn-default btn-sm"  data-dismiss="modal">Close</button>');
		        $('#modalimage').modal('show');
		        return false;
		    });

            $('body').on('click', '.removedimg', function() {
		      	 var flname = $(this).attr('flname');
		      	 var c 		= $(this).attr('funq');
		      
		        $.post('../controller/removeimg.php',{filename:flname},function(data){
	        	console.log(data);
						        $('#modalimage').modal('toggle'); 
							//setInterval(function(){
						        $('#fadeimg'+c).fadeOut(1000); 
							//},1000)
	            });
    		});


            $('#selecctall').click(function(event) {  //on click
                if (this.checked) { // check select status
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = true;  //select all checkboxes with class "checkbox1"              
                    });
                } else {
                    $('.checkbox1').each(function() { //loop through each checkbox
                        this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                    });
                }
            });





// User Account



var table = $('#example');

  table.dataTable( {
    "sAjaxSource": '../controller/fetchalluser.php',
    "bDeferRender": true,
    "bProcessing": true,
    "oLanguage": {            
      "bDeferRender": true,
      "bProcessing": true,
      "sProcessing": '<img src="../stylesheets/img/loading1.gif">'
    },                
    "aoColumns": [                                                                   
    {"mDataProp": "fullname", 'sTitle': 'Fullname'},
    {"mDataProp": "username", 'sTitle': ' Username'},
    {"mDataProp": null, "bSortable": false, 'sTitle': 'Action','mRender': function ( oObj ) {

     var del       = '<a uid="'+oObj.user_id+'"  fname="'+oObj.username+'" id="btndel" class="btn btn-danger btn-sm delete"> <span class="glyphicon glyphicon-trash"> </span></a>';
    /* var deac       = '<a uid="'+oObj.user_id+'"  fname="'+oObj.username+'" id="btndeac" class="btn btn-warning btn-sm deactivate"> <span class="glyphicon glyphicon-exclamation-sign"> </span></a>';*/

    	//return deac +' '+del;
    	return del;
      }},
     
    ], 

  });


/*Create*/

$('body').on('click', '.btnadduser', function () {


  var fullname  = $('.fullnamec').val();
  var username  = $('.usernamec').val();
  var password  = $('.passwordc').val();

  $.post('../controller/usercreate.php', {name:fullname, user:username, pass:password}, function(data) {
        setTimeout(function(){
          table.fnReloadAjax('../controller/fetchalluser.php');
          	$('#create').modal('hide');
        	$('.fullnamec, .usernamec, .passwordc, .cpasswordc').val("");
        	$('.fullnamec').focus();
      		$('.error-msg').removeAttr('style');
      		$('.error-msg').removeClass("alert-success");
      		$('.btnadduser').attr('disabled','disabled');
        },1000)

    });

});

/*Validate*/
 $('.btnadduser').attr('disabled', 'disabled');
 $(".fullnamec, .usernamec, .passwordc, .cpasswordc").on("keyup", function(e) {
      var name      = $(".fullnamenamec").val();
      var username  = $(".usernamec").val();
      var password  = $(".passwordc").val();
      var cpassword = $(".cpasswordc").val();

      if (name == '' || username == '' || password == '' || cpassword == '') {
         
          $(".error-msg").removeClass("alert-success");
          $(".error-msg").addClass("alert-danger");
          $(".error-msg").html("<h6 style='text-align:center'>Please fill all fields...!</h6>");
          $('.btnadduser').attr('disabled','disabled');

      } else if ((password.length) < 5) {
         
          $(".error-msg").removeClass("alert-success");
          $(".error-msg").addClass("alert-danger");
          $(".error-msg").html("<h6 style='text-align:center'>Password should atleast 5 character in length</h6>");
          $('.btnadduser').attr('disabled','disabled');
          
      } else if (!(password).match(cpassword)) {
          
          $(".error-msg").removeClass("alert-success");
          $(".error-msg").addClass("alert-danger");
          $(".error-msg").html("<h6 style='text-align:center'>Your password don't match. Please Try again!</h6>");
          $('.btnadduser').attr('disabled','disabled');
          
      } else if(password == cpassword){
         
          $(".error-msg").removeClass("alert-danger");
          $(".error-msg").addClass("alert-success").html("");

          $('.btnadduser').removeAttr('disabled');
          $('.btnadduser').removeClass('btn-default');
          $('.btnadduser').addClass('btn-primary');
              
      }
  });


  $(".usernamec").on('keyup', function(){ 
	  var username = $(".usernamec").val();
	  $("#availability_status").show();
	  $("#availability_status").html('Checking availability...');

	  	if($.trim(username)==''){
	  			$("#username").addClass("has-error");
			    $("#availability_status").addClass("alert-danger");
	  	}else{

    	$.ajax({    
		        type	:   "POST",  
		        url		:  	"../controller/check_username.php",  //file name
		        data 	:   "username="+ username,  //data
		        success : 	function(server_response){  
       
			        if(server_response == 0)
			        { 
			         	$("#availability_status").addClass("alert-success");
				        $("#availability_status").html('<h6"> Success!</h6> ');
				        $("#availability_status").fadeOut(2000);
				        $('.fullnamec, .passwordc, .cpasswordc').removeAttr('disabled');
			        	$("#username").removeClass("has-error");
			        	$("#availability_status").removeClass("alert-danger");
			        
			        }  
			        else  if(server_response == 1)//if returns "1"
			        {  
			         $("#username").addClass("has-error");
			         $("#availability_status").addClass("alert-danger");
			         $("#availability_status").html('<h6> Username already in use...! </h6>');
			         $('.fullnamec, .passwordc, .cpasswordc').attr('disabled','disabled');
          			 $('.btnadduser').attr('disabled','disabled');

			        }  
       
       		} 
      }); //end of ajax
 	} //end of if else statement
 
  return false;
  });




/*Delete*/
	  $('#messagedelete').hide();
	  $('body').on('click', '#btndel', function(e) {
	    e.preventDefault();

	      uid = $(this).attr('uid');
	      $('#deleteModal .modal-body').html('<h6 style="text-align:center">Are you sure you want to delete ' + $(this).attr('fname') + '?</h6>');
	      $('#deleteModal').modal('show');

	       return false;
	  });

	  $('body').on('click', '#btnConfirm', function() {

	     $.post('../controller/userdelete.php',{id:uid},function(data){
	        $('#messagedelete').show().fadeOut(2000);
	        $('#messagedelete').html('<div class="alert alert-danger text-center"><button type="button" class="close btn-xs" data-dismiss="alert" aria-hidden="true">&times;</button>Deleted!</div>');
	        setTimeout(function(){
	               table.fnReloadAjax('../controller/fetchalluser.php');
	          $('#deleteModal').modal('hide');
	         },1000)

	      });

	  });





$('.btnupdate').attr('disabled', 'disabled');
 $("#fullname, #username, #password, #cpassword").on("keyup", function(e) {
      var name      = $("#fullname").val();
      var username  = $("#username").val();
      var password  = $("#password").val();
      var cpassword = $("#cpassword").val();

      if (name == '' || username == '' || password == '' || cpassword == '') {
         
          $(".error-msgupdate").removeClass("alert-success");
          $(".error-msgupdate").addClass("alert-danger");
          $(".error-msgupdate").html("<h6 style='text-align:center'>Please fill all fields...!</h6>");
          $('.btnupdate').attr('disabled','disabled');

      } else if ((password.length) < 5) {
         
          $(".error-msgupdate").removeClass("alert-success");
          $(".error-msgupdate").addClass("alert-danger");
          $(".error-msgupdate").html("<h6 style='text-align:center'>Password should atleast 5 character in length</h6>");
          $('.btnupdate').attr('disabled','disabled');
          
      } else if (!(password).match(cpassword)) {
          
          $(".error-msgupdate").removeClass("alert-success");
          $(".error-msgupdate").addClass("alert-danger");
          $(".error-msgupdate").html("<h6 style='text-align:center'>Your password don't match. Please Try again!</h6>");
          $('.btnupdate').attr('disabled','disabled');
          
      } else if(password == cpassword){
         
          $(".error-msgupdate").removeClass("alert-danger");
          $(".error-msgupdate").addClass("alert-success").html("");

          $('.btnupdate').removeAttr('disabled');
          $('.btnupdate').removeClass('btn-default');
          $('.btnupdate').addClass('btn-primary');
              
      }
  });


$('body').on('click', '.btnupdate', function () {


  var fullname  = $('#fullname').val();
  var username  = $('#username').val();
  var password  = $('#password').val();

  $.post('../controller/userupdate.php', {name:fullname, user:username, pass:password}, function(data) {
        setTimeout(function(){
         // table.fnReloadAjax('../controller/fetchalluser.php');
          	$('#update').modal('hide');
        	$('#password, #cpassword').val("");
        	$('#fullname').focus();
      		$('.error-msgupdate').removeAttr('style');
      		$('.error-msgupdate').removeClass("alert-success");
      		$('.btnupdate').attr('disabled','disabled');
      		$('#adminname').text(username);
        },1000)

    });

});



 		var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');

	
}); //end of document


// images.php function


$(function() {
		$('.uploadify').attr('accept', '.jpg, .jpeg, .png');
		$('#file_upload').uploadify({
			'formData'	: {
				'img' 	: $('#file_upload').val()
			},
			'uploader' : '../controller/uploadimage.php',
			'onUploadSuccess' : function(file, data, response) {
				$('.picmsg').html(data);
		      		setTimeout(function(){
					        $('#uploadimg').modal('hide');  
					        location.reload();
						},3000)

        }
		});
	});






