<?php
if(!function_exists('isDateFuture')) {
    function isDatetimeFuture($datetime) {
        $currentDate = new DateTime();

        if($datetime > $currentDate) {
            return true;
        }

        return false;
    }
}
