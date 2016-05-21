<div class="row">
    <div class="col-xs-12 ">
        <div class="panel">
            <?php
            $attributes = array('method' => 'GET');
            echo form_open('User/view_pgdoctor', $attributes);
            ?>
            <select name="id" class="btn btn-default">
                <option value="">Select Institution </option>
                <?php echo $Institution; ?>
            </select>
            <?php echo isset($tmlist) ? $tmlist : ''; ?>
            <a download="Doctor<?php echo date('dM g-i-a'); ?>.xls" class="btn btn-success" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheeting');"><i class="fa fa-arrow-circle-o-right"></i> Export</a>
            <button type="submit" class="btn btn-primary">Fetch</button>
            </form>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 table-responsive" >
        <table class="table table-bordered table-hover panel" id="datatable">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>State</th>
                    <th>Region</th>
                    <th>Doctor Name</th>
                    <th>MSL Code</th>
                    <th>address</th>
                    <th>Institution</th>
                    <th>Mobile Number</th>
                    <th>email</th> 
                    <th>Years Of Practice</th> 
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
                            <td data-title="Sr"><?php echo $count++; ?></td>
                            <td data-title="State"><?php echo $row->State; ?></td>
                            <td data-title="Region"><?php echo $row->Region; ?></td>
                            <td data-title="Doctor Name"><?php echo $row->Doctor_Name; ?></td>  
                            <td data-title="MSL Code"><?php echo $row->MSL_Code; ?> </td> 
                            <td data-title="Address"><?php echo $row->address; ?></td>  
                            <td data-title="Institution"><?php echo $row->Institution; ?></td>
                            <td data-title="Mobile Number"><?php echo $row->Mobile_Number; ?></td>
                            <td data-title="Email"><?php echo $row->email; ?></td>  
                            <td data-title="Years Of Practice"><?php echo $row->Years_Practice; ?></td>
                            <td data-title="DOB"><?php echo $row->DOB; ?></td>   
                            <td data-title="Clinic Anniversary"><?php echo $row->ANNIVERSARY; ?></td>
                            <td data-title="Name Of Clipa Services"><?php echo $row->CiplaSerice; ?></td>
                            <td data-title="FITB Done"><?php echo $row->FITB; ?></td>
                            <td data-title="BM"><?php echo $row->BM_Name; ?></td>
                            <td data-title="SM"><?php echo $row->SM_Name; ?></td>
                            <td data-title="Action">  
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