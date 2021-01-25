<?php
require 'includes/init.php';
// PROFILE REDIRECT FUNCTION
function redirect_to_profile(){
    header('Location: profile.php');
    exit;
}
// IF GET ACTION AND ID PARAMETERS
if(isset($_GET['action']) && isset($_GET['id'])){
    // CHEKC USER LOGGED IN OR NOT || IF USER LOGGED IN
    if(isset($_SESSION['uid']) && isset($_SESSION['email'])){
        // IF PARAMETER ID IS EQUAL TO MY ID($_SESSION['uid']) THEN REDIRECT TO PROFILE
        if($_GET['id'] == $_SESSION['uid']){
            redirect_to_profile();
        }
        // OTHERWISE DO THIS
        else{
            // ASSIGN TO VARIABLE 
            $uid = $_GET['id'];
            $my_id = $_SESSION['uid'];

            // IF GET SEND REQUEST ACTION
            if($_GET['action'] == 'send_req'){
                // CHECK IS REQUEST ALREADY SENT OR NOT
                // is_request_already_sent() FUNCTION RETURN TRUE OR FLASE
                if($frnd_obj->is_request_already_sent($my_id, $uid)){
                    redirect_to_profile();
                }
                // CHECK IF THIS ID IS ALREADY IN MY FRIENDS LIST.
                // THIS FUNCTION ALSO RETURN TRUE OR FLASE 
                elseif($frnd_obj->is_already_friends($my_id, $uid)){
                    redirect_to_profile();
                }
                // OTHERWISE MAKE FRIEND REQUEST
                else{
                    $frnd_obj->make_pending_friends($my_id, $uid);
                }
            }
            // IF GET CANCEL REQUEST OR IGNORE REQUEST ACTION
            else if($_GET['action'] == 'cancel_req' || $_GET['action'] == 'ignore_req'){
                $frnd_obj->cancel_or_ignore_friend_request($my_id, $uid);
            }
            // IF GET ACCEPT REQUEST ACTION
            elseif($_GET['action'] == 'accept_req'){

                if($frnd_obj->is_already_friends($my_id, $uid)){
                    redirect_to_profile();
                }
                else{
                    $frnd_obj->make_friends($my_id, $uid);
                }
            }
            // IF GET UNFRIEND REQUEST ACTION
            elseif($_GET['action'] == 'unfriend_req'){
                $frnd_obj->delete_friends($my_id, $uid);
            }
            else{
                redirect_to_profile();
            }
        }
    }
    else{
        header('Location: logout.php');
        exit;
    }
}
else{
    redirect_to_profile();
}