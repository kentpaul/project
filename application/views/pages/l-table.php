<table class="table" id="member">
                    <tr>
                        <th>#</th>
                        <th>Account No.</th>
                        <th>Name</th>
                        <th>Date Created</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>


                    <?php
                    if($res->num_rows()>0){
                        $count=1;
                    $counter=1;
                    foreach ($res->result() as $row){
                        if($counter==1){
                            $num = "color";
                            $counter=0;
                        }
                        else{
                            $num = "none";
                            $counter=1;
                        }

                        echo "<tr id='col' class=".$num."><td>".$count."</td>";
                        echo "<td>".$row->account_number."</td>";
                        echo "<td><a href=''>".ucfirst($row->FirstName)." ".ucfirst($row->MiddleName)." ".ucfirst($row->LastName)."</a></td>";
                        echo "<td>".$row->date_created."</td>";
                        echo "<td>".$row->Status."</td>";
                        $count++;
                        
                    ?>
                    <td>
                        <!-- <a href="" style="width: 30%" class="btn btn-success">Deposit</a> -->
                        <a href="javascript:confirmDelete('<?=base_url("cashier/delete/".$row->MemberAccountID); ?>')" class="btn btn-danger">Delete</a>
                    </td>
                    <?php } ?>
                    <?php }else{
                        echo "<tr><td>0 Results<td>";
                    }?> 
                    </tr>

                </table>
               