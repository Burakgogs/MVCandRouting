$(document).ready(function() {
    $('#example').DataTable({
      "fnCreatedRow": function( nRow, aData, iDataIndex ) {
        $(nRow).attr('id', aData[0]);
      },
      'serverSide':'true',
      'processing':'true',
      'paging':'true',
      'order':[],
      'ajax': {
        'url':'fetch_data.php',
        'type':'post',
      },
      "columnDefs": [{
        'target':[5],
        'orderable' :false,
      }]
    });
  } );
  $(document).on('submit','#addUser',function(e){
    e.preventDefault();

    var city= $('#addCityField').val();
    var name= $('#addUserField').val();
    var mobile= $('#addMobileField').val();
    var email= $('#addEmailField').val();
    var photo=$('#addPhotoField').val();
    
    if(city != '' && name != '' && mobile != '' && email != '' && photo !='')
    {
     $.ajax({
       url:"add_user.php",
       type:"post",
       data:{city:city,name:name,mobile:mobile,email:email,photo:photo},
       success:function(data)
       {
         var json = JSON.parse(data);
         var status = json.status;
         if(status=='true')
         {
          mytable =$('#example').DataTable();
          mytable.draw();
          $('#addUserModal').modal('hide');
        }
        else
        {
          alert('failed');
        }
      }
    });
   }
   else {
    alert('Fill all the required fields');
  }
});
  $(document).on('submit','#updateUser',function(e){
    e.preventDefault();
  
     var city= $('#cityField').val();
     var name= $('#nameField').val();
     var mobile= $('#mobileField').val();
     var email= $('#emailField').val();
   
     var trid= $('#trid').val();
     var id= $('#id').val();
     if(city != '' && name != '' && mobile != '' && email != '' )     {
       $.ajax({
         url:"update_user.php",
         type:"post",
         data:{city:city,name:name,email:email,mobile:mobile,id:id},
       
         success:function(data) {
           console.log(data);
           var json = JSON.parse(JSON.stringify(data));
           var status = json.status;
           if(status=='true')   {
            table =$('#example').DataTable();
           
            var button =   '<td><a href="javascript:void();" data-id="' +id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!" data-bs-toggle="modal" data-id="' +id + '" data-bs-target="#exampleModal" class="btn btn-danger btn-sm">Delete</a></td>';
            var row = table.row("[id='"+trid+"']");
            row.row("[id='" + trid + "']").data([id,name,email,mobile,city,button]);
            $('#exampleModal').modal('hide');
          }
          else {
            alert('failedeiaiea');
          }
        }
      });
     }
     else {
      alert('Fill all the required fields');
    }
  });
  $('#example').on('click','.editbtn ',function(event){
    var table = $('#example').DataTable();
    var trid = $(this).closest('tr').attr('id');
  
   var id = $(this).data('id');
   $('#exampleModal').modal('show');

   $.ajax({
    url:"get_single_data.php",
    data:{id:id},
    type:'post',
    success:function(data)
    {
     var json = JSON.parse(data);
     $('#nameField').val(json.name);
     $('#emailField').val(json.email);
     $('#mobileField').val(json.mobile);
     $('#cityField').val(json.city);
     $('#id').val(id);
     $('#trid').val(trid);
   }
 })
 });

  $(document).on('click','.deleteBtn',function(event){
     var table = $('#example').DataTable();
    event.preventDefault();
    var id = $(this).data('id');
    if(confirm("Urunu silmek istediginizden emin misiniz? "))
    {
    $.ajax({
      url:"delete_user.php",
      data:{id:id},
      type:"post",
      success:function(data)
      {
        var json = JSON.parse(data);
        status = json.status;
        if(status=='success')
        {
        
           $("#"+id).closest('tr').remove();
        }
        else
        {
          alert('Failed');
          return;
        }
      }
    });
    }
    else
    {
      return null;
    }



  })
  $(document).ready(function (e) {
    $("#form").on('submit',(function(e) {
     e.preventDefault();
     $.ajax({
            url: "add_user.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
            cache: false,
      processData:false,
      beforeSend : function()
      {
      $("#err").fadeOut();
      },
      success: function(data)
         {
       if(data=='invalid')
       {
     
        $("#err").html("Invalid File !").fadeIn();
       }
       else
       {
   
        $("#preview").html(data).fadeIn();
        $("#form")[0].reset(); 
       }
         },
        error: function(e) 
         {
       $("#err").html(e).fadeIn();
         }          
       });
    }));
   });