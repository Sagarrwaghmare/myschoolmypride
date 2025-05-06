<head>
    <title><?php echo $page_title;?></title>
</head>
<style>
    table,tr,td,thead,tbody,th{
        border:1px solid black;
    }
    textarea,input{
        border:1px solid black;
    }
    tr:hover{
        background: darkgray;
        color:white
    }
</style>

<nav class="relative  py-5">

    <a href="https://cftiindia.com/">
        <img src="<?=base_url('assets/images/website-images/CFTI_LOGO.png')?>" alt="cfti logo" 
        width=130
        class="absolute top-1 left-1
        mx-5 my-5"
        >
    </a>

    
    <div class="flex items-center justify-center -2">

        <div class="logo">
            <a href="<?=base_url();?>">
                <img src="<?=base_url('assets/images/website-images/smiles4birthday_logo.png')?>" alt="smiles4birthdays Logo" width=250
                class="rounded-full">
            </a>
            <!-- width=140 -->
        </div>
        
    </div>
    <!-- <img src="<?=base_url('assets/images/website-images/CFTI_LOGO.png')?>" alt="cfti logo" width=132
     class="absolute top-0 left-0
     mx-5 my-5"
     style="height:75px;"
     > -->
     
    <!-- <div class="flex items-center justify-center -2">
        <div class="logo">
            <img src="<?=base_url('assets/images/website-images/smiles4birthday_logo.png')?>" alt="smiles4birthdays Logo" width=140
            class="rounded-full">
        </div>
    </div> -->
</nav>

