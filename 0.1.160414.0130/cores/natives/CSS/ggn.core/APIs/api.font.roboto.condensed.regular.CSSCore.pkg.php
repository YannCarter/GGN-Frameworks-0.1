/* Fichier : Roboto-Condensed-Regular.pkg.cssg */
<?php
/* PARAMETRES */

$path = 'Roboto-Condensed-Regular/';


$Core->Code('@font-face {');

	$Core->Code('font-family: RobotoCondensedRegular;');

	$Core->Code("src: url('".HTTP_HOST.$path."index.eot.font');");


    $Core->Code("src: local('Roboto Condensed'),");

        $Core->Code(" local('Roboto Condensed'),");

        $Core->Code("url('".HTTP_HOST.$path."index.eot.font?#iefix') format('embedded-opentype'),");

        $Core->Code("url('".HTTP_HOST.$path."index.woff.font') format('woff'),");

        $Core->Code("url('".HTTP_HOST.$path."index.ttf.font') format('truetype'),");

        $Core->Code(" url('".HTTP_HOST.$path."index.svg.font#robotobold') format('svg');");

    $Core->Code("font-weight: 700;");

    $Core->Code("font-style: normal;");

	
$Core->Code('}');


?>