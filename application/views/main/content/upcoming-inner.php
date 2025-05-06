<div class="upcoming-birthday-card py-5">

    <h2 class="heading font-bold text-2xl text-center">Upcoming Birthdays</h2>

    <div class="card flex flex-col md:flex-row justify-center items-center py-5 w-30px text-sm"         style="
    font-size: 14px;
    font-weight: 300;">
        <div class="image-slider max-w-[408px] h-[300px] sm:w-[408px] relative 
        
        " 
            style="">


            <div class="main " style="width:100%;height:100%;">

                <!-- Profile Pic -->

                
                <img src="../assets/images/profile_pictures/<?=$data['profile_pic']?>" alt=""
                    style="width:100%;height:100%;"
                    class="imgSlider object-cover">
                
                <!-- <img src="../assets/images/profile_pictures/Art1.jpg" alt=""
                    style="width:100%;height:100%;"
                    class="imgSlider"> -->

                    
                <?php
                    foreach ($photos_folder_array as $key => $value) {
                        if($value != "index.html" && $value != ".." && $value != "."){
                            echo "<img src='../../assets/images/recipients/$data[photos_folder]/personal_photos/$value' 
                            alt='' class='imgSlider'
                            style='width:100%;height:100%;'>";
                        }
                    }
                ?>


                <!-- Pictures Folder -->
                <!-- <img src='../assets/images/recipients/ID1DATE20240420/personal_photos/slider_bg.jpg' 
                alt="" class="imgSlider"
                style="width:100%;height:100%;">

                
                <img src='../assets/images/recipients/ID1DATE20240420/personal_photos/slider_bg2.jpg' 
                alt="" class="imgSlider"
                style="width:100%;height:100%;">

                
                <img src='../assets/images/recipients/ID1DATE20240420/personal_photos/video_img1.jpg' 
                alt="" class="imgSlider"
                style="width:100%;height:100%;">

                
                <img src='../assets/images/recipients/ID1DATE20240420/personal_photos/video_img2.jpg' 
                alt="" class="imgSlider"
                style="width:100%;height:100%;"> -->

            </div>


            <button id="prevbtn" class="bg-[gray] h-full top-0 p-2 opacity-40 font-bold text-2xl btn absolute ">&#8678;</button>
                
            <button id="nextbtn" class="bg-[gray] h-full top-0 p-2 opacity-40 font-bold text-2xl btn absolute right-0">&#8680;</button>

        </div>

        <ul class="py-2 md:py-0 px-5 w-[300px] h-[300px] md:self-start leading-6 tracking-wider grid"
>
            <li class="lineweight-500"><?=$data['name']?></li>


            <?php 
            $sponsor_name = "Not sponsored";
            $display = "display:none";
            if($data['sponsored'] == 1){
                $display = "display:block";

                $sponsor_name = "Anonymous";

                if(!empty($donation_arr[0])){
                    if($donation_arr[0]['disclose']){
                        $sponsor_name = $donation_arr[0]['name'];
                    }
                }
            }
            ?>
            
            <li class="lineweight-500" style="<?=$display?>">Sponsored By: <?=$sponsor_name?></li>

            <li class=" space-x-3 lineweight-500">
                <span class="lineweight-500" >Birthdate: <?=$data['birthdate']?></span>
                <span>Age: <?=calculateAge($data['birthdate'])?></span>
            </li>

            <li>  <span class="lineweight-500">Residence:</span>
                
                <?=$data['address']?></li>
            <li>  <span class="lineweight-500">Father's Occupation:</span>
                
                <?=$data['father_occupation']?></li>
            <li>  <span class="lineweight-500">Mother Occupation:</span>
                
                <?=$data['mother_occupation']?></li>
            <li>  <span class="lineweight-500">Yearly Income:</span>
                
                <?=$data['household_income']?></li>
            <li>  <span class="lineweight-500">Birthday Wish:</span>
                
                <?=$data['wish']?></li>

            <li class=" my-3 self-end">

                <a href="../donate/<?=numhash($data['id'])?>"
                    class="p-2 donate-btn bg-[#f5ab35] text-white 
                        py-3 px-4 rounded-[5px]"
                    <?php if($data['sponsored'] == 1){echo "style='display: none'";}; ?>
                    >Donate</a>
            </li>
            
        </ul>

        
        <ul class="py- px-5 w-[300px] md:self-start leading-6	tracking-wider">
            <li class=" lineweight-500">About me</li>
            <li><?=$data['bio']?></li>
        </ul>

    </div>
</div>


<script>
    $(document).ready(() => {

        let getImageNames = () => {
            imgClasses = $(".imgSlider")
            let names = []

            for (const ele of imgClasses) {
                // names.push($(ele).attr('data-imgName'))
                names.push($(ele).attr('src'))
            }

            return names
        }
        let ImgNameArray = getImageNames()

        start = 0
        end = ImgNameArray.length - 1
        sliderEnd = end-1


        
        let globalImgNo = 0

        $("#prevbtn").click(function (e) { 
            if(globalImgNo > start){
                globalImgNo--
            }
            setImages(globalImgNo)
            console.log(globalImgNo);
        });
        
        $("#nextbtn").click(function (e) { 
            if(globalImgNo < end){

                globalImgNo++
            }
            setImages(globalImgNo)
            console.log(globalImgNo);
        });

        function setImages(no){
            let con = ""
            // let noplus = no++

            ImgNameArray.forEach((element,index) => {
                if(no == index){
                    con += "<img src='"+element+"' class=' imgSlider object-cover' style='width:100%;height:100%;'>"
                }
            });
            $(".main").html(con);
        }

        setImages(0)

        setInterval(() => {

            if(globalImgNo == end){
                globalImgNo = -1
            }

            if(globalImgNo < end){
                globalImgNo++
            }
            
            setImages(globalImgNo)
            
        }, 3000);


        

        console.log(ImgNameArray)
    });
</script>