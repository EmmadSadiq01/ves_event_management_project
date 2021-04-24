window.onload = () => {

    $.urlParam = function(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        return results[1] || 0;
    }
    let fetchbookDetailObj = {
        bookId: $.urlParam('id')
    }
    let advAmnt = 0;
    let booking_amnt = 0;
    let bookingDate = 0;
    let html_payment = ''
    let total_payment = 0;

    fetch("http://localhost/mhs_api/ves_api/api-fetchId-booking.php", {
            method: "POST",
            body: JSON.stringify(fetchbookDetailObj),
        })
        .then((result) => {
            return result.json();
        }).then((data) => {
            $("#booking_id").html(parseInt(data[0].booking_id) + 1000);
            $("#booking_date").html(data[0].eventDate);
            $("#party_name").html(data[0].personName)
            advAmnt = data[0].advanceAmount
            booking_amnt = data[0].bookingAmount
            bookingDate = data[0].bookingDate
            html_payment += '<tr>'
            html_payment += '<td scope="row">' + (1) + '</td>'
            html_payment += '<td>' + bookingDate + '</td>'
            html_payment += '<td>' + advAmnt + '</td>'
            html_payment += '</tr>'

        })
        .then(() => {
            fetch("http://localhost/mhs_api/ves_api/api-fetchpayments-booking.php", {
                    method: "POST",
                    body: JSON.stringify(fetchbookDetailObj),
                })
                .then((result) => {
                    return result.json();
                })
                .then((data) => {
                    for (var i = 0; i < data.length; i++) {
                        let split_date = data[i].payment_date.split(" ")
                        html_payment += '<tr>'
                        html_payment += '<td scope="row">' + (i + 2) + '</td>'
                        html_payment += '<td>' + split_date[0] + '</td>'
                        html_payment += '<td>' + data[i].partial_payments + '</td>'
                        html_payment += '</tr>'
                        total_payment += parseFloat(data[i].partial_payments)
                    }
                    total_recieved = parseFloat(advAmnt) + total_payment
                    currentBalance = parseFloat(booking_amnt) - total_recieved

                    // html_payment += ' <tr><th scope="col" colspan="2" class="text-center ">Total Received</th><th scope="col" id="total_payment">' + total_recieved + '</th></tr>'
                    // html_payment += ' <tr><th scope="col" colspan="2" class="text-center ">Current Balance</th><th scope="col" id="total_payment">' + currentBalance + '</th></tr>'
                    // html_payment += '</tbody>'

                })
                // .then(() => {
                //     if (currentBalance === 0) {
                //         $("#balpayment").css("display", "none")
                //         $("#balBalance").css("display", "none")
                //         $("#addBalance").prop("disabled", true)
                //         $("#balPaymentDate").prop("disabled", true)
                //     } else {
                //         $("#balpayment").css("display", "block")
                //         $("#balBalance").css("display", "block")
                //         $("#addBalance").prop("disabled", false)
                //         $("#balPaymentDate").prop("disabled", false)
                //     }
                //     $("#partial_payment_table").html(html_payment)


            // })
            .then(() => {
                    $("#payments_table").html(html_payment)
                    $("#paid_amnt").html(total_recieved)
                    $("#balance").html(currentBalance)

                })
                .catch((err) => {
                    throw err;
                });
        })
        .catch((err) => {
            throw err
        })

}