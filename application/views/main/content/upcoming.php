<main class="mx-5 my-10">
    <div class="upcomingBirthdays flex flex-col justify-items-center items-center">
        <h2 class="text-center font-semibold text-2xl mb-5">Upcoming Birthdays</h2>

        <div class="card-container grid sm:grid-cols-2 md:grid-cols-3 w-full"
        style="max-width: 1200px;"
        >
            <?php 
                foreach ($upcoming_birthdays as $key => $value) {
                    echo upcomingBirthday($value['name'],changeToMonthlyFormate($value['birthdate']),$value['profile_pic'],$value['sponsored'],numhash($value['id']));
                }
            ?>

        </div>


            <div class="pagination-container my-4 px-4 justify-self-center sm:justify-self-start		">
                <div class="pagination">
                    <ul class="flex space-x-4 
                    ">

                        <!-- <li>First</li> -->
                        <!-- <li>Prev</li> -->
                        <!-- <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>Next</li>
                        <li>Last</li> -->
                        <?php
                        echo $this->pagination->create_links();
                        ?>
                    </ul>
                    
                </div>
            </div>
        
        

    </div>

</main>
