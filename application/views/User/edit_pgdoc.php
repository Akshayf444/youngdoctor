<?php
$attribute = array('id' => 'valid');
echo form_open('User/update_pgdoc?id='. $rows->DoctorId, $attribute);
?>


<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <input type="hidden" class="form-control" value="<?php echo $rows->DoctorId?>" name="DoctorId"  />
    <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $rows->Doctor_Name?>" name="Doctor_Name" placeholder="Doctor Name" />
    </div>
    <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $rows->MSL_Code; ?>" name="MSL_Code" placeholder="MSL Code" /> </div>
    <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $rows->address; ?>" name="address" placeholder="Clinic Address"/> </div>
    <div class="form-group">
        <input type="number" class="form-control" value="<?php echo $rows->Mobile_Number; ?>" name="Mobile_Number" placeholder="Mobile "/> </div>
    <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $rows->email; ?>" name="email" placeholder="Email"/> </div>
     <div class="form-group">
         <input type="text"  class="form-control" value="<?php echo $rows->Institution;?>" name="Institution" placeholder="Institution" >
           
        </div>
    <div class="form-group">
        <input type="text"  value="<?php echo $rows->Region; ?>" class="form-control" name="Region" placeholder="Region" >
           
        </div>	
    <div class="form-group">
        <input type="text" value="<?php echo $rows->State; ?>" class="form-control" name="State" placeholder="State" >
                </div>	
     
    <div class="form-group">
        <div class="form-group">
            <input type="text"  class="form-control" name="Years_Practice" placeholder="No.Of years" value="<?php echo $rows->Years_Practice ?>" >
           
        </div>
    </div>
               
        
    <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $rows->DOB; ?>" id="date" name="DOB" placeholder="Date Of Birth"/></div>
    <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $rows->ANNIVERSARY; ?>" id="date1" name="ANNIVERSARY" placeholder="Clinic Anniversary"/></div>
    <div class="form-group">
        <input type="text" class="form-control" value="<?php echo $rows->CiplaSerice; ?>" name="ClipaSerice" placeholder=" Name Of Clipa Services"/> </div>
    <div class="form-group">

     FITB DONE &nbsp; 

        <input name="FITB" type="radio" value="Yes" <?php if ($rows->FITB == 'Yes') {
            echo "checked";
        } ?> > YES
        <input name="FITB" type="radio"  value="No" <?php if ($rows->FITB == 'No') {
            echo "checked";
        } ?> > No

    </div>


    <button class="btn btn-block btn-success " type="submit">Update</button>
</div>
</div>
</form>
<script>
    $(function () {
    $("#date1").datepicker({
    changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
    });
           
            $("#date").datepicker({
            changeMonth: true,
                    changeYear: true,
                    dateFormat: 'yy-mm-dd'
            });
            });</script>

<script src="<?php echo asset_url() ?>js/formValidation.min.js" type="text/javascript"></script>
<script src="<?php echo asset_url() ?>js/bootstrap.min.js" type="text/javascript"></script>
<script>
    $('document').ready(function () {
        $('#valid').formValidation({
            icon: {
            },
            fields: {
                Doctor_Name: {
                    validators: {
                        notEmpty: {
                            message: 'The Doctor_Name  is required'
                        }
                    }
                },
                MSL_Code: {
                    validators: {
                        notEmpty: {
                            message: 'The MSL_Code is required'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'The  Address is required'
                        }
                    }
                },
                Mobile_Number: {
                    validators: {
                        notEmpty: {
                            message: 'Moblie_Number is required'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The Email is required '
                        }
                    }
                },
                Years_Practice: {
                    validators: {
                        notEmpty: {
                            message: 'The Years_Practice is required'
                        }
                    }
                },
                DOB: {
                    validators: {
                        notEmpty: {
                            message: 'The DOB is required'
                        }
                    }
                },
                ANNIVERSARY: {
                    validators: {
                        notEmpty: {
                            message: 'The ANNIVERSARY is required'
                        }
                    }
                },
                ClipaSerice: {
                    validators: {
                        notEmpty: {
                            message: 'ClipaService is required'
                        }
                    }
                },
                Institution: {
                    validators: {
                        notEmpty: {
                            message: 'Institution is required'
                        }
                    }
                },
                State: {
                    validators: {
                        notEmpty: {
                            message: 'State is required'
                        }
                    }
                },
                Region: {
                    validators: {
                        notEmpty: {
                            message: 'Region is required'
                        }
                    }
                },
                
                Degree: {
                    validators: {
                        notEmpty: {
                            message: 'Degree is required'
                        }
                    }
                },
                FITB: {
                    validators: {
                        notEmpty: {
                            message: 'FITB is required'
                        }
                    }
                },
            }

        });
    });
</script>