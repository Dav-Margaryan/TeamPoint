<?php
class API {
    public static $METHODS = array(
        'GET',
        'POST',
        'PUT',
        'PATCH',
        'DELETE'
    );

    public static $POST_FORM_TYPES = array(
        'none' => 'Չփոխանցել պարամետրեր',
        'form-data' => 'Բազմաբաժին ձևաչափով տվյալներ',
        'x-www-form-urlencoded' => 'URL-ով կոդավորված ձևաչափով տվյալներ',
        'raw' => 'Տող'
    );

    public static $REQUEST_DATA_TYPES = array(
        'binary',
        'int',
        'double',
        'char',
        'string',
        'date'
    );
}