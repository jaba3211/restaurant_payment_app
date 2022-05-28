<?php
if (! function_exists('isAdmin')) {
    /**
     * @return bool
     */
    function isAdmin()
    {
        if (isset(auth()->user()->status_id) and auth()->user()->status_id == ADMIN) {
            return true;
        }
        return false;
    }
}

if (! function_exists('isStaff')) {
    /**
     * @return bool
     */
    function isStaff()
    {
        if (isset(auth()->user()->status_id) and auth()->user()->status_id == STAFF) {
            return true;
        }
        return false;
    }
}
