<?php

    if($_GET['Crypto'])
    {
        $CryptoType = strtoupper($_GET['Crypto']);

        $GetAPI = json_decode(file_get_contents("http://api.nobitex.ir/v2/crypto-prices"),TRUE);
        $Crypto_price = $GetAPI['prices'][$CryptoType]['price'];
        $Crypto_change1h = $GetAPI['prices'][$CryptoType]['change1h'];
        $Crypto_change1d = $GetAPI['prices'][$CryptoType]['change1d'];
        $Crypto_change7d = $GetAPI['prices'][$CryptoType]['change7d'];

    //////////// GET NAME /////////////
        $GetName_SOU = file_get_contents("https://robinhood.com/crypto/".$CryptoType);
        preg_match('/class=\"css-15ltlny\">(.*?)</s' , $GetName_SOU , $CryptoName_sou);
        $CryptoName = $CryptoName_sou[1];
    //////////// GET NAME /////////////

    echo(json_encode(array('Name' => $CryptoName , 'Type' => $CryptoType , 'Price' => $Crypto_price , 'Change1h' => $Crypto_change1h , 'Change1d' => $Crypto_change1d , 'Change7d' => $Crypto_change7d , 'Developer' => "AGC007")));

    }

?>