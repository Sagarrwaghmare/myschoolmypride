
<section>
    <div class="recipient-table">
        
        <h2 class="text-2xl font-semibold">Donations</h2>

        <table class="w-full">
            <thead class=" bg-slate-200">
                <tr>
                    <th>Month</th>
                    <th>Donations Amount</th>
                    <th>Donors</th>
                    <th class="">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($donations as $key => $value) {
                    echo "
                        <tr>
                            <td>".monthNoToMonthName($value['month'])." $value[year] </td>
                            <td>$value[amount]</td>
                            <td>$value[count]</td>
                            <td><a href='".base_url("admin/donations/$value[year]/$value[month]")."'>View</a></td>
                        </tr>
                        ";
                    } ?>


                    <!-- <td>Edit</td> -->
            </tbody>
        </table>

        <div class="pagination-container my-4 px-4 justify-self-center sm:justify-self-start		">
            <div class="pagination">
                <ul class="flex  pagination-nav">
                    
                    <!-- <li>First</li> -->
                    <!-- <li>Prev</li> -->
                    <li class="px-4 py-2 ">1</li>
                    <li class="px-4 py-2 ">2</li>
                    <li class="px-4 py-2 ">3</li>
                    <li class="px-4 py-2 ">Next</li>
                    <li class="px-4 py-2 ">Last</li>
                </ul>
            </div>
        </div>
        

    </div>

</section>


</section>
</main>


<script>
    $(document).ready(function () {
        let URL = $("#siteUrl").val()
        
    // Pagination
        let arr = []
        $.ajax({
            'async': false,
            'type': "GET",
            'global': false,
            'dataType': 'json',
            'url': URL+"api/fetch_donations_by_year",
            'data': {},
            'success': function (data) {
                arr = data;
            }
        });
        let TotalRecords = arr.length
        const PerPage = 10
        const Pages = Math.ceil(TotalRecords/PerPage)

        const StartPage = 0
        const EndPage = Pages - 1
        let CurrentPageNo = 0
        console.log(TotalRecords,PerPage,Pages,StartPage,EndPage);
            


        
        
        function displayPaginationBtns(){

            $(".pagination-nav").html("");

            // 1 first
            if(CurrentPageNo != StartPage){

                if(CurrentPageNo != StartPage +1){
                    $(".pagination-nav").append(`<button class="pagination-btns" id="firstPaginationBtn">First</button>`);
                }
            
            // 2 prev
                $(".pagination-nav").append(`<button class="pagination-btns" id="prevPaginationBtn">Prev</button>`);
            }
            

            // 3 number
            for (let i = StartPage; i <= EndPage; i++) {
                let disableElement = ""
                if(i == CurrentPageNo){
                    // disableElement = 
                    // disableElement = "text-white"
                }
                
                let minRange = CurrentPageNo - 2
                let maxRange = CurrentPageNo + 2

                if(i > minRange && i < maxRange){
                    $(".pagination-nav").append(`<button class="pagination-btns numberPaginationBtn ${disableElement}" id="noPaginationBtn" data-num="${i}">${i+1}</button>`); 
                }
            }


            // next

            if(CurrentPageNo != EndPage){
                $(".pagination-nav").append(`<button class="pagination-btns" id="nextPaginationBtn">Next</button>`);

            // last
                if(CurrentPageNo != EndPage - 1){
                    $(".pagination-nav").append(`<button class="pagination-btns" id="lastPaginationBtn">Last</button>`);
                }
            }
        }
        
        function displayRecords(){
            $("tbody").html("");
            let pageStart = CurrentPageNo * PerPage
            let pageEnd = (CurrentPageNo * PerPage) + PerPage

            if(CurrentPageNo < StartPage || CurrentPageNo > EndPage){
                return 0
            }

            function monthNoToMonthName(no){
                let months = {
                    "1":"Jan",
                    "2":"Feb",
                    "3":"March",
                    "4":"April",
                    "5":"May",
                    "6":"June",
                    "7":"July",
                    "8":"Aug",
                    "9":"Sept",
                    "10":"Oct",
                    "11":"Nov",
                    "12":"Dec"
                } 
                return months[no];
            }


            $.get(URL+"api/fetch_donations_by_year", {},
                function (data, textStatus, jqXHR) {
                    
                    for (let i = pageStart; i < pageEnd; i++) {
                        // if(arr.length > i){
                            content = `
                            <tr class="text-center">
                                <td class="w-2/7">${monthNoToMonthName(data[i].month)} ${data[i].year} </td>
                                <td class="w-2/7">${data[i].amount}</td>
                                <td class="w-2/7">${data[i].count}</td>
                                <td class='text-center w-1/7  p-1 m-1 bg-white border-1 border-black rounded-sm'><a class='' href='${URL+"admin/donations/"+data[i].year+"/"+data[i].month}'>View</a></td>
                            </tr>`
                            $("tbody").append(content);

                        // }
                    }    
                },
                "json"
            ); 

            

            displayPaginationBtns()
            
            return 1
        }

    // PAGINATION BTNS
        $(".pagination-nav").on("click","#nextPaginationBtn",function (e) { 
            e.preventDefault();
            CurrentPageNo++
            console.log(CurrentPageNo);
            displayRecords()
        });
            
        $(".pagination-nav").on("click","#prevPaginationBtn",function (e) { 
            e.preventDefault();
            CurrentPageNo--
            console.log(CurrentPageNo);
            displayRecords()
        });

        $(".pagination-nav").on("click","#lastPaginationBtn",function (e) { 
            e.preventDefault();
            CurrentPageNo = EndPage
            console.log(CurrentPageNo);
            displayRecords()
        });

        
        $(".pagination-nav").on("click","#firstPaginationBtn",function (e) { 
            e.preventDefault();
            CurrentPageNo = StartPage
            console.log(CurrentPageNo);
            displayRecords()
        });


        $(".pagination-nav").on("click",".numberPaginationBtn",function (e) { 
            e.preventDefault();
            let dataNum = $(this).attr('data-num')
            CurrentPageNo = Number(dataNum)
            console.log(CurrentPageNo);
            displayRecords()
        });
    // PAGINATION BTNS
    displayRecords()
    // Pagination



    });
</script>