<?php
    require '../dataserver.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet"  href="../css/style.css" >
    
</head>
 
    <body>
        <table  id="styles"> 
            <thead>
                <tr>
                    <th style="text-align:center;color: black;">Service No</th>
                    <th style="text-align:center;color: black;">Issue Date</th>
                    <th style="text-align:center;color: black;">Status</th>
                    <th style="text-align:center;color: black;" >Descriptions</th>
                            
                </tr>
            </thead>
            <tbody>
                <?php 
                    $student_id =$DB->get_Student_ID($id); 
                    if($student_id==null){
                        echo '<b><p >Please swipe Student ID</p></b>';
                        return;
                    }     
                    $query =$DB->library_service($student_id);
                    $i=mysqli_num_rows($query);
                    while($data = $query->fetch_assoc())
                    { ?>
                            <tr>
                                <td align="center"><?php echo $i; ?></td>
                                <td align="center"><?php echo $data['service_date']; ?></td>
                                <td align="center"><?php if($data['status']){echo "Due";}else echo "Returned"; ?></td>
                                <td align="center">
                                    <!--<button value="<?php echo $data['id']; ?>" type="submit" class="details_btn" onclick="openpopup()">details</button>-->
                                     <a href="details.php?details_id=<?php echo $data['id']; ?> "> <button type="submit" class="details_btn">details</button></a> 
                                </td>
                              </tr> <?php
                            $i-- ;                                    
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>