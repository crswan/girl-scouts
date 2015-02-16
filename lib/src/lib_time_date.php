<?php

/**
 * TimeDate class
 *
 * This class contains functioned used for parsing and formating
 * times and dates
 *
 * @version     $Revision: #1 $
 * @author      $Author: hanz $
 *
 */

define( 'DEFAULT_DATE_FORMAT', 'M j, Y' );
define( 'SLASH_DATE_FORMAT', 'm/d/Y' );
define( 'DEFAULT_TIME_FORMAT', 'g:i a' );

class TimeDate
{
    /**
     * Returns the current date as specified by the DB_DATE_FORMAT constant - DB_DATE_FORMAT is
     * database-dependent, so it is defined in the Database class
     */
    function GetCurrentDate( $format = SLASH_DATE_FORMAT )
    {
        return date( $format );
    }

    /**
     * Returns the current date and time as specified by the DB_TIMESTAMP_FORMAT constant -
     * DB_TIMESTAMP_FORMAT is database-dependent, so it is defined in the Database class
     */
    function GetCurrentTimestamp( $format = DB_TIMESTAMP_FORMAT )
    {
        return date( $format );
    }

}