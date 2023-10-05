<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
  
  <style>
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center"></h2>
   <br /><br />
   <div class="row">
    <div class="col-md-6">
    	
     <h3 align="center"><u>Add New User</u></h3>
     <br />
     <form method="post" id="treeview_form">
      <div class="form-group">
       <label>Select Parent User</label>
       <select name="parent_user" id="parent_user" class="form-control">
       
       </select>
      </div>
      <div class="form-group">
       <label>Enter User Name</label>
       <input type="text" name="user_name" id="user_name" class="form-control">
      </div>
      <div class="form-group">
       <input type="submit" name="action" id="action" value="Add" class="btn btn-success" required />
      </div>
     </form>
    </div>
    <div class="col-md-6">
     <h3 align="center"><u>Users Tree</u></h3>
     <br />
     <div id="treeview"></div>
    </div>
   </div>
  </div>




  
 </body>
</html>
<script>
 $(document).ready(function(){

  fill_parent_user();

  fill_treeview();
  
  function fill_treeview()
  {
   $.ajax({
    url:"fetch.php",
    dataType:"json",
    success:function(data){
     $('#treeview').treeview({
      data:data
     });
    }
   })
  }

  function fill_parent_user()
  {
   $.ajax({
    url:'fill_parent_user.php',
    success:function(data){
     $('#parent_user').html(data);
    }
   });
   
  }



  $('#treeview_form').on('submit', function(event){
   event.preventDefault();
   var name = $('#user_name').val(); 
   if(name != '' ) 
			  {
				   $.ajax({
				    url:"add.php",
				    method:"POST",
				    data:$(this).serialize(),
				    success:function(data){
				     fill_treeview();
				     fill_parent_category();
				     $('#treeview_form')[0].reset();
				     alert(data);
				    }
				   })
				}else{
					alert("User Name Fields are Required");
				}

  });
 });
</script>