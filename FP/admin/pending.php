<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
   $pend= new Contact();
?>
<?php
   if (isset($_GET['delid'])) {
      $id = $_GET['delid'];
      $delContact = $pend->deletePendById($id);
   }
?>
<!--heder end here-->
<!--inner block start here-->
<div class="inner-block">
    <div class="blank">
    	 <h2>Order List</h2>
      	 <div class="blankpage-main">
      <?php
        if (isset($delContact)) {
          echo $delContact;
        }
      ?>     
           <table class="table table-hover">
              <thead style="background-color: #666666; color: white ">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Site URL</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
      <?php
        $getContact = $pend->getAllPend();
        if ($getContact) {
          $i = 1;
          while ($result = $getContact->fetch_assoc()) {
      ?>
                <tr>
                  <td><?php echo $i;$i++; ?></td>
                  <td><?php echo $result['name']; ?></td>
                  <td><?php echo $result['email'];?></td>
                  <td><?php echo $result['url']; ?></td>
                  <td><a onclick="return confirm('Are Sure to Delete!')" href="?delid=<?php echo $result['PID']; ?>"><i class="fa fa-trash fa-lg" style="color: red"></i></a></td>
                </tr>
          <?php } } ?>     
              </tbody>
            </table>
         </div>
    </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include 'inc/copyright.php';?>	
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <?php include 'inc/sidebar.php';?>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js2/jquery.nicescroll.js"></script>
		<script src="js2/scripts.js"></script>
		<!--//scrolling js-->
<script src="js2/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
