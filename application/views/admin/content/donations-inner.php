
<section>
    <div class="filter">
        Filters
        
    <div class="filters">
        <?php 
            $url = $_SERVER['REQUEST_URI'];
            $url = explode('/',$url);
            $month = array_pop($url);
            $year = array_pop($url);
            // print_r($year);
        ?>  
        <input type="text" id="inputYear"  value="<?=$year?>"  hidden>
        <input type="text" id="inputMonth" value="<?=$month?>" hidden>

        <div class="datefilterdiv">
            Date:
            <input type="date" name="startdate" id="startdate">
            to:
            <input type="date" name="enddate" id="enddate">
        </div>
        <div class="genderfilterdiv">
            <label for="genderfilter">Gender: </label>
            <select name="genderfilter" id="genderfilter">
                <option value="0">All</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        
        <div class="cityfilter">
            <label for="cityfilter">City: </label>
            <select name="cityfilter" id="cityfilter">
                <option value="0">All</option>
                <option value="mumbai">Mumbai</option>
                <option value="pune">Pune</option>
            </select>
        </div>

        <button id="filterbtn">Filter</button>
        <button id="refresh">Refresh</button>
    </div>  
    </div>

    <!-- <pre> -->
    <!-- <?php print_r($recipients);?> -->
    <div class="content">

        <table class="content w-full">
            <thead class="bg-white">
                <tr class='text-center'>
                    <td>Date</td>
                    <td>Name</td>
                    <td>Gender</td>
                    <td>City</td>
                    <td>Recipients</td>
                    <td>Amount</td>
                    <td colspan=2>Action</td>
                </tr>
            </thead>
            <tbody>

<!-- <td>". idToNameDonations($recipients,$value->donated_for)."</td>-->
                <!-- <?php foreach ($donation as $key => $value) {
                    
                    // echo 
                    // "<tr>
                    //     <td>$value->donation_date</td>
                    //     <td>$value->name</td>
                    //     <td>$value->gender</td>
                    //     <td>$value->city</td>
                    //     <td>$value->donated_for</td>

                    //     <td>$value->amount</td>
                    //     <td><a href='".base_url("admin/recipients/$value->donated_for")."'>View</a></td>
                    // </tr>";

                }?> -->

            </tbody>
        </table>
        <div class="pagination">
            <ul class="flex m-2">
                <!-- <button class="px-4 py-2 ">1</button> -->
                <!-- <button class="px-4 py-2 ">2</button> -->
                <!-- <button class="px-4 py-2 ">3</button> -->
                <button class="px-4 py-2 ">Next</button>
                <button class="px-4 py-2 ">Last</button>
            </ul>
        </div>
    </div>
</section>


<script>
    $(document).ready(function () {
        let URL = $("#siteUrl").val()
        
        function fetch_donations(){
            
            let currYear = $("#inputYear").val();
            let currMonth = $("#inputMonth").val();


            let gender = $("#genderfilter").val();
            let startdate = $("#startdate").val();
            let enddate = $("#enddate").val();
            let city = $("#cityfilter").val();

            console.log(gender,startdate,enddate == "")
            if(startdate == ""){
                startdate = 0
            }
            if(enddate == ""){
                enddate = 0
            }

            $.post(URL+"api/fetch_donations_by_year_filter/", {start:startdate,end:enddate,gender:gender,city:city,currYear:currYear,currMonth:currMonth},
                function (data, textStatus, jqXHR) {
                    // console.log(data); 

                    let Recp;
                    
                    $.ajaxSetup({async: false});  
                    $.post(URL+"api/fetch_recipients_key_value", {},
                        function (data, textStatus, jqXHR) {
                            Recp = data
                        },
                        "json"
                    );


                    // console.log(Recp);
                    $("tbody").html("");
                    data.reverse()

                    for (const i of data) {
                        
                        let RecpName = "Deleted"
                        if(Recp[Number(i.donated_for)] != undefined){
                                RecpName = Recp[Number(i.donated_for)].name
                        }
                        // console.log(Recp[Number(i.donated_for)],Recp[Number(i.donated_for)] == undefined,Number(i.donated_for));

                        content = `<tr class='text-center'>
                            <td>${i.donation_date}</td>
                            <td>${i.name}</td>
                            <td>${i.gender}</td>
                            <td>${i.city}</td>
                            <td>${RecpName}</td>
                            <td>${i.amount}</td>
                            <td class='text-center w-1/7  p-1 m-1 bg-white border-1 border-black rounded-sm'><a href='${URL}admin/donationInfo/${i.id}'>View</a></td>
                            <td class='text-center w-1/7  p-1 m-1 bg-white border-1 border-black rounded-sm'><button data-id='${i.id}' class='deleteDonationBtn'>Delete</button></td>
                        </tr>`
                        $("tbody").append(content);
                    }

                },
                "json"
            );
        }
        fetch_donations()

// ACTIONS
$("tbody").on("click",".deleteDonationBtn", function () {
    
    let con = window.confirm("Delete this record?")
    // href='${URL}api/delete_donation/${i.id}'


    if(con){
        let id = $(this).attr('data-id') 
        $.get(`${URL}api/delete_donation/${id}`, {},
            function (data, textStatus, jqXHR) {
                if(data == 1){
                    alert("Record Deleted")
                    window.location.reload()
                }
            },
            "json"
        );
    }
});
// ACTIONS
        
// FILTERS
    $("#refresh").click(function (e) { 
        e.preventDefault();
        window.location.reload()
    });
    $("#filterbtn").click(function (e) { 
            e.preventDefault();

            fetch_donations()
            
        });
// FILTERS
    });
</script>