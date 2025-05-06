<!-- <div class="bg-[#f5ab35]"> -->

<main class="mx-5 my-10  flex flex-col">


    


    <div class="upcomingBirthdays flex flex-col justify-items-center items-center">

        <div class="upcoming-progress-bar bg-black h-1.5 w-4/5">
            <div class="upcoming-progress bg-[#f5ab35] h-1.5"
            style="width:20%;"></div>
        </div>

        <h2 class="text-center font-semibold text-2xl mt-5  ">Upcoming Birthdays</h2>

        <p class="text-center text-lg font-thin my-5 text-slate-500">Would You Like To Be The Reason Of Their Happiness?</p>

        <div class="card-container upcoming-card-container grid sm:grid-cols-2 md:grid-cols-3 w-full"
        style="max-width: 1200px;"
        >

            <?php 
                $i=0;
                foreach ($upcoming_birthdays as $key => $value) {
                    // if ($i == 6) {break;}
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











    
    <div class="celebratedBirthdays flex flex-col justify-items-center items-center">
        
        <div class="celebrated-progress-bar bg-black h-1.5 w-4/5">
            <div class="celebrated-progress bg-[#f5ab35] h-1.5"
            style="width:20%;"></div>
        </div>

        <h2 class="text-center  font-semibold text-2xl my-10">Celebrated Birthdays</h2>

        <div class="card-container celebrated-card-container grid sm:grid-cols-2 md:grid-cols-3 w-full"
        style="max-width: 1200px;"
        >
                
            <?php 
                $i=0;
                foreach ($celebrated_birthdays as $key => $value) {
                    // if ($i == 6) {break;}

                    $name = idToNameDonations($donations,$value['sponsored_by']);
                    
                    echo celebratedBirthdays($value['name'],changeToMonthlyFormate($value['birthdate']),$value['profile_pic'],$name,numhash($value['id']));
                    
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

<!-- </div> -->


<script>
    $(document).ready(function () {
        let upcomingCards = $(".upcoming-birthday-card")
        let celebratedCards = $(".celebrated-birthday-card")

        let start = 1
        let upcomingLimit =   (Math.round(upcomingCards.length/3)) +1
        let celebratedLimit = (Math.round(celebratedCards.length/3)) +1
        // console.log(upcomingLimit,celebratedLimit)
        // let limit = Math.round(elements.length/3)
        // console.log(start,limit)

        // let elements = [1,2,3,4,5,6]
        // 1,2,3,,,4,5,6
        // 1,2
        // if 1 then 3x1 = 3 :: range(3-3,3) = (0,3)
        // if 2 then 3x2 = 6 :: range(6-3,6) = (3,6)
        // let elements = [1,2,3,4,5,6]
        function setCardsCelebrated(constant){
            // let elements = $(".celebrated-birthday-card")
            let globalCelebratedConstant = constant

            let rangeEnd = globalCelebratedConstant*3 
            let rangeStart = rangeEnd - 3
            
            let content = ""
            for (let i = 0; i < celebratedCards.length; i++) {
    
                if(i >= rangeStart && i < rangeEnd){
                    content += $(celebratedCards[i])[0].outerHTML
                    // console.log(i,$(celebratedCards[i]).attr('data-id'),rangeStart,rangeEnd);
                }
            }
    
            $(".celebrated-card-container").html(content);

            
            let progress = (constant*100)/celebratedLimit
            progress = 50

            $(".celebrated-progress").attr("style", "width:"+progress+"%;");
        }
        
        function setCardsUpcoming(constant){
            // let elements = $(".upcoming-birthday-card")
            let globalCelebratedConstant = constant

            let rangeEnd = globalCelebratedConstant*3 
            let rangeStart = rangeEnd - 3
            
            let content = ""
            for (let i = 0; i < upcomingCards.length; i++) {
    
                if(i >= rangeStart && i < rangeEnd){
                    content += $(upcomingCards[i])[0].outerHTML
                    // console.log(i,$(upcomingCards[i]).attr('data-id'),rangeStart,rangeEnd);
                }
            }
    
            $(".upcoming-card-container").html(content);
            
            let progress = (constant*100)/upcomingLimit
            progress = 50
            // 100 = 17
            // x     c
            $(".upcoming-progress").attr("style", "width:"+progress+"%;");
        }



        
        setCardsCelebrated(1)
        setCardsUpcoming(1)
        let n = 2
        let m = 2

        
        setInterval(() => {

            if(n > upcomingLimit){
                n = 1
            }
            if(m > celebratedLimit){
                m = 1
            }

            // setCardsCelebrated(m) 
            //   setCardsUpcoming(n)
            //   console.log(n,m);
              n++
              m++
        }, 3000);

        





        

    });
</script>