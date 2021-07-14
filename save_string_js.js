

function log_in(){
    var username = $("#username").val();
    var password = $("#password").val();
    var action = 'check_login_data';

    $.post("save_string_ajax.php",{
        username, password, action
    },function(response){
        // if the ajax page returned the user id go to the string save page and set the user id
        if(response){
            window.location.href = "save_string_list.php?user_id="+response;
        }else{
            alert("login unsuccessful. Invalid username or password");
        }
    });
}

// saves the string and prints the string table
function print_string_table(){
    var string_to_save = $('#string_input').val();
    var action = 'print_string_table';
    var user_id = $('#save_string_button').val();

    $.post("save_string_ajax.php?user_id="+user_id,{
        string_to_save, action
    },function(response){
        $('#string_table').html(response);
    });
}

$(function(){
    $('#login_request_button').on("click",function(){
        log_in();
    })
    $('#save_string_button').on("click",function(){
        print_string_table();
    })
});
