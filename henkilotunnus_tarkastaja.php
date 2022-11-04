<?php

function tarkistaHenkilotunnus($henkilotunnus){

    $valid = false;
    $henkilotunnusInt = 0;
    $henkilotunnusArray  = str_split($henkilotunnus);
    $TarkistusMerkit = array(
        0 =>'0', 1 =>'1', 2 =>'2', 3 =>'3', 4 =>'4', 5 =>'5', 6 =>'6', 7 =>'7', 8 =>'8', 9 =>'9', 10 =>'A',
        11 =>'B', 12 =>'C', 13 =>'D', 14 =>'E', 15 =>'F', 16 =>'H', 17 =>'J', 18 =>'K', 19 =>'L', 20 =>'M',
        21 =>'N', 22 =>'P', 23 =>'R', 24 =>'S', 25 =>'T', 26 =>'U', 27 =>'V', 28 =>'W', 29 =>'X', 30 =>'Y');
    $vuosisadanTunnukset = array('A','-');

    // Tarkistetaan henkilötunnuksen pituus
    if(count($henkilotunnusArray) == 11){

        // Tarkistetaan päivä
        if( intval($henkilotunnusArray[0] . $henkilotunnusArray[1]) <= 31 && intval($henkilotunnusArray[0] . $henkilotunnusArray[1]) > 0){

            // Tarkistetaan kuukausi
            if( intval($henkilotunnusArray[2] . $henkilotunnusArray[3]) <= 12 && intval($henkilotunnusArray[2] . $henkilotunnusArray[3]) > 0){

                // Tarkistetaan vuosisadan tunnus
                if(in_array(strtoupper($henkilotunnusArray[6]),$vuosisadanTunnukset)){

                    // Otetaan numerot henkilötunnuksesta 
                    for ($i = 0 ; $i <10; $i++){

                        if(is_numeric($henkilotunnusArray[$i])){

                            $henkilotunnusInt .= $henkilotunnusArray[$i];
                        }
                    }

                    // Tarkistetaan tarkistusmerkki
                    if($TarkistusMerkit[round(($henkilotunnusInt/31 - floor($henkilotunnusInt/31))*31)] == strtoupper($henkilotunnusArray[10])){

                        $valid = true;
                    }
                }
            }
        }
    }
    return $valid;
}
echo tarkistaHenkilotunnus("131052a308t");
echo tarkistaHenkilotunnus("010594a9021");
?>