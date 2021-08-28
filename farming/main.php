<?php
$stromkosten1 = "0.15€/kwh";
$farming = "BTC";
//=======================================================================================================
// WebHoook Start
//=======================================================================================================


$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
	
    "content" => null,
    
    // Username
    "username" => "",

    // Avatar URL.
    // Uncoment to replace image set in webhook
    //"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",

    // Text-to-speech
    "tts" => false,

    // File upload
    // "file" => "",

    // Embeds Array
    "embeds" => [
        [
            // Embed Title
            "title" => "$pakname",

            // Embed Type
            "type" => "rich",

            // Embed Description
            "description" => "$graname\n^ Nutzbar: $gramhz\n^ Genutzt: $gramhz",

            // URL of title link
            "url" => "",

            // Timestamp of embed must be formatted as ISO8601
            "timestamp" => $timestamp,

            // Embed left border color in HEX
            "color" => 10354688,

            // Footer
            "footer" => [
                "text" => "Made by Discoin",
                "icon_url" => "https://discoin.black-host.eu/webhooks/logo.jpg"
            ],

            "fields" => [

                [
                    "name" => "Host 🚛",
                    "value" => "
					Hostsystem: $hostname
					^ Status: $hoststate
					^ Standort: $hosloc
					^ Stromkosten: $stromkosten1",
                    "inline" => false
                ],

                [
                    "name" => "Paket 💳",
                    "value" => "
					Paket: $pakname
					^ Gezahlt bis: **$pakpayed**
					^ Gezahlt seit: **$pakpayedsince**",
                    "inline" => false
                ],

                [
                    "name" => "Mining ⛏",
                    "value" => "
					Aktuell wird folgendes gefarmt: **$farming**.",
                    "inline" => false
                ],

                [
                    "name" => "Verdient 💰",
                    "value" => "
					💶 Gefarmt: **+$farmed** Discoins
					⚡️ Stromkosten: **-$stromkosten** Discoins
					💸 Paket-Kosten: **-$packkosten** Discoins",
                    "inline" => false
                ],

            ]

        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
curl_close( $ch );

//=======================================================================================================
// WebHoook End
//=======================================================================================================
?>

<h4>Webhook updated</h4>
