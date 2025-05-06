<head>
    <title><?php echo $page_title;?></title>
</head>
<style>
    table,tr,td,thead,tbody,th{
        border:1px solid black;
        font-size:14px;
    }
    textarea,input{
        border:1px solid black;
    }
    tr:hover{
        background: #cfd9ea;
        color:black
    }
    body{
        background: var(--dashboardMain );
        height:100vh;
    }

    .pagination ul button{
        background-color: white;
        border: 1px solid black;
        padding: 5px 10px;
        border-radius:2px;
        margin:0px 5px;
    }
</style>

<nav class="flex items-center justify-start bg-[var(--dashboardNav)]">     

    <div class="sm:w-1/6 bg-[var(--dashboardNav)]">
        <!-- <div class="logo "> -->
            
            <a href="<?=base_url();?>">
                <img src="<?=base_url('assets/images/website-images/smiles4birthday_logo.png')?>" alt="smiles4birthdays Logo" width=200
                class="rounded-full p-2">
            </a>
        <!-- </div> -->
    </div>

    <div class="options w-full flex items-center justify-end  bg-[var(--dashboardNav)] m-4 px-2 relative text-center">
        <!-- <h2 class="text-3xl font-semibold">Dashboard</h2> -->
        <button class="dropdown-nav" data-id="signout">Logout
        </button>
        <div class="absolute top-8 -right-2 border-x border-b border-black bg-white flex flex-col space-y-2 p-2" id="signout" style="display:none">            
            <a href="<?=base_url('main/logout')?>" class=""> 
                Logout
            </a>
            <a href="#" class=""> 
                Profile
            </a>
        </div>
    </div>
</nav>




        
      