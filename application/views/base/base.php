<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <style>
        
        :root{
            /* --dashboardNav: #DBE2EF;
            --dashboardMain: #F9F7F7;   */
            
            
            --dashboardNav: #fff;
            --dashboardMain: #dbe2ef ;  
            
        }

        ::-webkit-scrollbar {
            display: none;
        }
        
        body{
            /* background-color:#333;
            color:white; */
        }
        a{
            /* color:skyblue; */
        }

        *{
            
            /* font-size: 14px; */
            /* font-weight: 500; */
            /* outline:1px solid green;   */
            font-family: 'Roboto', sans-serif;
            padding:0px;
            margin:0px;
        }


    </style>
</head>
<body>

<input type="text" hidden id="siteUrl" class="siteUrl" value="<?=base_url()?>">


<link rel="stylesheet" href=<?=base_url("assets/cdn/fontawesome/css/font-awesome.min.css")?> >
<script src='<?=base_url("assets/cdn/tailwindcdn.js")?>'></script>
<script  src='<?=base_url("assets/cdn/jquery.js")?>'></script>
<script  src='<?=base_url("assets/cdn/checkout.js")?>'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

