<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>multiple file delete</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>
    <style>
        .imageedit{
            height: 100px;
     padding: 100 55 100 50px;
        }
    </style>

</head>
<body>

<form name="bulk_action_form" method="post" id = "sub" onSubmit="return delete_confirm();"/>
    <table class="bordered">
        <thead>
        <tr>
            <th><input type="checkbox" id="select_all" value=""/></th>        
            <th>id</th>
            <th>meal_name</th>
            <th>price</th> 
        </tr>
        </thead>
        <?php
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "db" ); 
        $query = mysqli_query($connection, "select * from meal_manue");
            while($row = $query->fetch_assoc()){
        ?>
		
        <tr>
            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>        
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['meal_name']; ?></td>
            <td><?php echo $row['price']; ?></td>
			<?php
			?>
        </tr>
        <?php }  ?>
        <?php ?>
    </table>
    <input type="submit" class="btn btn-danger" id="ondelete" name="bulk_delete_submit"
     value="Submit"/>
</form>
</body>
</html>
<script>
    $(document).ready(function(){
  $("#ondelete").click(function(){
    
    var c = ($(":checkbox:checked").length);
    alert("You have selected " + c + " meals");
  });
});
		function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure you want to order these meals");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
    // history.go(0);
    
}
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>