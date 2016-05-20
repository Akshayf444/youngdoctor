<?php
$attribute = array('id' => 'valid');
echo form_open('User/addDoctor');
?>


<div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
    <div class="form-group">
        <input type="text" class="form-control" value="" name="Doctor_Name" placeholder="Doctor Name" />
    </div>
    <div class="form-group">
        <input type="text" class="form-control" value="" name="MSL_Code" placeholder="MSL Code" /> </div>
    <div class="form-group">
        <input type="text" class="form-control" value="" name="address" placeholder="Clinic Address"/> </div>
    <div class="form-group">
        <input type="text" class="form-control" value="" name="Mobile_Number" placeholder="Mobile "/> </div>
    <div class="form-group">
        <input type="text" class="form-control" value="" name="email" placeholder="Email"/> </div>
    <div class="form-group">
       <select  class="form-control" name="Years_Practice" >
            <option value="">Select Years Of Practice</option>
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
               </select> 
        </div>
    <div class="form-group">
        <input type="text" class="form-control" value="" id="date" name="DOB" placeholder="Date Of Birth"/></div>
    <div class="form-group">
        <input type="text" class="form-control" value="" id="date1" name="ANNIVERSARY" placeholder="Clinic Anniversary"/></div>
    <div class="form-group">
        <input type="text" class="form-control" value="" name="ClipaSerice" placeholder=" Name Of Clipa Services"/> </div>
    <div class="form-group">
        FITB DONE &nbsp; <input type="radio" name="FITB" value="Yes" />Yes
         <input type="radio" name="FITB" value="No" /> No
        
    </div>


    <button class="btn btn-block btn-success " type="submit">Save</button>
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
            $(function () {
            $("#date1").datepicker({
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
            message: 'The VEEVA Employee ID is required'
            }
            }
            },
                    MSL_Code: {
                    validators: {
                    notEmpty: {
                    message: 'The Local Employee ID is required'
                    }
                    }
                    },
                    address: {
                    validators: {
                    notEmpty: {
                    message: 'The  First Name is required'
                    }
                    }
                    },
                    Moblie_Number: {
                    validators: {
                    notEmpty: {
                    message: 'Please Enter Username'
                    }
                    }
                    },
                    email: {
                    validators: {
                    notEmpty: {
                    message: 'The Last Name is required'
                    }
                    }
                    },
                    Years_Practice: {
                    validators: {
                    notEmpty: {
                    message: 'The Full Name is required'
                    }
                    }
                    },
                    DOB: {
                    validators: {
                    notEmpty: {
                    message: 'The Territory is required'
                    }
                    }
                    },
                    ANNIVERSARY: {
                    validators: {
                    notEmpty: {
                    message: 'The Email Id is required'
                    }
                    }
                    },
                    ClipaSerice: {
                    validators: {
                    notEmpty: {
                    message: 'Please Select Division'
                    }
                    }
                    },
                
                    FITB: {
                    validators: {
                    notEmpty: {
                    message: 'The  Reporting To is required'
                    }
                    }
                    },
            }

    });
    });
</script>

