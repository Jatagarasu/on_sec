<?php
/**
 * Created by PhpStorm.
 * User: Daniel Vogelskamp
 * Date: 15.11.2016
 * Time: 11:36
 */
    $db = mysqli_connect("onsec.medien.hs-duesseldorf.de", "onsec", "Onohu1Ofom70", "onsec");
    if(!db) {
        exit("Verbindungsfehler:".mysqli_connect_error());
    }
