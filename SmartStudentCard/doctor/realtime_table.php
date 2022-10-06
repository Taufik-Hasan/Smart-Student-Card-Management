<?php
    require ("../dataserver.php");
    if(!isset($_SESSION['SSC_user'])){
        require('../include/error.php');
        return;
    }
    else{
        if($DB->current_user->user_type!="Doctor"){

            require('../include/error.php');
            return;
        }
    }
?>

<table  id="styles"> 
                <thead>
                    <tr>
                        <th style="text-align:center;color: black;">Service No</th>
                        <th style="text-align:center;color: black;">Service Date</th>
                        <th style="text-align:center;color: black;" >Descriptions</th>
                                
                    </tr>
                </thead>
            	<tbody>
                    <?php 
                    	$student_id_v="194095";       
                        $query =$DB->medical_service($student_id_v);
                    	$i=mysqli_num_rows($query);$j=1;
                        while($data = $query->fetch_assoc() AND $j<=8)
                        {
                            echo '<tr>
                                    <td align="center">'.$i.'</td>
                                    <td align="center">'.$data['service_date'].'</td>
                                    <td align="center"><button>details</button></td>
                                  </tr>'; 
                                $i-- ;$j++;                                    
                        }
                    ?>
        </tbody>
</table>