
<style>
    textarea,input{
        border:1px solid black;
    }
</style>
<!-- <?=print_r($donation);?> -->


<section>
    
    <?php $did = $donation[0]['id'];?>
    <form action="<?=base_url("admin/update_donations/$did")?>" method="POST"
        class="flex flex-col m-5 space-y-4">

        <input type="text" name="id" value="<?=$donation[0]['id']?>" hidden>

        <label for="name" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Full Name: </h4>
            <input type="text" name="name" id="name" placeholder="" class="" value="<?=$donation[0]['name']?>">
        </label>

        
        <label for="donation_date" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Donation Date: </h4>
            <input type="date" name="donation_date" id="donation_date" placeholder="" class="" value="<?=$donation[0]['donation_date']?>">
        </label>
        
        <label for="donated_for_NONUPDATE" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Donated For: </h4>
            <?php 
                $recipient_name = "Deleted";

                if(!empty($recipients)){
                    $recipient_name = $recipients[0]['name'];
                }
            // print_r($recipients)
            ?>
            <input type="text"  id="donated_for_NONUPDATE" value='<?=$donation[0]['donated_for']?>' hidden>
            <?php 
            
            // print_r($recipients[0]['name']);
            ?>
            <input type="text"  id="donated_for_NONUPDATE" value='<?=$recipient_name?>'>
        </label>


        <label for="contact" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Contact: </h4>
            <input type="number" name="contact" id="contact" placeholder="" class="" value="<?=$donation[0]['contact']?>">
        </label>

        
        <label for="Email" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Email: </h4>
            <input type="text" name="email" id="email" placeholder="" class="" value="<?=$donation[0]['email']?>">
        </label>

        
        <label for="gender" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Gender: </h4>
            <select type="text" name="gender" id="gender" class="" >

                <option value="Male"  <?php if($donation[0]['gender'] == "Male"){echo "selected";} ?>>Male</option>    
                <option value="Female"<?php if($donation[0]['gender'] == "Female"){echo "selected";} ?>>Female</option>    
            </select>        
        </label>

        <label for="Pan_no" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Pan no: </h4>
            <input type="text" name="Pan_no" id="Pan_no" placeholder="" class="" value="<?=$donation[0]['Pan_no']?>">
        </label>

        <label for="amount" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Amount: </h4>
            <input type="number" name="amount" id="amount" placeholder="" class="" value="<?=$donation[0]['amount']?>">
        </label>
        
        <label for="tds_certificate_status" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Tds Status: </h4>
            <input type="text" name="tds_certificate_status" id="tds_certificate_status" placeholder="" class="" value="<?=$donation[0]['tds_certificate_status']?>">
        </label>
        
        <label for="city" class="flex flex-col sm:flex-row">
            <h4 class="w-[150px]">Address: </h4>
            <textarea type="text" name="city" id="city" placeholder="" class="" ><?=$donation[0]['city']?>
            </textarea>
        </label>

        

        <div class="flex flex-row space-x-4">

        <!-- ATTEND -->
            <label for="attend" class="flex flex-col sm:flex-row">
                <h4 class="w-[150px]">Attend: </h4>
                
                <label for="" class="flex  items-center">
                    <p>Yes</p>
                    <input type="radio" name="attend" id="attend" value="1" <?php if($donation[0]['attend'] == 1){echo "checked";}?>>
                </label>

                <label for="" class="flex  items-center">
                    <p>No</p>
                    <input type="radio" name="attend" id="attend" value="0" <?php if($donation[0]['attend'] == 0){echo "checked";}?>>
                </label>

            </label>      

        <!-- DISCLOSE -->
            <label for="disclose" class="flex flex-col sm:flex-row">
                <h4 class="w-[150px]">Disclose Identity: </h4>
                
                <label for="" class="flex  items-center">
                    <p>Yes</p>
                    <input type="radio" name="disclose" id="disclose" value="1" <?php if($donation[0]['disclose'] == 1){echo "checked";}?>>
                </label>

                <label for="" class="flex  items-center">
                    <p>No</p>
                    <input type="radio" name="disclose" id="disclose" value="0" <?php if($donation[0]['disclose'] == 0){echo "checked";}?>>
                </label>

            </label>
        </div>


        <div class="btns ">
            <button class="delete bg-white border-1 border-black px-1  py-2 rounded-sm my-1" >
                Delete
            </button>
            <input type="submit" value="Save" class="bg-white border-1 border-black px-1  py-2 rounded-sm my-1 border-0">
        </div>


    </form>

</section>