<!-- <h2 class="text-4xl font-bold">Upcoming Birthday Inner</h2> -->


<div class="upcoming-birthday-card py-5">

    <h2 class="heading font-bold text-2xl text-center">Upcoming Birthdays</h2>

    <div class="card flex flex-col sm:flex-row justify-center items-center py-5">
        <div class="image-slider max-w-[408px] h-[230px] sm:w-[408px]" 
            style="">

            <img src="../assets/images/profile_pictures/Art1.jpg" alt=""
                style="width:100%;height:100%;"
                class="">
        </div>

        <ul class="p-5">
            <li><?=$data['name']?></li>
            <li class=" space-x-3"><span>Birthdate: <?=$data['birthdate']?></span><span>Age: <?=calculateAge($data['birthdate'])?></span></li>
            <li>Residence: <?=$data['address']?></li>
            <li>Father's Occupation: <?=$data['father_occupation']?></li>
            <li>Mother Occupation: <?=$data['mother_occupation']?></li>
            <li>Yearly Income: <?=$data['household_income']?></li>
            <li>Birthday Wish: <?=$data['wish']?></li>
            <li class=" my-3 ">
                <a href="../donate/<?=numhash($data['id'])?>"
                    class=" bg-slate-200  p-2 "
                    >Donate</a>
            </li>
            
        </ul>
    </div>
</div>












<!-- <h2 class="text-4xl font-bold">Birthday Celebrated Inner</h2> -->


<div class="celebrated-birthday-card py-5 mx-5">
    <h2 class="text-2xl font-bold  text-center">Birthday Celebrated</h2>

    <div class="card flex flex-col sm:flex-row mx-5 items-center">
        <div class="img-container ">
            <img src="../assets/images/profile_pictures/Art1.jpg" alt="" 
             class="w-[230px] h-[198px]">
        </div>
        <ul class="p-5 w-full space-y-2">
            <li><?=$data['name']?></li>
            <li>Sponsored By <?=$data['sponsored']?></li>
            <li><span>Birthdate: <?=$data['birthdate']?></span> <span>Age: <?=calculateAge($data['birthdate'])?></span> <span>Residence: <?=$data['address']?></span></li>
            <li><span>Father Occupation: <?=$data['father_occupation']?></span> <span>Mother Occupation: <?=$data['mother_occupation']?></span></li>
            <li><span>Yearly Income: <?=$data['household_income']?></span> <span>Birthday Wish: <?=$data['wish']?></span></li>
        </ul>
    </div>


    <div class="celerated-photos flex mx-5 p-5 flex-col items-center  sm:flex-row">
        <iframe width="230" height="198"
            src="https://www.youtube.com/embed/tgbNymZ7vqY"
            class="p-2 ">
        </iframe>        

        <div class="img-slider flex flex-col w-full justify-center items-center sm:space-x-10 sm:flex-row">
            <img src="../assets/images/profile_pictures/Art1.jpg" class="w-[230px] h-[198px]" alt="">
            
            <img src="../assets/images/profile_pictures/Art2.jpg" alt="" class="w-[230px] h-[198px]">
        </div>
    </div>

</div>
