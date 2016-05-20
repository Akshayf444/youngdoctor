<div class="panel panel-default">
    <div class="panel-body ">
        <?php
        $attributes = array('method' => 'GET');
        echo form_open('User/view_pgdoctor', $attributes);
        ?>
        <select name="id" class="btn btn-default">
            <option value="-1">Select Institution </option>
            <?php echo $Institution; ?>
           
        </select>
        
        <button type="submit" class="btn btn-primary">Fetch</button>
        </form>
          
    </div>
</div>


<a download="Doctor<?php // echo date('dM g-i-a');       ?>.xls" class="btn btn-success  " href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheeting');"><i class="fa fa-arrow-circle-o-right"></i> Export to Excel </a>

<table class="table table-bordered table-hover panel" id="datatable">
    <thead>
        <tr>
            <th>Sr.</th>
            <th>State</th>
            <th>Region</th>
            <th>Doctor Name</th>
            <th>MSL_Code</th>
            <th>address</th>
            <th>Institution</th>
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
        $count=1;
        if (!empty($show)) {
            foreach ($show as $row) :
               
                ?><tr>  
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row->State; ?></td>
                    <td><?php echo $row->Region; ?></td>
                    <td><?php echo $row->Doctor_Name; ?></td>  
                    <td><?php echo $row->MSL_Code; ?> </td> 
                    <td><?php echo $row->address; ?></td>  
                    <td><?php echo $row->Institution; ?></td>
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
                        <a class="fa fa-trash-o btn-danger btn-xs" class=""  onclick="deletedoc('<?php echo site_url('User/pgdoc_del?id=') . $row->DoctorId; ?>')"></a> 
                      <!--<a class="fa fa-pencil btn-success btn-xs" onclick="window.location = '<?php echo site_url('User/pgdoc_update?id=') . $row->DoctorId; ?>';"></a>-->                                 
                        
                    </td>
                   
                </tr>
                <?php
            endforeach;
        }
        ?>
    </tbody>
</table>

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