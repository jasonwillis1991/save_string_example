
<!DOCTYPE html>
<html>
    <title>Save String</title>
    <body>
        <!-- including jquery and bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!-- include this for jquery $.post -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- including the js page -->
        <script src="save_string_js.js"></script>

        <!-- main page layout -->
        <div class='container p-5'>
            <div class='p-2' style='margin:auto; width:50%; text-align:center;'>
                <b>This is an example string saving page</b>
            </div>
            <div class='card'>
                <div class='card-body'>
                    <div class='row'>
                        <div class='col'>
                            <label for='string_input'>String to Save</label>
                            <input class='form-control' type='text' id='string_input'>
                        </div>
                    </div>
                    <div class='row p-2'>
                        <div class='col'>
                            <button class='btn btn-primary' id='save_string_button' value='<?=$_GET['user_id'];?>'>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id='string_table'>
                <!-- loaded through ajax -->
            </div>
        </div>
    </body>
</html>