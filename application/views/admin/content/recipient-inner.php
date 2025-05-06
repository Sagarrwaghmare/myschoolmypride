
<style>
    textarea,input{
        border:1px solid black;
    }
</style>

<!-- <?php print_r($recipient[0])?> -->

<section>
    
    <form action="<?=base_url("admin/update_recipient")?>" method="POST"
        class="flex flex-col m-10 space-y-4">

        <input type="text" name="id" value="<?=$recipient[0]['id']?>" hidden>

        <label for="name" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Full Name: </h4>
            <input type="text" name="fullname" id="fullname" placeholder="" class="" value="<?=$recipient[0]['name']?>">
        </label>

        
        <label for="birthdate" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Birthdate: </h4>
            <input type="date" name="birthdate" id="birthdate" placeholder="" class="" value="<?=$recipient[0]['birthdate']?>">
        </label>
        
        <label for="address" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Address: </h4>
            <input type="text" name="address" id="address" value='<?=$recipient[0]['address']?>'>
        </label>


        <label for="Contact" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Contact: </h4>
            <input type="number" name="Contact" id="Contact" placeholder="" class="" value="<?=$recipient[0]['contact']?>">
        </label>

        
        <label for="Email" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Email: </h4>
            <input type="text" name="email" id="email" placeholder="" class="" value="<?=$recipient[0]['email']?>">
        </label>

        
        <label for="gender" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Gender: </h4>
            <select type="text" name="gender" id="gender" class="" >

                <option value="Male"  <?php if($recipient[0]['gender'] == "Male"){echo "selected";} ?>>Male</option>    
                <option value="Female"<?php if($recipient[0]['gender'] == "Female"){echo "selected";} ?>>Female</option>    
            </select>        
        </label>

        <label for="income" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Income: </h4>
            <input type="number" name="income" id="income" placeholder="" class="" value="<?=$recipient[0]['household_income']?>">
        </label>

        <label for="fatheroccupation" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Father Occupation: </h4>
            <input type="text" name="fatheroccupation" id="fatheroccupation" placeholder="" class="" value="<?=$recipient[0]['father_occupation']?>">
        </label>
        
        <label for="motheroccupation" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Mother Occupation: </h4>
            <input type="text" name="motheroccupation" id="motheroccupation" placeholder="" class="" value="<?=$recipient[0]['mother_occupation']?>">
        </label>
        
        <label for="wish" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Wish: </h4>
            <input type="text" name="wish" id="wish" placeholder="" class="" value="<?=$recipient[0]['wish']?>">
        </label>

        
        <label for="bio" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Information: </h4>
            <!-- <input type="text" name="bio" id="bio" placeholder="" class="" value="<?=$recipient[0]['bio']?>"> -->

            <textarea name="bio" id="bio" placeholder='Enter Information' cols="40" rows="5" 
                class="mx-2 my-2 p-2 rounded-sm "><?=$recipient[0]['bio']?>

                </textarea>
        </label>

        <!-- SPONSORED -->
        <label for="sponsored" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Sponsored: </h4>
            
            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="sponsored" id="sponsored" value="1" <?php if($recipient[0]['sponsored'] == 1){echo "checked";}?>>
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="sponsored" id="sponsored" value="0" <?php if($recipient[0]['sponsored'] == 0){echo "checked";}?>>
            </label>

        </label>

        
        <label for="sponsoredby" class="flex flex-col sm:flex-row" <?php if($recipient[0]['sponsored'] == 0){echo "style='display:none;'";}?>>
            <h4 class="w-[150px]">Sponsored By: </h4>
            <!-- <input type="text" name="sponsoredby" id="sponsoredby" placeholder="" class="" value="<?=$recipient[0]['sponsored_by']?>"> -->
            <!-- <option value="1">1</option>
            <option value="<?=$recipient[0]['sponsored_by']?>" selected><?=$recipient[0]['sponsored_by']?></option>
            <option value="2">2</option> -->

            <select name="sponsoredby" id="sponsoredby">

                <?php foreach ($donations as $key => $value) {

                    if($value['id'] == $recipient[0]['sponsored_by']){
                        echo "<option value='$value[id]' selected>$value[name]</option>";
                    }else{
                        echo "<option value='$value[id]'>$value[name]</option>";

                    }
                }?>
            </select>
        </label>

        
        <!-- Celebrated -->
        <label for="Celebrated" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Celebrated: </h4>
            
            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="celebrated" id="celebrated" value="1" <?php if($recipient[0]['celebrated'] == 1){echo "checked";}?>>
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="celebrated" id="celebrated" value="0" <?php if($recipient[0]['celebrated'] == 0){echo "checked";}?>>
            </label>

        </label>

        
        <!-- PHOTOS -->
        <!-- <label for="displayphoto" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Display Profile Picture: </h4>
            <input type="text" name="displayphoto" id="displayphoto" placeholder="" class="" value="<?=$recipient[0]['profile_pic']?>">
            
        </label> -->

        
        <!-- <label for="UpcomingPhoto" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Upcoming Photo: </h4>
            <input type="text" name="UpcomingPhoto" id="UpcomingPhoto" placeholder="" class="" value="<?=$recipient[0]['photos_folder']?>">
        </label> -->

        
        <!-- <label for="BirthdayPhoto" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Birthday Photo: </h4>
            <input type="text" name="BirthdayPhoto" id="BirthdayPhoto" placeholder="" class="" value="<?=$recipient[0]['birthday_photos']?>">
        </label> -->

        
        <label for="videolink" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Video Link: </h4>
            <input type="text" name="videolink" id="videolink" placeholder="" class="" value="<?=$recipient[0]['video_link']?>">
        </label>

        
        <label for="display" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Display on website: </h4>

            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="display" id="display" value="1" <?php if($recipient[0]['display'] == 1){echo "checked";}?>>
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="display" id="display" value="0" <?php if($recipient[0]['display'] == 0){echo "checked";}?>>
            </label>

        </label>


        
        <label for="Buttons" class="flex flex-col sm:flex-row">
            <!-- <button class="">Edit</button> -->
            <button class="delete-recipient-btn m-2 p-2 bg-gray-400 border-2 border-black rounded-sm hover:text-white" data-id="<?=$recipient[0]['id']?>" data-unique-key="<?=$recipient[0]['profile_pic']?>" id="delete-recipient-btn">Delete</button>

            <input type="submit" class="m-2 p-2 bg-gray-400 border-2 border-black rounded-sm hover:text-white cursor-pointer"  value="Save">
        </label>
        

    </form>

    <div class="photo-section">

        <h2>Photo Section</h2>

        <div class="profile_pic ">
            <h2>Profile Picture</h2>

            <?php print_r($this->session->flashdata('changeProfilePic'));?>
            <div class="flex space-x-4">

                <img src="<?=base_url('assets/images/profile_pictures/').$recipient[0]['profile_pic']?>" alt="<?=$recipient[0]['profile_pic']?>" width="200">
                
                <form action="<?=base_url("admin/change_photo/")?>" method="post" enctype="multipart/form-data" class="flex flex-col space-y-4" >

                    <input type="text" value="<?=$recipient[0]['id']?>" hidden name="id">
                    <input type="text" value="<?=$recipient[0]['profile_pic']?>" hidden name="imgName">

                    <input type="file" name="changeProfilePic" id="">
                    <input class="w-1/2" type="submit" value="Change">
                </form>
            </div>
        </div>

        <div class="photos_folder">
            <h2>Recipient's Photos</h2>
            <div class="flex flex-col space-y-4">
                <div class="photos_folder-container grid grid-cols-4 ">

                    <?php

                     foreach ($photos_folder_array as $key => $value) {
                        
                        $unique_key = $recipient[0]['photos_folder'];
                        $rep_id = $recipient[0]['id'];
                        if($value != 'index.html' && $value != '.' && $value != '..' ){

                        echo "<div class='relative w-[200px]'><button class='delete-photo bg-red-600 rounded-md px-2 py-1 text-white absolute top-2 right-2 border-2 border-red-600 hover:border-black hover:text-black' data-type='personal_photos' data-unique-key='$unique_key' data-photo-name='$value' data-id='$rep_id'>X</button><img src='".base_url()."assets/images/recipients/$unique_key/personal_photos/$value' 
                        alt='$value' class=''
                        style='width:200px;height:200px;'></div>";

                        }
                    }?>

                </div>
                <div class="addPhotosFolder">
                    <?php if($this->session->flashdata('type') == 0){
                        print_r($this->session->flashdata('addPhoto'));
                    }?>


                    <form action="<?=base_url("admin/add_photo/").$recipient[0]['id'].'/'.$recipient[0]['photos_folder'].'/'."0"?>" method="post" enctype="multipart/form-data" class="flex space-x-4">

                    
                    <input type="file" name="uploadImg" id="uploadImg">
                    <input class="w-1/3" type="submit" value="Add">

                    </form>
                </div>

            </div>
        </div>


        <div class="celebrated_folders" <?php if($recipient[0]['celebrated'] == 0){echo "style='display:none'";}?>> 
            <h2>Celebration Photos</h2>
            <div class="flex flex-col space-y-4">
                <div class="photos_folder-container grid grid-cols-4 ">
                    <?php
                    
                    foreach ($birthday_photos_array as $key => $value) {
                        $unique_key = $recipient[0]['photos_folder'];
                        $rep_id = $recipient[0]['id'];
                        if($value != 'index.html' && $value != '.' && $value != '..' ){

                            echo "<div class='relative w-[200px]'><button class='delete-photo bg-red-600 rounded-md  px-2 py-1 text-white absolute top-2 right-2 border-2 border-red-600 hover:border-black hover:text-black' data-type='celebration_photos' data-unique-key='$unique_key' data-photo-name='$value' data-id='$rep_id'>X</button><img src='".base_url()."assets/images/recipients/$unique_key/celebration_photos/$value' 
                            alt='$value' class=''
                            style='width:200px;height:200px;'></div>";
                        }
                    }?>
                </div>
                <div class="addPhotosFolder">
                    <?php if($this->session->flashdata('type')){
                        print_r($this->session->flashdata('addPhoto'));
                    }?>
                    
                    <form action="<?=base_url("admin/add_photo/").$recipient[0]['id'].'/'.$recipient[0]['photos_folder'].'/'."1"?>" method="post" enctype="multipart/form-data" class="flex space-x-4">
                    
                    <input type="file" name="uploadImg" id="uploadImg">
                    <input class="w-1/3" type="submit" value="Add">

                    </form>
                </div>
            </div>
        </div>

    </div>
</section>















<script>
    $(document).ready(function () {
        let URL = $("#siteUrl").val()
        $(".delete-recipient-btn").on("click", function (e) {
            
            e.preventDefault()
            let flag = window.confirm("Are you sure you want to delete this record?")
            
            let id = $(this).attr('data-id')
            let unique_key = $(this).attr('data-unique-key')

            console.log(flag,URL,id,unique_key)

            if(flag){   
                $.get(URL+"api/delete_recipient"+"/"+id+"/"+unique_key, {},
                function (data, textStatus, jqXHR) {
                    console.log(data);  
                },
                );
            }
            
        });

        $(".delete-photo").click(function (e) { 
            e.preventDefault();
            let uniqueKey = $(this).attr('data-unique-key')
            let type = $(this).attr('data-type')
            let photoName = $(this).attr('data-photo-name')
            let id = $(this).attr('data-id')

            let con = window.confirm("Delete this photo?")

            if(con){
                $.get(URL+`api/delete_photo/${uniqueKey}/${photoName}/${type}/${id}`, {},
                    function (data, textStatus, jqXHR) {
                        console.log("Response: ",data);

                    },
                    "json"
                );
                
                $(this).parent().remove();
            }

        });
    });
</script>