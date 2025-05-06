<main class=" flex flex-col sm:flex-row   " >
    <nav class=" sm:w-1/6  bg-[var(--dashboardNav)]" >
        <ul class="   
            h-full
            mx-2 
            flex flex-col ">
            

            <?php
            // $active = "bg-blue-600 text-white";
            $active = "";
            $url = explode("/",$_SERVER['PATH_INFO']);
            $url1 = array_pop($url);
            $url2 = array_pop($url);
            // var_dump($url1,$field);
            
            function checkUrl($url1,$url2,$field,$active){
                if($url1 == $field){
                    return $active;
                }
            }
            // echo checkUrl($url1,$url2,"recipients",$active)
            ?>

            
            <li class="text-semibold    hover:bg-blue-60 hover:text-whit 
                    <?= checkUrl($url1,$url2,"admin",$active)?>">
                <div class="flex  px-2 py-1">

                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 "
                    viewBox="0 0 512 512"><path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm320 96c0-26.9-16.5-49.9-40-59.3V88c0-13.3-10.7-24-24-24s-24 10.7-24 24V292.7c-23.5 9.5-40 32.5-40 59.3c0 35.3 28.7 64 64 64s64-28.7 64-64zM144 176a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm-16 80a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM400 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>

                    <a  href="<?=base_url('admin')?>" class=" p-2 text-md rounded-sm w-full text-left block
                    ">                    
                    Dashboard
                    </a>
                </div>

            </li>
            
            <li class="text-semibold    hover:bg-blue-60 hover:text-whit 
                    <?= checkUrl($url1,$url2,"recipients",$active)?>">
                <div class="flex  px-2 py-1 ">

                    <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 " viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>

                    <button data-id="recipient" class="dropdown-nav p-2 text-md rounded-sm w-full text-left block
                    ">
                    
                    Recipients
                    </button>
                </div>

                <ul class="hidden" id="recipient">
                    <li>
                        <a class="p-2 rounded-md w-full block text-xs hover:bg-blue-60 hover:text-whit " href="<?= base_url('admin/addrecipient');?>">Add Recipient</a>  
                    </li>
                    
                    <li>
                        <a class="p-2 rounded-md w-full block text-xs hover:bg-blue-60 hover:text-whit " href="<?= base_url('admin/recipients');?>">All Recipients</a>  
                    </li>
                </ul>
            </li>


            <li class="text-semibold text-md   hover:bg-blue-60 hover:text-whit 
                    <?= checkUrl($url1,$url2,"donations",$active)?>
            ">
                <div class="flex px-2 py-1 ">

                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H80c-8.8 0-16-7.2-16-16s7.2-16 16-16H448c17.7 0 32-14.3 32-32s-14.3-32-32-32H64zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                    <button data-id="donation" class="dropdown-nav p-2 rounded-sm w-full text-left block   
                    
                    
                    " >Donations</button>
                </div>                
                <ul class="hidden" id="donation">
                    <li>
                        <a class="p-2 rounded-md w-full block text-xs hover:bg-blue-60 hover:text-whit " href="<?= base_url('admin/donations');?>">Donations</a>  
                    </li>
                    <li>
                        <a class="p-2 rounded-md w-full block text-xs hover:bg-blue-60 hover:text-whit " href="<?= base_url('admin/donors');?>">Donors</a>  
                    </li>
                </ul>
            </li>


            <li class="text-semibold text-md   hover:bg-blue-60 hover:text-whit 
            
            <?= checkUrl($url1,$url2,"users",$active)?>
            ">
                <div class="flex px-2 py-1 ">


                <svg class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                

                    <button data-id="user" class="dropdown-nav p-2 rounded-sm w-full text-left block  
                    ">Users 
                    </button>
                </div>
                <ul class="hidden" id="user">
                    <li>
                        <a class="p-2 rounded-md w-full block text-xs hover:bg-blue-60 hover:text-whit " href="<?= base_url('admin/users');?>">Add</a>  
                    </li>
                    
                    <li>
                        <a class="p-2 rounded-md w-full block text-xs hover:bg-blue-60 hover:text-whit " href="<?= base_url('admin/users');?>">Users</a>  
                    </li>
                </ul>
            </li>

        </ul>
    </nav>

    <?php 
    $height100 = '100vh;';
    
    $url = explode("/",$_SERVER['PATH_INFO']);
    $url1 = array_pop($url);
    $url2 = array_pop($url);

    if($url2 == "recipients"){
        $height100 = '';
    }

    // var_dump($url1,$url2);

    ?>

    <section class="w-full bg-[var(--dashboardMain)] p-2"  style="height:<?=$height100?>" >



<script>
    $(document).ready(function () {
        $(".dropdown-nav").click(function (e) { 
            e.preventDefault();
            let id = "#"+$(this).attr("data-id")
            // alert(id)

            $(id).toggle();
        });
    });
</script>