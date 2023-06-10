<?php 
    class Login{
        
        protected $email;
        protected $usuario;
        protected $s_name;
        



        function __get($nomecampo){
            return $this->$nomecampo;
        }

        function __set($nomecampo, $valor){
            $this->$nomecampo = $valor;
        }

        function __construct()
        {
            $this->email = "";
            $this->usuario = "";
            $this->s_name = "";
        }

        function logando(){
            $timeout = 3600;

            //Set the maxlifetime of the session
            ini_set("session.gc_maxlifetime", $timeout);

            //Set the cookie lifetime of the session
            ini_set("session.cookie_lifetime", $timeout);

            //Start a new session
            session_start();

            //Set the default session name
            $this->s_name = session_name();

            //Check the session exists or not
            if (isset($_COOKIE[$this->s_name])) {
                setcookie($this->s_name, $_COOKIE[$this->s_name], time() + $timeout, '/');
            }
        }

        function logout(){           
            unset($_COOKIE['PHPSESSID']);
            setcookie('PHPSESSID', null, -1, '/');
            $_SESSION["user"] = NULL;
        }
    }
?>