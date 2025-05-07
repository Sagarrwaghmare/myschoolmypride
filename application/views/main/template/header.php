<style>
    /* Pagination Style */

    .pagination ul a,strong{
        padding:10px 15px;
        border-radius:4px;

        display: flex;
        justify-content:center;
        align-items:center;

        font-size:18px;
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

    nav ul li a{
        font-size: 14px;
        font-weight: 500;
        
    }
    .lineweight-500{
        font-weight: 500;
    }
    a i:hover{
        color:black;
    }
</style>

<head>
    <title><?php echo $page_title;?></title>
</head>

<div class="romana_header_top ">

    <div class="border-b mb-4 md:mb-0" style="
    font-weight: 300;
    line-height: 27px;">
            <div class="row flex flex-col md:flex-row items-center justify-between mx-10 p-1">
                    <div class="col-md-8 col-sm-8">
                        <div class="romana_header_top_left">
                            <ul>
                                <a style="padding: 8px;" href="https://www.instagram.com/cfti_india/" target="_blank">
                                    <i class="fa fa-instagram text-[#f5ab35]" aria-hidden="true"></i>
                                </a>
						
                                <a style="padding: 8px;" href="https://www.facebook.com/CentreForTransformingIndia" target="_blank">
                                    <i class="fa fa-facebook-square text-[#f5ab35]" aria-hidden="true"></i>
                                </a>
						
                                <a style="padding: 8px;" href="https://twitter.com/CFTI10" target="_blank">
                                    <i class="fa fa-brands fa-twitter text-[#f5ab35]" aria-hidden="true"></i>
                                </a>
						
                                <a style="padding: 8px;" href="https://www.linkedin.com/company/cfti-india/" target="_blank">
                                    <i class="fa fa-brands fa-linkedin text-[#f5ab35]" aria-hidden="true"></i>
                                </a>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-2">
                        <div class=" hover:text-black text-md text-[#f5ab35] ">
                            <a href="tel:">Donation Hotline : +91 9673766347</a>
                        </div>
                    </div>
            </div>
    </div>

    <nav class="flex lg:flex-row flex-col items-center justify-between mx-10 py-4">

        <div class="flex flex-col lg:flex-row justify-center lg:justify-start lg:space-x-10 items-center w-1/2">
            <a href="https://cftiindia.com/">
                <img src="<?=base_url('assets/images/website-images/CFTI_logo.png')?>" alt="cfti logo" 
                width=152
                class="
                "
                >
            </a>
    
            <a href="<?=base_url()?>">
                <img src="<?=base_url('assets/images/website-images/MYSCHOOL_LOGO-NOBG.png')?>" alt="cfti logo" 
                width=100
                class="
                "
                >
            </a>
        </div>
        
        <ul class="flex flex-col md:flex-row 
            justify-center items-center
            my-7 
            text-center
        ">

            <li class="my-1 ml-4 text-md  hover:text-[#f5ab35]"> <a href="<?=base_url('about/cfti')?>">About CFTI</a> </li>
            <li class="my-1 ml-4 text-md  hover:text-[#f5ab35]"> <a href="<?=base_url('about/myschool')?>">About My School My Pride</a> </li>
            <li class="my-1 ml-4 text-md  hover:text-[#f5ab35]"> <a href="<?=base_url('about')?>">Donate a School Kit</a> </li>

            <!-- <li class="my-1 ml-4 text-md  hover:text-[#f5ab35]"> <a href="<?=base_url('how')?>">How it works</a> </li>
            <li class="my-1 ml-4 text-md  hover:text-[#f5ab35]"> <a href="<?=base_url('upcoming')?>">Upcoming Birthdays</a></li>
            <li class="my-1 ml-4 text-md  hover:text-[#f5ab35]"> <a href="<?=base_url('celebrated')?>">Birthdays Celebrated</a></li> -->
            
            <!-- <li class="my-5 sm:my-1 ml-4">            
                <a href="<?=base_url('donate')?>"
                class="donate-btn bg-[#f5ab35] text-white 
                py-3  rounded-[5px] w-[120px] inline-block
                ">Donate Now</a>
            </li> -->
        </ul>
    </nav>

</div>


