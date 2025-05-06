
    <div class="addusers">
    <h2>Add User</h2>
    <form action="" id="addadmin" class="addadmin grid grid-cols-2 ">
        <input type="text" class="p-2 rounded-sm m-2" name="username" id="username" placeholder="Enter Username" required>
        <input type="email" class="p-2 rounded-sm m-2" name="email" id="email" placeholder="Enter Email" required>
        <input type="password" class="p-2 rounded-sm m-2" name="password" id="password" placeholder="Enter Password" required>
        <br>
        <input type="submit" class="p-2 rounded-sm m-2" value="Add">
    </form>
        

    </div>

    <div class="allusers">
        <h2>
            Users
        </h2>

        <table class="w-full">
            <!-- <?=print_r($admins)?> -->
            <thead class="bg-slate-200">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</section>
</main>

<script>
    const URL = $("#siteUrl").val();
    $(document).ready(function () {
        function fetchAdmins(){
            $("tbody").html("");

            $.get(URL+"api/fetch_admins", {},
                function (data, textStatus, jqXHR) {
                    
                    for (const i of data) {
                        
                        // console.log(i); 
                        content = `<tr>
                        <td>${i.id}</td>
                        <td>${i.username}</td>
                        <td>${i.email}</td>
                        <td>${i.password}</td>
                        <td class="">
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                        </tr>`
                        $("tbody").append(content)
                    }
                },
                "json"
            );
        }
        fetchAdmins()

        $("#addadmin").submit(function (e) { 
            e.preventDefault();
            
            let username = $("#username").val();
            let email = $("#email").val();
            let password = $("#password").val();
            let formData = {username:username,email:email,password:password}
            console.log(formData)

            $.post(URL+"api/add_admins", formData,
                function (data, textStatus, jqXHR) {
                //  console.log(data)   
                 if(data == "1"){
                    window.location.reload()
                 }
                }
            );
        });

    });
</script>