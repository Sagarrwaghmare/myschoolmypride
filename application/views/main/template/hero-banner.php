<style>

    .heroImage::after{
        position: absolute;
        content: "";
        width:  100%;
        height: 100%;
        left: 0;
        top: 0;

        

        background: rgba(0, 0, 0, 0.7);
    

    }

    .nowrapclass{
        white-space: nowrap;
    }
</style>



<div class="relative ">

    <section  class="heroImage relative">
        <img  src="<?= base_url("assets/images/website-images/hero-banner/$image_name")?>" alt=""
        class="  h-[225px] w-full  object-cover">
        
    </section class="heroImage">
    <!-- top-[30%] left-[40%] translate-y-[50%] -->
    <!-- absolute top-0 left-0 m-auto  md:top-[20%] md:left-[5%] md:translate-y-[50%] -->
    <!-- <div class="absolute
        top-[30%] left-[25%]
        md:top-[20%] md:left-[5%] translate-y-[50%] translate-x-[50%]  text-white lineweight-500 text-3xl " >
        <?=$heading_content?></div> -->

        
    <div class="textclass absolute md:top-[20%] md:left-[5%] md:translate-y-[50%]  text-white lineweight-500 text-3xl " style="
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%)

        

        ">
        <?=$heading_content?></div>
    
    <!-- <div class="absolute top-[40%] left-[5%] translate-y-[50%]  text-white  text-lg">About Us / Vision and Mission</div> -->
</div>

<script>
    $(document).ready(function () {
        $(".textclass").addClass("nowrapclass");
    });
</script>