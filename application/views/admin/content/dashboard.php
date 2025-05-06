

<section>
    <div class="upcoming-table">

        <h2 class="text-lg font-semibold">Upcoming Birthdays</h2>

        <table class="w-full">
            <thead class=" bg-white">
                <tr>
                    <th>ID</td>
                    <th>Name</td>
                    <th>Birthdate</td>
                    <th>Location</td>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($upcoming_birthdays as $key => $value) {
                    if($i == 3){ break;}
                    echo "
                        <tr>
                            <td>$value[id]</td>
                            <td>$value[name]</td>
                            <td>$value[birthdate]</td>
                            <td>$value[address]</td>
                        </tr>
                    ";
                    $i++;
                }?>

            </tbody>
        </table>


    </div>






    <div class="donations-table">

        <h2 class="text-lg font-semibold">Donations</h2>

        <table class="w-full">
            <thead class=" bg-white">
                <tr>
                    <th colspace="1">Date</th>
                    <th>Name</th>
                    <th>Recipients</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $i = 0;
                
                foreach ($donations as $key => $value) {
                    if($i == 3){break;}
                    echo "
                    <tr>
                        <td>$value[donation_date]</td>
                        <td>$value[name]</td>
                        <td>$value[donated_for]</td>
                        <td>$value[amount]</td>
                    </tr>
                    ";
                    $i++;
                }?>
            </tbody>
        </table>

    </div>

    
    <div class="backup">
            <h2 class="text-lg font-semibold my-2">Backup</h2>

            <a href="<?=base_url('admin/export')?>" class="p-2  bg-white ">Backup Download</a>            
    </div>
</section>

</section>
</main>