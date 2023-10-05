<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div align="right">
    <button type="button" id="modal_button" class="btn btn-info">Create Records</button>
    <!-- It will show Modal for Create new Records !-->
   </div>



<!-- This is Customer Modal. It will be use for Create new Records and Update Existing Records!-->
<div id="customerModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Add New Members </h4>
   </div>
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
 </div>
</div>
<script type="text/javascript">
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

  

  $('#modal_button').click(function(){
			  $('#customerModal').modal('show'); 
			  	function fill_parent_user()
				  {
				   $.ajax({
				    url:'fill_parent_user.php',
				    success:function(data){
				     $('#parent_user').html(data);
				    }
				   });
				   
				  }
			 });



  
 });
</script>
</body>
</html>