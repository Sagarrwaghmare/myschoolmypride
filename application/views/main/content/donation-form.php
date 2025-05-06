<style>
    textarea,input{
        border:1px solid #777777;
        
    }
</style>



<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<!-- 6LcAm_EpAAAAAOWfhLfCHvSlsCZUz6W-I1eXtn8z secret  -->
<!-- 6LcAm_EpAAAAAOLDTEW-_Ffpx9KDBzdXaoDZlzP4 site  -->

<?php 

?>

<main class="m-4 flex justify-center items-center flex-col">
    <h2 class="text-3xl lineweight-500 text-center">Donate Now</h2>

    <form action="#" method="POST"
    class="flex flex-col m-10 space-y-4  md:place-self-start max-w-[400px] donationForm">

        <div for="name" class="flex flex-col space-y-2">
            <h4 class="">Name: </h4>
            <input type="text" name="fullname" id="fullname" placeholder="Full Name" class="p-2 rounded-sm " required>
        </div>
        <div for="address" class="flex flex-col space-y-2">
            <h4 class="">Address: </h4>
            <input name="address" id="address" placeholder="Street Address" class="p-2 rounded-sm " >
        </div>
        <div for="contact" class="flex flex-col space-y-2">
            <h4 class="">Contact no: </h4>
            <input type="number" name="contact" id="contact" placeholder="Phone Number"  class="p-2 rounded-sm " required>
        </div>
        <div for="email" class="flex flex-col space-y-2">
            <h4 class="">Email: </h4>
            <input type="email" name="email" id="email" placeholder="example@gmail.com"  class="p-2 rounded-sm " required>
        </div>
        <div for="gender" class="flex flex-col space-y-2">
            <h4 class="">Gender: </h4>
            <select name="gender" id="gender"  class="p-2 rounded-sm ">
                <option value="MALE">Male</option>
                <option value="FEMALE">Female</option>
            </select>
        </div>        
        <div for="donateTo" class="flex flex-col space-y-2">
            <h4 class="">Donate To: </h4>
            <select name="donationTo" id="donationTo" <?php if($default==0){ echo "";}?>  class="p-2 rounded-sm ">
                <?php 
                    if($default == 1){
                        // default
                        foreach ($non_sponsoreds as $key => $value) {
                            echo "<option value='".numhash($value['id'])."'>$value[name]</option>";
                        }                        
                    }else{
                        // no default
                        $name = $recipient[0]['name'];
                        $id = $recipient[0]['id'];
                        echo "<option value='".numhash($id)."'>$name</option>";
                    }
                ?>
            </select>
        </div>        
        <div for="donationAmount" class="flex flex-col space-y-2">
            <h4 class="">Donation: </h4>
            <div class="flex flex-col">
                
            <select name="donationAmount" id="donationAmount"  class="p-2 rounded-sm ">
                <option value="1000" selected>1000</option>
                <option value="2000"         >2000</option>
                <option value="3000"         >3000</option>
            </select>
            </div>            
        </div>        
        <div for="pan" class="flex flex-col space-y-2">
            <h4 class="">Pan Number: </h4>
            <input type="text" name="pan" id="pan" placeholder="Pan Number"  class="p-2 rounded-sm ">
        </div>        
        <div for="contactus" class="flex flex-col space-y-2">
            <h4 class="">If you want to sponsore more than 3 children please call us on +91 xxxxxxxx </h4>
        </div>        
        <div for="donationAmount" class="flex flex-col space-y-2 space-x-2 ">
            <h4 class="">Do you want to Video Call for birthday?</h4>
                               
            <select name="attendBirthday" id="attendBirthday"  class="p-2 rounded-sm ">
                <option value="1">Yes</option>
                <option value="0" selected>No</option>
            </select>
        </div>
        
        <div for="donationAmount" class="flex flex-col space-y-2 space-x-2 ">
            <h4 class="">Do you want to disclose your identity on our website/social media? </h4>

            <select name="discloseIdentity" id="discloseIdentity"  class="p-2 rounded-sm ">
                <option value="1" selected>Yes</option>
                <option value="0">No</option>
            </select>
            
        </div>

        
      <div id="html_element">
          <div class="g-recaptcha w-[305px]" data-sitekey="6LcAm_EpAAAAAOLDTEW-_Ffpx9KDBzdXaoDZlzP4"></div>
      </div>
        <!-- <div class="recapcha">
            <div class="g-recaptcha" data-sitekey="6LfBj_EpAAAAADoftcJecsqTNceKJd0GLzEQeZmK"></div>
        </div> -->

        <?php 
        // print_r($recipient[0]['sponsored']);
        ?>
        <div>
            <input class="donate-btn bg-[#f5ab35] text-white 
            py-3 px-5 rounded-[5px] lineweight-500 cursor-pointer border-0"
            type="submit" value="Donate" id="donationSubmitBtn">
            <!-- style="display:<?php if($recipient[0]['sponsored']){echo "none";}?>;"> -->
        </div>

        


    </form>
</main>


<script>

    const URL = $("#siteUrl").val();
    $(document).ready(function () {
    
    $(".donationForm").submit(function (e) { 
    e.preventDefault();

    
    let formData = {
    name: $("#fullname").val(),
    address: $("#address").val(),
    contact: $("#contact").val(),
    email: $("#email").val(),
    gender: $("#gender").val(),
    donationTo: $("#donationTo").val(),
    panNo: $("#pan").val(),
    donationAmount: Number($("#donationAmount").val()),
    attendFlag: Number($("#attendBirthday").val()),
    identityFlag: Number($("#discloseIdentity").val())
    }
    console.log(formData)

    function focusOnInput(tagname){
        $(tagname).focus()
        $(tagname).css("border","2px solid red")

        setTimeout(() => {
            $(tagname).css("border","0px solid black")
            
        }, 3000);
    }

    function validateInputs(){

        if(formData.name.length <= 0){

            focusOnInput("#fullname")
            
            return false
        }
        if(formData.contact.length != 10){
            
            focusOnInput("#contact")
            return false
        } 
        if(formData.email.length <= 0){

            // let pattern = new RegExp("/^\S+@\S+\.\S+$/");

            // if(pattern.test(formData.email)){
            //     alert("invalid email")
            // }

            focusOnInput("#email")

            return false
        }

        
        return true
    }


    
    var response = grecaptcha.getResponse();

    if(response.length == 0){
        focusOnInput(".g-recaptcha")
        // return // return in production
    }

    if(validateInputs() == false){
        console.log(validateInputs());
        // return // return in production
    }

    


    var options = {
        "key": "rzp_test_ehEdF4zeyaOi4R", // Enter the Key ID generated from the Dashboard 
        // "key":"rzp_live_66re8JBVcXF0o7",  
        "amount": formData.donationAmount * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "name": "CFTI Smiles4Birthdays",
        "description": "Donation to"+donationTo,
        "image": URL + 'assets/images/website-images/CFTI_logo.png',

        "handler": function (response){
            var paymentid=response.razorpay_payment_id;


            $.ajax({
                url:URL+"api/process_donation_form",
                async:false,
                type:"POST",
                data:{
                    fullname:formData.name,
                    address:formData.address,
                    contact:formData.contact,
                    email:formData.email,
                    gender:formData.gender,
                    donationTo:formData.donationTo,
                    donationAmount:formData.donationAmount,
                    pan:formData.panNo,
                    attendBirthday:formData.attendFlag,
                    discloseIdentity:formData.identityFlag
                },
                success:function(finalresponse){
                    
                },
                complete:function(finres){
                    // console.log("Complete Redirect")
                }
                })

            
            let donationId = 0
            $.ajax({
                type: "GET",
                url: URL+"api/fetch_last_donation",
                async:false,
                dataType: "json",
                success: function (response) {
                    donationId = response
                    console.log(response)
                }
            });

            window.location.href= URL+"donation_success?id="+donationId;            

        },
        "theme": {
            "color": "#f5ab35"
            }
        };
    var rzp1 = new Razorpay(options);
    rzp1.open();

    });


});
</script>
