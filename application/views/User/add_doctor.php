<?php
$attribute = array('id' => 'valid');
echo form_open('User/addDoctor', $attribute);
?>


<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
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
        <input type="text"  class="form-control" name="Degree" placeholder="Degree" >
    </div>	    
    <div class="form-group">
        <input type="text"  class="form-control" name="Passoutcollege" required="required" placeholder=" Passout College" >
    </div>	
    <div class="form-group">
        <input type="text"  class="form-control" name="Region" placeholder="Region" >

    </div>	
    <div class="form-group">
        <input type="text"  class="form-control" name="State" placeholder="State" >
    </div>	

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
<<<<<<< HEAD
                            message: 'The VEEVA Employee ID is required'
=======
                            message: 'The Doctor_Name  is required'
>>>>>>> 173f3cb92dc977492ce21b6bd2d6e8735c654103
                        }
                    }
                },
                MSL_Code: {
                    validators: {
                        notEmpty: {
<<<<<<< HEAD
                            message: 'The Local Employee ID is required'
=======
                            message: 'The MSL_Code is required'
>>>>>>> 173f3cb92dc977492ce21b6bd2d6e8735c654103
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
<<<<<<< HEAD
                            message: 'The  First Name is required'
                        }
                    }
                },
                Moblie_Number: {
                    validators: {
                        notEmpty: {
                            message: 'Please Enter Username'
=======
                            message: 'The  Address is required'
                        }
                    }
                },
                Mobile_Number: {
                    validators: {
                        notEmpty: {
                            message: 'Moblie_Number is required'
>>>>>>> 173f3cb92dc977492ce21b6bd2d6e8735c654103
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
<<<<<<< HEAD
                            message: 'The Last Name is required'
=======
                            message: 'The Email is required '
>>>>>>> 173f3cb92dc977492ce21b6bd2d6e8735c654103
                        }
                    }
                },
                Years_Practice: {
                    validators: {
                        notEmpty: {
<<<<<<< HEAD
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
=======
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
                Passoutcollege: {
                    validators: {
                        notEmpty: {
                            message: 'Passoutcollege is required'
>>>>>>> 173f3cb92dc977492ce21b6bd2d6e8735c654103
                        }
                    }
                },
                FITB: {
                    validators: {
                        notEmpty: {
<<<<<<< HEAD
                            message: 'The  Reporting To is required'
=======
                            message: 'FITB is required'
>>>>>>> 173f3cb92dc977492ce21b6bd2d6e8735c654103
                        }
                    }
                },
            }

        });
    });
</script>

