<?php
function redirect($path){
    header('Location: '.urlRoot.'/public/'.$path);
}
