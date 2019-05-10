<?php
    require_once('vendor/autoload.php');

$fb = new Facebook\Facebook([
    'app_id' => 'app id',
    'app_secret' => 'app secret',
    'default_graph_version' => 'v2.3',

]);

$pageAccessToken = 'token';

$MsgData = [
    'message' => 'test app - from phpApp FB API!',

];

try{
    $responce = $fb->post('/me/feed',$MsgData,$pageAccessToken);


}catch(\Facebook\Exceptions\FacebookResponseException $e){
    echo 'Graph returned an error: '.$e->getMessage();
    exit;
}
catch (\Facebook\Exceptions\FacebookSDKException $e){
    echo 'sdk error'.$e->getMessage();

}

$graphNode = $responce->getGraphNode();
echo 'ID:'.$graphNode['id'];
echo '<br>post send!';


?>