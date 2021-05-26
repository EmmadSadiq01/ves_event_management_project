window.onload = () => {

    $.urlParam = function(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        return results[1] || 0;
    }
    let fetchbookDetailObj = {
        bookId: $.urlParam('id')
    }
    let html_payment = ''

    fetch("../../api/api-fetchId-booking.php", {
            method: "POST",
            body: JSON.stringify(fetchbookDetailObj),
        })
        .then((result) => {
            return result.json();
        }).then((data) => {
            $("#booking_id").html(parseInt(data[0].booking_id) + 1000);
            $("#booking_date").html(data[0].eventDate);
            $("#party_name").html(data[0].personName)

        })
        .then(() => {
            fetch("../../api/api-bookedPackages-fetchByBookingId.php", {
                    method: "POST",
                    body: JSON.stringify(fetchbookDetailObj),
                })
                .then((result) => {
                    return result.json();
                })
                .then((data) => {
                    for (var i = 0; i < data.length; i++) {
                        html_payment += '<tr>'
                        html_payment += '<td scope="row" class="text-center">' + (i + 1) + '</td>'
                        html_payment += '<td class="text-center">' + data[i].datetime + '</td>'
                        html_payment += '<td>' + data[i].pkg_name + '</td>'
                        html_payment += '<td>' + (parseInt(data[i].pkg_cost) - parseInt(data[i].return_amnt)) + '</td>'
                        html_payment += '<td>' + data[i].included
                        if(data[i].included === "not included"){
                            html_payment += " ( Payable )"
                        }
                        else{
                            html_payment += " ( Include In Booking Amount )"
                        }
                        html_payment += '</td>'
                        html_payment += '</tr>'
                    }

                })
            .then(() => {
                    $("#payments_table").html(html_payment)
                    // $("#paid_amnt").html(total_recieved)
                    // $("#balance").html(currentBalance)

                })
                .catch((err) => {
                    throw err;
                });
        })
        .catch((err) => {
            throw err
        })

}