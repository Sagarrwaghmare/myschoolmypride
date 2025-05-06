<html>
    <head>
        <title>Thank You</title>
    </head>
    <style>
        .lineweight-500{
           font-weight:500; 
        }
    </style>
    <body>
        <div class="logo flex m-4 space-x-10">
            <a href="https://cftiindia.com/">
                <img src="<?=base_url('assets/images/website-images/CFTI_logo.png')?>" alt="cfti logo" 
                width=152
                class="
                "
                >
            </a>

            <a href="<?=base_url()?>">
                <img src="<?=base_url('assets/images/website-images/smiles4birthday_logo.png')?>" alt="cfti logo" 
                width=220
                class="
                "
                >
        </div>
        <div class="containerFull w-full flex flex-col  items-start text-2xl m-4 " 
            style="">

            <h2 class="text-4xl lineweight-500 my-6">Thank You for making a difference,</h2>
            <h4 class="my-6">Dear <?php print_r($name)?> a big thanks for your support.</h4>
            <h4 class="my-6">Support from amazing people like you helps us in our mission of Smiles4Birthdays. We are
            grateful for your generosity. This valuable donation of yours is going to bring smile on the face
            of a child.</h4>
            <h4 class="my-6">Our team will get in touch with you for the 80G tax benefit.</h4>

            <p class="my-6">
            Regards,<br>
            Team Smiles4Birthdays
            </p>

            <h2 class="text-2xl text-[#f5ab35] my-6">
            <a href="<?=base_url()?>" class="">
            Smiles4Birthdays
            </a>|
            <a href="<?=base_url()?>" class="">
                CFTI
            </a>
            </h2>    
        </div>
    </body>
</html>

