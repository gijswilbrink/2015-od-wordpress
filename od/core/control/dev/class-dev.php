<?php

class Control_Dev {

    public function __construct() {

        $method = getValue('method');
        if( empty( $method ) ) {
            echo <<<EOHTML
    <p>
        <a href="/?control=dev&method=stijldocument" class="btn btn-default">bekijk het stijldocument</a><br>
        <a href="/?control=dev&method=testdocument" class="btn btn-primary">bekijk het testdocument</a>
    </p>

EOHTML;
        }
        
        // load template
        get_template_part(str_replace(get_template_directory(), '', __DIR__) . '/' .  $method);
        exit;
    }

}

