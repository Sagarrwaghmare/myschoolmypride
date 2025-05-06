<!-- <?php print_r($donor);?> -->
<style>
    textarea,input{
        border:1px solid black;
    }
</style>


<section>

    <?php $id = $donor[0]['id'];?>
    <form action="<?=base_url("admin/update_donor/$id")?>" method="POST"
        class="flex flex-col m-4 space-y-2">

        <!-- <?php print_r($donor[0]);?> -->
        
        <label for="name" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Name: </h4>
            <input name="name" id="name"  value='<?=$donor[0]['name']?>'>
        </label>
        <!-- <label for="name" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Donor's Name: </h4>
            <input type="text" name="name" id="name" placeholder="" class="" value="<?=$donor[0]['name']?>">
        </label> -->

        
        <label for="created_at" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Date: </h4>
            <?php 
            $created_at =  $donor[0]['created_at'];
            $created_at =  explode(" ",$donor[0]['created_at']);
            $created_at =  $created_at[0];
            // print_r($created_at);
            ?>
            <input type="date" name="created_at" id="created_at" placeholder="" class="" value="<?=$created_at?>">
        </label>

        
        
        <label for="address" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Address: </h4>
            <textarea name="address" id="address" name="address"  value=''><?=$donor[0]['address']?>
            </textarea>
        </label>

        <!-- <label for="city" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">City: </h4>
            <input type="text" name="city" id="city" placeholder="" class="" <?=$donor[0]['address']?>>
        </label> -->

        <label for="contact" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Contact: </h4>
            <input type="number" name="contact" id="contact" placeholder="" class="" value="<?=$donor[0]['contact']?>">
        </label>
        

        <label for="email" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Email: </h4>
            <input type="email" name="email" id="email" placeholder="" class="" value="<?=$donor[0]['email']?>">
        </label>
        
        <label for="donationfor" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Donation For: </h4>
            <!-- <?php print_r($recipients[0]['name']);?> -->
            <input type="text" name="" id="donationfor" placeholder="" class="" value="<?=$recipients[0]['name']?>">
            <input type="number" name="cid" value="<?=$donor[0]['cid']?>" hidden>
        </label>
        
        <label for="donation_amount" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Amount: </h4>
            <input type="text" name="donation_amount" id="donation_amount" placeholder="" class="" value="<?=$donor[0]['donation_amount']?>">
        </label>

        
        <!-- <label for="noofdonation" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">No of donation: </h4>
            <input type="text" name="noofdonation" id="noofdonation" placeholder="" class="" >
        </label> -->

        <!-- SPONSORED -->
        <label for="identity_disclose" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Disclose Identity: </h4>
            
            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="identity_disclose" id="identity_disclose" value="1" <?php if($donor[0]['identity_disclose'] == 1){echo "checked";}?>>
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="identity_disclose" id="identity_disclose" value="0" <?php if($donor[0]['identity_disclose'] == 0){echo "checked";}?>>
            </label>

        </label>

        <label for="attend" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Attend Birthday: </h4>
            
            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="attend" id="attend" value="1" <?php if($donor[0]['attend'] == 1){echo "checked";}?>>
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="attend" id="attend" value="0" <?php if($donor[0]['attend'] == 0){echo "checked";}?>>
            </label>

        </label>

        

        
        <!-- PHOTOS -->
        <!-- <label for="photo" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Photo: </h4>
            <input type="text" name="photo" id="photo" placeholder="" class="">
        </label> -->

        
        
        <label for="pan_no" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Pan No: </h4>
            <input type="text" name="pan_no" id="pan_no" placeholder="" class="" value="<?=$donor[0]['pan_no']?>">
        </label>

        
        <label for="tdsstatus" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Tds Status: </h4>

            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="" id="tdsstatus" value="1" >
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="" id="tdsstatus" value="0" >
            </label>

        </label>


        
        <label for="Buttons" class="flex flex-col sm:flex-row">
            <!-- <button class="">Edit</button> -->
            <button data-id="<?=$donor[0]['id']?>"class="bg-white border-1 border-black px-1  py-2 rounded-sm my-1" id="deletedonor">Delete</button>
            <!-- <button class="">Save</button> -->
            <input class="bg-white border-1 border-black px-1  py-2 rounded-sm my-1 border-0 ml-1" type="submit" value="Save">
        </label>
        

    </form>

</section>

<script>
    const URL = $("#siteUrl").val();
    $(document).ready(function () {
        $("#deletedonor").click(function (e) { 
            e.preventDefault();
            let id = $(this).attr("data-id")
            // console.log(id);
            let con = window.confirm(`Delete this record?`)
            
            if(con){
                $.get(`${URL}api/delete_donor/${id}`, {},
                    function (data, textStatus, jqXHR) {
                        alert("Record Deleted")
                        window.location.replace("https://smiles4birthdays.cftiindia.com/admin/donors")
                    },
                    "json"
                );
            }
        });
    });
</script>