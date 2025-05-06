<!-- <?php print_r($donors[0]);?> -->
<section>
    <div class="recipient-table">
        
        <h2 class="text-2xl font-semibold">Donors</h2>

        <table class="w-full">
            <thead class=" bg-slate-200">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody id="donor-table-body">


                <!-- <?php foreach ($donors as $key => $value) {
                    
                    echo "<tr>
                            <td>$value[created_at]</td>
                            <td>$value[name]</td>
                            <td>$value[donation_amount]</td>
                            <td><a href=".base_url("admin/donors/$value[id]").">View</a></td>
                            <td><a href=".base_url("admin/donors/$value[id]").">Edit</a></td>
                        </tr>";
                }?> -->


            </tbody>
        </table>

        <div class="pagination-container my-4 px-4 justify-self-center sm:justify-self-start		">
            <div class="pagination">
                <ul class="flex ">
                    <li class=" "><button class="paginationBtns" id="firstPaginationBtn">First</button></li>
                    <li class=" "><button class="paginationBtns" id="prevPaginationBtn">Prev</button></li>
                    <!-- <li class="px-4 py-2 ">1</li>
                    <li class="px-4 py-2 ">2</li>
                    <li class="px-4 py-2 ">3</li> -->
                    <li class=" "><button class="paginationBtns" id="nextPaginationBtn">Next</button></li>
                    <li class=" "><button class="paginationBtns" id="lastPaginationBtn">Last</button></li>
                </ul>
            </div>
        </div>
        

    </div>

</section>

<script>
    $(document).ready(function () {
        let URL = $("#siteUrl").val()

        
        let arr = []
        $.ajax({
            'async': false,
            'type': "GET",
            'global': false,
            'dataType': 'json',
            'url': URL+"api/fetch_donors",
            'data': {},
            'success': function (data) {
                arr = data;
            }
        });

        let TotalRecords = arr.length
        let PerPage = 10
        let Pages = Math.ceil(TotalRecords/PerPage)

        let StartPage = 0
        let EndPage = Pages - 1
        let CurrentPageNo = 0
        // console.log(TotalRecords,PerPage,Pages,StartPage,EndPage)

        function fetch_donors(){           
            $("tbody").html("");
            
            $.get(`${URL}api/fetch_donors_desc`, {},
                function (data, textStatus, jqXHR) {
                    let j = 0
                    let offsetStart = CurrentPageNo * PerPage
                    // console.log(offsetStart);
                    $("tbody").html("");

                    for (const i of data) {
                        // console.log(i);
                        if(j >= offsetStart && j <offsetStart + PerPage){
                            content = `<tr>
                            <td>${i.id}</td>
                            <td>${(i.created_at.split(" ")).shift()}</td>
                            <td>${i.name}</td>
                            <td>${i.donation_amount}</td>
                            <td><a href="${URL}admin/donors/${i.id}">View</a></td>
                            <td><button data-id='${i.id}' class='deleteDonorBtn'>Delete</button></td></tr>`
                            $("tbody").append(content);
                        }

                        j++
                    }
                },
                "json"
            );
        }
        fetch_donors()

        // Action
        $("tbody").on("click",".deleteDonorBtn", function () {
            let id = $(this).attr("data-id")
            // console.log(id);
            let con = window.confirm(`Delete ${id}?`)
            if(con){

                $.get(`${URL}api/delete_donor/${id}`, {},
                    function (data, textStatus, jqXHR) {
                        // alert("Record Deleted")
                    },
                    "json"
                );

                fetch_donors()
            }
        });

        // Action

        // Pagination
        $("#nextPaginationBtn").click(function (e) { 
            e.preventDefault();

            if(CurrentPageNo < EndPage){
                CurrentPageNo++
            }

            fetch_donors()
            
        });
        $("#prevPaginationBtn").click(function (e) { 
            e.preventDefault();

            if(CurrentPageNo > StartPage){
                CurrentPageNo--
            }

            fetch_donors()
            
        });
        $("#firstPaginationBtn").click(function (e) { 
            e.preventDefault();

            CurrentPageNo = StartPage
            
            fetch_donors()
            
        }); $("#lastPaginationBtn").click(function (e) { 
            e.preventDefault();

            CurrentPageNo = EndPage
            

            fetch_donors()
            
        });
        // Pagination



    });
</script>