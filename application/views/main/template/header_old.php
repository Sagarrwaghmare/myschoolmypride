<style>
    /* Pagination Style */

    .pagination ul a,strong{
        padding:5px 10px;
        border-radius:4px;
    }
    
    .pagination ul a{
        background-color:#f5ab35;
        color:white;
    }

    .pagination ul strong{
        color:#f5ab35;
        border: 2px solid #f5ab35;
    }

    .pagination ul a:hover,.donate-btn:hover,.view-more-btn:hover{
        color: #000;
        box-shadow:  2px 2px black;
    }
</style>

<head>
    <title><?php echo $page_title;?></title>
</head>


<nav class="relative  py-5 flex flex-col items-center justify-center">
    <a href="https://cftiindia.com/">
        <img src="<?=base_url('assets/images/website-images/CFTI_LOGO.png')?>" alt="cfti logo" 
        width=130
        class="relative sm:absolute top-0 left-0
        mx-5 my-5"
        >
    </a>
     <!-- style="height:75px;" -->
     <!-- width=132 -->
     
    <div class="flex items-center justify-center -2">

        <div class="logo">
            <!-- <a href="<?=base_url();?>">
                <img src="<?=base_url('assets/images/website-images/smiles4birthday_logo.png')?>" alt="smiles4birthdays Logo" width=250
                class="rounded-full">
            </a> -->
            <!-- width=140 -->
        </div>
        
    </div>

    
    <ul class="flex flex-col md:flex-row 
        justify-center
        mx-20 my-10 space-x-4
        text-center
      ">

        <li class="my-1 text-md"> <a href="#">About Smiles4Birthdays</a> </li>
        <li class="my-1 text-md"> <a href="<?=base_url()?>">How it works</a> </li>
        <li class="my-1 text-md"> <a href="<?=base_url('upcoming')?>">Upcoming Birthdays</a></li>
        <li class="my-1 text-md"> <a href="<?=base_url('celebrated')?>">Birthdays Celebrated</a></li>
        
        <li class="my-5 sm:my-1">
            
            <a href="<?=base_url('donate')?>"
            class="donate-btn bg-[#f5ab35] text-white 
            py-2 px-3 rounded-[5px]
            ">Donate Now</a>
        </li>
    </ul>
</nav>

