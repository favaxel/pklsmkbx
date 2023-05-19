<title>PKL SMKN 1 BANYUANYAR - Login</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?= base_url('assets/'); ?>img/smkbx.png">
<style>
    body {
        background-image: url("<?= base_url('assets/'); ?>img/bg-smkbx.jpg");
        height:  50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        
    }
    .btn-primary {
  background-image: linear-gradient(to right, #1A2980 0%, #26D0CE  51%, #1A2980  100%);
  margin: 1px;
  padding: 10px 10px;
  text-align: center;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;            
  box-shadow: 0 0 20px #eee;
  border-radius: 10px;
  
}

.btn-primary:hover {
  background-position: right center; /* change the direction of the change here */
  color: #fff;
  text-decoration: none;
}

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
        
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 10px;
    }

    .form-signin .checkbox {
        font-weight: normal;
    }

    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
         
    .account-wall {
        background-image: linear-gradient(to right, #ffb347 0%, #ffcc33  51%, #ffb347  100%);
            margin: 10px;
            padding: 15px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
        margin-top: 20px;
        border-radius: 8px;
        padding: 40px 0px 20px 0px;
        -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.65);
        -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.65);
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
    }
    .account-wall-hover{
        background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
    }

    .login-title {
        color: #555;
        font-size: 18px;
        font-weight: 400;
        display: block;
    }

    .profile-img {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
       
    }

    .need-help {
        margin-top: 10px;
    }

    .new-account {
        display: block;
        margin-top: 10px;
    }
</style>