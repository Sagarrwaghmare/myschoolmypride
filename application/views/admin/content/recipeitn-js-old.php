let fetchAllRecipients = (offset,perPage) =>{
        // let fetchAllRecipients = () =>{

            // let length = 0
            $.get(URL+"api/fetch_recipients_desc", {},
            function (data, textStatus, jqXHR) {
                    let content = ""

                    let j =0
                    // let offset = sessionStorage.getItem("offset")
                    for (const i of data) {
                        if(j >= offset && j < (offset + perPage)){
                            // console.log(j);
                            content += `<tr> \
                                <td>${i.name}</td> \
                                <td>${i.birthdate}</td> \
                                <td>${i.address}</td> \
                                <td><a href='recipients/${i.id}'>View</a></td> \
                                <td><button class='delete-recipient-btn' data-id='${i.id}' data-unique-key='${i.profile_pic}' id='delete-recipient-btn'>Delete</button></td> \
                                </tr>`
                        }
                        j++;
                    }

                    // Total_records = data.length
                    // console.log(data)
                    $("#table-body").html(content);
                    
                    sessionStorage.setItem("TotalRecords",data.length)
                    // return length
                    // console.log("LENGTH ",length);
                },
                "json"
            );

            // return length
        }
        fetchAllRecipients(sessionStorage.getItem("offset"),perPage)
       
        
$("#prevPaginationBtn").click(function (e) { 
            e.preventDefault();

            let offset = Number(sessionStorage.getItem("offset"))
            if(offset > 0){
                offset = offset - 10
                sessionStorage.setItem("offset",offset)
                fetchAllRecipients(Number(sessionStorage.getItem("offset")),perPage)
                hidePaginationBtnsEvent()
                // console.log(Total_records,Number(sessionStorage.getItem("offset")));
            }

            
        });
        
$("#nextPaginationBtn").click(function (e) { 
    e.preventDefault();
    
    let offset = Number(sessionStorage.getItem("offset"))
    if(offset  < sessionStorage.getItem("TotalRecords") - perPage){
        offset = offset + 10
        sessionStorage.setItem("offset",offset)
        fetchAllRecipients(Number(sessionStorage.getItem("offset")),perPage)
        hidePaginationBtnsEvent()
        // console.log(Total_records,Number(sessionStorage.getItem("offset")));
    }
    
});