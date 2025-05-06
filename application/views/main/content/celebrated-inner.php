<div class="celebrated-birthday-card py-5 mx-5 "
    >
<?php 
// echo "<pre>";
// print_r($data);
// print_r($donation_arr);

?>
<div class="max-w-[1200px] " style="
    margin: 0 auto;">

    <h2 class="text-2xl font-bold  text-center mb-6">Birthday Celebrated</h2>

    <div class="card flex flex-col sm:flex-row mx-5 items-center justify-between p-4" style="
    font-size: 14px;
    font-weight: 300;
    
    ">
        <div class="img-container ">
            <img src="../assets/images/profile_pictures/<?=$data['profile_pic']?>" alt="" 
             class="w-[300px] h-[300px] object-cover"
             
             >
        </div>
        <ul class="  h-[300px] w-[350px] space-y-2  leading-6	tracking-wider self-center md:self-start">
            <li class="lineweight-500"><?=$data['name']?></li>
            <?php 
                $displayFlag = false;
                $donor_name = "Anonmyus";
                if($donation_arr[0]['disclose']){
                    $donor_name = $donation_arr[0]['name'];
                }
            ?>
            <li class="lineweight-500">Sponsored By <?=$donor_name?></li>
            <li>
                <span>
                    <span class="lineweight-500">
                        Birthdate:
                    </span>
                     <?=$data['birthdate']?>
                </span> 
                <span>
                    <span class="lineweight-500">
                        Age:
                    </span>
                     <?=calculateAge($data['birthdate'])?></span>
            </li>

            <li>
                <span>
                    <span class="lineweight-500">
                        Residence:
                    </span>
                     <?=$data['address']?></span>
            </li>

            <li>
                <span>
                    <span class="lineweight-500">
                        Father Occupation:
                    </span>
                     <?=$data['father_occupation']?>
                </span> 
            </li>
            <li>
                
                <span>
                    <span class="lineweight-500">  
                        Mother Occupation:
                    </span>    
                     <?=$data['mother_occupation']?></span>
            </li>
            <li>
                <span>
                    <span class="lineweight-500">
                        Yearly Income:
                    </span> <?=$data['household_income']?></span>
                 <span>
                    <span class="lineweight-500">
                        Birthday Wish:
                    </span> <?=$data['wish']?></span>
            </li>
            
        </ul>
        <ul class=" leading-6 h-[300px] w-[350px]	tracking-wider self-center md:self-start">
            <li class="lineweight-500">Bio:</li>
            <li><?=$data['bio']?></li>
        </ul>
    </div>

    <!-- width="230" height="198" -->
    <?php 
    $video_link = "https://www.youtube.com/embed/tgbNymZ7vqY";
    if($data['video_link'] != ""){
        $video_link = $data['video_link'];
    }?>

    <div class="card flex flex-col sm:flex-row mx-12 items-center justify-between p-4">       <!-- //when no video -->

    <!-- <div class="celerated-photos flex mx-5 p-4  flex-col items-center justify-between  md:flex-row">  when video-->
        <!-- <iframe style="height:225px;width:350px;display:none;"

            src="<?=$video_link?>"
            class="">
        </iframe>         -->


        <div class="img-slider-cover relative w-[500px] ">

            <div class="img-slider flex flex-col sm:flex-row w-full justify-around items-center   main">

                <!-- <img src="../assets/images/profile_pictures/Art1.jpg"  data-imgName="Art1.jpg"  alt="" class="w-[230px] h-[198px] imgSlider" >
                <img src="../assets/images/profile_pictures/Art2.jpg"  data-imgName="Art2.jpg" alt="" class="w-[230px] h-[198px] imgSlider">
                <img src="../assets/images/profile_pictures/Art3.jpg"  data-imgName="Art3.jpg" alt="" class="w-[230px] h-[198px] imgSlider">
                <img src="../assets/images/profile_pictures/Art4.jpg"  data-imgName="Art4.jpg" alt="" class="w-[230px] h-[198px] imgSlider"> -->

                <?php 
                foreach ($birthday_photos_array as $key => $value) {
                    if($value != "index.html" && $value != ".." && $value != "." ){
                        echo "<img src='../assets/images/recipients/$data[birthday_photos]/celebration_photos/$value'  data-imgName='Art4.jpg' alt='' class='w-[230px] h-[198px] imgSlider'>";
                    }
                }
                ?>

            </div>

            <!-- <div class="btn absolute top-1/2"> -->
                <button id="prevbtn" class="bg-[gray] h-full top-0 left-[-27px] p-2 opacity-40 font-bold text-2xl btn absolute ">&#8678;</button>
                
                <button id="nextbtn" class="bg-[gray] h-full top-0 p-2 opacity-40 font-bold text-2xl btn absolute right-[-27px]">&#8680;</button>
            <!-- </div> -->

        </div>

        <div></div>

    </div>
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
            if(globalImgNo < sliderEnd){

                globalImgNo++
            }
            setImages(globalImgNo)
            console.log(globalImgNo);
        });

        function setImages(no){
            let con = ""
            let noplus = no++

            ImgNameArray.forEach((element,index) => {
                if(no == index || noplus == index){
                    con += "<img src='"+element+"' class='w-[230px] h-[198px] imgSlider' >"
                }
            });
            $(".main").html(con);
        }

        setImages(0)

        
        setInterval(() => {

            if(globalImgNo == end){
                globalImgNo = -1
            }

            if(globalImgNo < sliderEnd){
                globalImgNo++
            }
            
            setImages(globalImgNo)
            
        }, 3000);




        

        console.log(ImgNameArray,ImgNameArray.length, ImgNameArray.length <= 0)

        if(ImgNameArray.length <= 0){
            $(".img-slider-cover").css("display", "hidden");
            $("#prevbtn").hide()
            $("#nextbtn").hide()
            

        }
    });
</script>
