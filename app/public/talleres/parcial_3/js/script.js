$( document ).ready(function() {
    // const SelectedTable = $( "#tables_selection" ).val();

    
    $( "#SelectBtn" ).click(function() {
        let SelectedTableName = $( "#tables_selection option:selected" ).text();
        $.ajax({
            dataType: "json",
            url: `http://127.0.0.1/talleres/parcial_3/table_data.php?name=${SelectedTableName}`,
            success: function(data) {
                // console.log(data)
                // console.log();
                $( "#table_header" ).empty();
                const id = Object.keys(data)[0];
                Object.keys(data[id]).forEach(key => {
                    console.log(key)
                    $("#table_header").append(`<th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">${key}</th>`);
                })
                $( "#table_body" ).empty();
                Object.keys(data).forEach(id => {
                    // console.log(id)
                    const tr = $("#table_body").append('<tr></tr>')
                    Object.keys(data[id]).forEach(key => {
                        console.log(data[id][key])
                        tr.append(`
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">${data[id][key]}
                            </td>`)//.append(`<th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">${data[id][key]}</th>`)
                        // $("#table_body").append(`<th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">${key}</th>`);
                    })
                })
                // Object.keys(data).forEach(id => {
                //     // console.log(id)
                // })
            }
        });
    });
    

});