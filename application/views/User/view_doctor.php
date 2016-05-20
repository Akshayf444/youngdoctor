<table class="table table-bordered table-hover panel" id="datatable">
    <thead>
        <tr>
            <th>Sr.</th>
            <th>State</th>
            <th>Region</th>
            <th>Doctor Name</th>
            <th>MSL_Code</th>
            <th>address</th>
            <th>Mobile_Number</th>
            <th>email</th> 
            <th>Years_Practice</th> 
            <th>DOB</th>
            <th>Clinic Anniversary</th>
            <th>Name Of Clipa Services</th>
            <th>FITB Done</th>
            <th>BM</th>
            <th>SM</th>


        </tr>
    </thead>
    <tbody>
        <?php
        $count=0;
        if (!empty($show)) {
            foreach ($show as $row) :
                ?><tr>  
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row->State; ?></td>
                    <td><?php echo $row->Region; ?></td>
                    <td><?php echo $row->Doctor_Name; ?></td>  
                    <td><?php echo $row->MSL_Code; ?> </td> 
                    <td><?php echo $row->address; ?></td>  
                    <td><?php echo $row->Division; ?></td>
                    <td><?php echo $row->Mobile_Number; ?></td>
                    <td><?php echo $row->email; ?></td>  
                    <td><?php echo $row->Years_Practice; ?></td>
                    <td><?php echo $row->DOB; ?></td>   
                    <td><?php echo $row->Anniversary; ?></td>
                    <td><?php echo $row->ClipaSericer; ?></td>
                    <td><?php echo $row->BM; ?></td>
                    <td><?php echo $row->SM; ?></td>

                    <td><?php
                        if ($row->Statuss == '1') {
                            echo 'Active';
                        } if ($row->Statuss == 'locked') {
                            echo 'Locked';
                        } if ($row->Statuss == '0') {
                            echo 'InActive';
                        }

                        ;
                        ?></td>
                    <td>  
                        <a class="fa fa-trash-o btn-danger btn-xs" class=""  onclick="deleteEmp('<?php echo site_url('admin/emp_del?id=') . $row->VEEVA_Employee_ID; ?>')"></a> 
                        <a class="fa fa-pencil btn-success btn-xs" onclick="window.location = '<?php echo site_url('admin/update_emp?id=') . $row->VEEVA_Employee_ID; ?>';"></a>                                 
                    </td>
                    <td><?php if ($row->Profile == 'ASM') { ?>
                            <a class="btn btn-primary btn-xs"  onclick="window.location = '<?php echo site_url('admin/assign_reporting_to?type=BDM&id=') . $row->VEEVA_Employee_ID . '&name=' . $row->Full_Name; ?>';">Assign BDM</a> 
                        <?php } elseif ($row->Profile == 'ZSM') { ?>
                            <a class="btn btn-primary btn-xs"  onclick="window.location = '<?php echo site_url('admin/assign_reporting_to?type=ASM&id=') . $row->VEEVA_Employee_ID . '&name=' . $row->Full_Name; ?>';">Assign ASM</a> 
                        </td>
                    <?php } ?>

                    <td><?php if ($row->Profile == 'BDM') { ?><a class="fa fa-user-md btn btn-link btn-xs btn-warning" class=""  onclick="window.location = '<?php echo site_url('admin/emp_doc?id=') . $row->VEEVA_Employee_ID; ?>';"></a> <?php } ?></td>
                </tr>
                <?php
            endforeach;
        }
        ?>
    </tbody>
</table>

<script>
    var oTable = $('#datatable').dataTable({
        "bPaginate": false,
        "bInfo": false,
        "info": false,
        "columnDefs": [
            {
                "visible": false
            }
        ]
    });
</script>
<script>
    function deletemember(id) {
        var r = confirm("Are you sure you want to delete");
        if (r == true)
        {
            $.ajax({
                type: "GET",
                url: "delete_members.php",
                data: ({id: id}),
                success: function (data)
                {
                    window.location = "yourphppage.php";
                }
            });

        }
        else
        {
            window.location = "index.php";
        }
    }

    function deleteEmp(url) {
        var r = confirm("Are you sure you want to delete");
        if (r == true)
        {
            window.location = url;

        }
        else
        {
            return false;
        }
    }

</script>
