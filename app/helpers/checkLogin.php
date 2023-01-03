<?php
function checkLogin(){
    if (!isset($_SESSION['email'])){
        redirect('auths/login');
    }
}