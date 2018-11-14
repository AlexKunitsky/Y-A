<?php

//require_once 'Database.php';

class Controller
{
    private $results;
    protected $config;
    protected $db;

    public $createErrors = [];

    public function __construct()
    {
        $this->config = include('config.php');
        $this->db = new Database();
    }

    public function getConfig($key)
    {
        return $this->config[$key];
    }

    public function isFilter()
    {
        return (
            (isset($_GET['action']) && $_GET['action'] == 'filter') &&
            (isset($_GET['email']) && !empty($_GET['email']))
        );
    }

    public function isCreate()
    {

        return (

        (isset($_POST['action']) && $_POST['action'] == 'create')

        );
    }

    public function getAllUsers()
    {
        // query the users table and return all rows
        $pre = $this->db->query('SELECT * FROM `users`');
        if($pre) {
            return $this->db->results();
        }
    }


    public function filterUsersByEmail($mail)
    {
        // query the users table and return only rows
        // where email is equal $mail

        return [];
    }

    public function createUser()
    {
        $fields = array(
            'email' => $_POST['email'],
            'name' => $_POST['username'],
            'password' => $_POST['password']
        );
        $email = ($_POST['email']);
        $name = $_POST['username'];
        $password = $_POST['password'];

        if (empty($name)) {
            $this->createErrors[] = "The name field is required";
        }

        //validate the email field
        if (true) {
            $this->createErrors[] = "The email field is required and must be a valid email address";
        }

        //if the email field is valid check if the email already exist
        elseif(true) {
            $this->createErrors[] = "User with this email already exist";
        }

        //check if the password field not empty
        if (true) {
            // if the password is empty push message to the
            // "createErrors" array message
            $this->createErrors[] = "The password field is required";
        }

        // if the "createErrors" array not empty
        if (true) {
            // do not continue
        }

        //if everything is ok and there are no errors
        //insert the new row to the users table
        $pre = $this->db->query('INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, $fields));

        //refresh the page and exit from the script
        //header("Location: " . $_SERVER['REQUEST_URI']);

        //exit;
    }

}