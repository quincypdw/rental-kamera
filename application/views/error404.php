<!doctype html>
<html>
 <head>
   <title>404 Page Not Found</title>
   <style>
   body{
     width: 99%;
     height: 100%;
     background-color: #2980B9;
     color: white;
     font-family: sans-serif;
   }
   div {
     position: absolute;
     width: 400px;
     height: 300px;
     z-index: 15;
     top: 25%;
     left: 50%;
     margin: -100px 0 0 -200px;
     text-align: center;
   }
   h1,h2{
     text-align: center;
   }
   h1{
     font-size: 60px;
     margin-bottom: 10px;
     border-bottom: 1px solid white;
     padding-bottom: 10px;
   }
   .thumbnail{
        margin-bottom: 10px;
        border-bottom: 1px solid white;
        padding-bottom: 10px;
   }
   h2{
     margin-bottom: 40px;
   }
   .button {
       margin-top: 10px;
        background-color:#27DEBF;
        border-radius:28px;
        border:1px solid #4b8f29;
        display:inline-block;
        cursor:pointer;
        color:#455A64;
        font-family:sans-serif;
        font-size:17px;
        padding:16px 31px;
        text-decoration:none;
        text-shadow:0px 1px 0px #5b8a3c;
        margin-button: 20px;
    }
    .button:hover {
        background-color:#19B295;
    }
    .button:active {
        position:relative;
        top:1px;
    }

   </style>
 </head>
 <body>
   <div>
     <img src="<?= base_url(); ?>/assets/images/404_error.png" width="300" height="300" class="thumbnail">
     <h2>Page not found</h2>
     <?php  if ($this->session->userdata('masuk')!=null) { ?>
        <a class="button" href="<?= base_url('backend/overview'); ?>" >Back to Homepage</a>
     <?php } else if($this->session->userdata('customer_id')==null || $this->session->userdata('customer_id')!=null) { ?>
        <a class="button" href="<?= base_url(); ?>" >Back to Homepage</a>
    <?php } ?>
   </div>
 </body>
</html>
