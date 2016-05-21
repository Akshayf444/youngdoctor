<div class="row">
<div class="col-lg-12">

    <a download="Doctor<?php // echo date('dM g-i-a');         ?>.xls" class="btn btn-success  " href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheeting');"><i class="fa fa-arrow-circle-o-right"></i> Export to Excel </a>
</div>

<div class="col-lg-12">
    <table class="table table-bordered table-hover panel" id="datatable">
        <thead>
            <tr>
                <th>Sr.</th>
                <th>State</th>
                <th>Region</th>
                <th>Doctor Name</th>
                <th>MSL_Code</th>
                <th>address</th>
                <th>Passout College</th>
                <th>Degree</th>
                <th>Mobile_Number</th>
                <th>email</th> 
                <th>Years_Practice</th> 
                <th>DOB</th>
                <th>Clinic Anniversary</th>
                <th>Name Of Clipa Services</th>
                <th>FITB Done</th>
                <th>BM</th>
                <th>SM</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            if (!empty($show)) {
                foreach ($show as $row) :
                    ?><tr>  
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $row->State; ?></td>
                        <td><?php echo $row->Region; ?></td>
                        <td><?php echo $row->Doctor_Name; ?></td>  
                        <td><?php echo $row->MSL_Code; ?> </td> 
                        <td><?php echo $row->address; ?></td>  
                        <td><?php echo $row->Passoutcollege; ?></td> 
                        <td><?php echo $row->Degree; ?></td> 
                        <td><?php echo $row->Mobile_Number; ?></td>
                        <td><?php echo $row->email; ?></td>  
                        <td><?php echo $row->Years_Practice; ?></td>
                        <td><?php echo $row->DOB; ?></td>   
                        <td><?php echo $row->ANNIVERSARY; ?></td>
                        <td><?php echo $row->CiplaSerice; ?></td>
                        <td><?php echo $row->FITB; ?></td>
                        <td><?php echo $row->BM_Name; ?></td>
                        <td><?php echo $row->SM_Name; ?></td>


                        <td>  
                            <a class="fa fa-trash-o btn-danger btn-xs" class=""  onclick="deletedoc('<?php echo site_url('User/youngdoc_del?id=') . $row->DoctorId; ?>')"></a> 
                        <a class="fa fa-pencil btn-success btn-xs" onclick="window.location = '<?php echo site_url('User/youngdoc_update?id=') . $row->DoctorId; ?>';"></a>                               

                        </td>

                    </tr>
                    <?php
                endforeach;
            }
            ?>
        </tbody>
    </table>
</div>
</div>
<script>
    function deletedoc(url) {
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