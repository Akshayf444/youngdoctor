<style>
    .content-wrapper{
        min-height: 775px;
    }    
</style>
<?php
$attribute = array('id' => 'valid');
echo form_open('User/addinstitute', $attribute);
?>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
            <input type="text" class="form-control" value="" name="name" placeholder="Institute Name" />
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="" name="city" placeholder="City" /> </div>

        <div class="form-group">
            <select  class="form-control" name="state" >
                <option value="">Select State</option>
                <?php echo $states; ?>
            </select> 
        </div>
        <div class="form-group">
            <textarea class="form-control" name="address" placeholder="Address"></textarea></div>

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
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The Institute  is required'
                        }
                    }
                }

            }

        });
    });
</script>

