<!-- <div class="bg-[#f5ab35]"> -->

<main class="mx-5 my-10  flex flex-col">


    


    <div class="upcomingBirthdays flex flex-col justify-items-center items-center">
        

        <div class="progress-bar-upcoming w-4/5 bg-gray-400 h-2">
            <div class="progress-upcoming bg-[#f5ab35]  h-2"
            style="width:20%;"></div>
        </div>
        

        <h2 class="text-center font-semibold text-2xl mt-5  ">Upcoming Birthdays</h2>

        <p class="text-center text-lg font-thin my-5 text-slate-500">Would You Like To Be The Reason Of Their Happiness?</p>

        <div class="card-container grid sm:grid-cols-2 md:grid-cols-3 w-full"
        style="max-width: 1200px;"
        >

            <?php 
                $i=0;
                foreach ($upcoming_birthdays as $key => $value) {
                    if ($i == 6) {break;}
                    $i++;

                    echo upcomingBirthday($value['name'],changeToMonthlyFormate($value['birthdate']),$value['profile_pic'],$value['sponsored'],numhash($value['id']));
                }
            ?>

        </div>
            <div class="pagination-container my-4 px-4 justify-self-center sm:justify-self-start		">
                <div class="pagination">
                    <a href="upcoming"
                        class="view-more-btn
                        flex space-x-4
                        bg-[#f5ab35] text-white 
                        py-2 px-3 rounded-[5px]">
                        View More
                    </a>
                </div>
            </div>
        
        

    </div>











    
    <div class="upcomingBirthdays flex flex-col justify-items-center items-center">
        
        <div class="progress-bar-celebrated w-4/5 bg-gray-400 h-2">
            <div class="progress-celebrated bg-[#f5ab35]  h-2"
            style="width:20%;"></div>
        </div>

        <h2 class="text-center  font-semibold text-2xl my-10">Celebrated Birthdays</h2>

        <div class="card-container celebrated-birthdays-card-container grid sm:grid-cols-2 md:grid-cols-3 w-full"
        style="max-width: 1200px;"
        >
                
            <?php 
                $i=0;
                foreach ($celebrated_birthdays as $key => $value) {
                    if ($i == 6) {break;}
                    
                    echo celebratedBirthdays($value['name'],changeToMonthlyFormate($value['birthdate']),$value['profile_pic'],"Juluis Prapati",numhash($value['id']));
                    
                    $i++;
                }
            ?>

        </div>
            <div class="pagination-container my-4 px-4 justify-self-center sm:justify-self-start		">
                <div class="pagination">
                    <a href="celebrated"
                        class="view-more-btn
                        flex space-x-4
                        bg-[#f5ab35] text-white 
                        py-2 px-3 rounded-[5px]  ">
                        View More
                    </a>
                </div>
            </div>
        
        

    </div>

</main>


<script>
    $(document).ready(function () {
        let URL = "http://localhost/main/old/work/craft/project1/website/site-demo/smiles4birthdays-demo/"

        let elements;
        $.get(URL+"api/fetch_celebrated", {},
            function (data, textStatus, jqXHR) {

             console.log(data[0])   
             elements=data
             
                let start = 1
                let limit = Math.round(elements.length/3)
                let globalCelebratedConstant = 1
                console.log(start,limit)

                let rangeEnd = globalCelebratedConstant*3 
                let rangeStart = rangeEnd - 3
                
                content = ""
                for (let i=0;i<elements.length;i++) {

                    if(i >= rangeStart && i < rangeEnd){
                        content+= "\
                        <a href='profile/$id' class='flex justify-center'>\
                            <div class='profile-card flex flex-col items-center my-2 border-2 border-white rounded-md'style='width:250;border:1px solid gray;'>\
                                <div class='card-innter p-4 '>\
                                    <img src='' alt='Art1.jpg' width=230 style='height:198px;' class='rounded-md'>\
                                    <div class='inner-card text-center'>\
                                        <h4>"+elements[i].name+"</h4>\
                                        <h4>Smile Sponsored by "+elements[i].sponsored_by+"</h4><h4>$birthdate</h4>\
                                    </div>\
                                </div>\
                            </div>\
                        </a>"
                        
                    }
                }

                $(".celebrated-birthdays-card-container").html(content);

            }
        );
        

        // let elements = [1,2,3,4,5,6]
        // let elements = [1,2,3,4,5,6]
        // 1,2,3,,,4,5,6
        // 1,2
        // if 1 then 3x1 = 3 :: range(3-3,3) = (0,3)
        // if 2 then 3x2 = 6 :: range(6-3,6) = (3,6)



        






        console.log(
            // $(".upcomingBirthdays").html()
        ); 
            
        
    })
</script>