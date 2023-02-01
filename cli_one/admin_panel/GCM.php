<?php
class GCM {
    //put your code here
    // constructor
    function __construct() {
    }
    /**
    * Sending Push Notification
    */
    public function send_notification($tokens,$message,$data) {
        // include config
        include_once 'config.php';
        // Set POST variables
        $url='https://fcm.googleapis.com/fcm/send';
        $fields = array(
            'registration_ids' 	=> $tokens,
            'notification'=> $message,
            'data'=>$data,
            'content_available' => true,
            'priority' => 'high',
            'body'=>$data
        );
        $headers = array(
            'Authorization:key=AAAA76jldn0:APA91bHpxRYhBkqMt8bF4DoY7is1IDfTzWRpxuCuK4iM3yxRvESCxt9djCwSmt40UOqubF2SzyeqU7poM-OdrID4eDcltfe1ZEtTY_GlSS508Z-gn2uFE0Q-zBh2AB9bretT6EdGMqIc',
            'Content-Type:application/json'
        );
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYHOST, 0 );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        //echo $result;
        if($result===FALSE){
            die('Curl Failed:'.curl_error($ch));
        }
        curl_close( $ch );
        return $result;
    }
}
?>

