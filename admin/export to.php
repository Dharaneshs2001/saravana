<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "soap");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM ordertrackhistory";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                   <tr>
                    <th>id</th>
                     <th> OrderId</th>
                                                       
                 <th>Status</th>
 
               <th>Remark</th>
     <th>PostingDate</th>
         </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id"].'</td>
                         <td>'.$row["orderId"].'</td>  
                         <td>'.$row["status"].'</td>  
                         <td>'.$row["remark"].'</td>  
       <td>'.$row["postingDate"].'</td>  
      
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>