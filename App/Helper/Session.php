<?php
namespace App\Helper;
use App\Models\Client;
use App\Models\User;

class Session{
    private static $instances = [];
    private $signedIn = false;
    public $clientId;
    public $userId;
    public $message;
    public $client; // Store client data
    public $user;   // Store user data

    protected function __construct(){
    session_start();
    $this->checkLogin();
    $this->checkMessage();
    }

    protected function __clone(){}

    public static function getInstance(): Session{
    $cls = static::class;

    if (!isset(self::$instances[$cls])) {
    self::$instances[$cls] = new static();
    }

    return self::$instances[$cls];
    }

    public function isSignedIn(){
        return $this->signedIn;
    }

    public function checkLogin(){

    if (isset($_SESSION['clientId'])) {

    $this->clientId = $_SESSION['clientId'];
    $this->client = Client::find($this->clientId); // Retrieve the logged-in client's data
    $this->signedIn = true;

    }
    elseif (isset($_SESSION['userId'])) {
    $this->userId = $_SESSION['userId'];
    $this->user = User::find($this->userId); // Retrieve the logged-in user's data
    $this->signedIn = true;
    }
    else {
    unset($this->clientId);
    unset($this->client);
    unset($this->userId);
    unset($this->user);
    $this->signedIn = false;
    }
    }

    public function loginClient($client)
    {
    if ($client) {
    $this->clientId = $_SESSION['clientId'] = $client->id;
    $this->client = $client; // Set the logged-in client's data
    $this->signedIn = true;
    }
    }

    public function loginUser($user)
    {
    if ($user) {
    $this->userId = $_SESSION['userId'] = $user->id;
    $this->user = $user; // Set the logged-in user's data
    $this->signedIn = true;
    }
    }

    public function logout()
    {
    unset($_SESSION['clientId']);
    unset($_SESSION['userId']);
    unset($this->clientId);
    unset($this->client);
    unset($this->userId);
    unset($this->user);
    $this->signedIn = false;
    }

    public function message($msg = "")
    {
    if (!empty($msg)) {
    $this->message = $_SESSION['message'] = $msg;
    } else {
    return $this->message;
    }
    }

    public function checkMessage()
    {
    if (isset($_SESSION['message'])) {
    $this->message = $_SESSION['message'];
    unset($_SESSION['message']);
    }
    else{
    $this->message = "";
    }
    }


}
