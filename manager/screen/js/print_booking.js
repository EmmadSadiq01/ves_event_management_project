window.onload = () => {
  $.urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    return results[1] || 0;
  }

  let editBookingIdObj = {
    bookId: $.urlParam('id')
  };
  fetch("../../api/api-fetchId-booking.php", {
    method: "POST",
    body: JSON.stringify(editBookingIdObj),
  })
    .then((result) => {
      return result.json();
      // console.log(editData);
    })
    .then((data) => {
      $("#sno").html((parseInt(data[0].booking_id) + 1000));
      $("#todayDate").html(data[0].bookingDate);
      $("#funtionDate").html(data[0].eventDate);
      var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

      var a = new Date(data[0].eventDate);
      console.log(a.getDay())
      $("#eventDay").html(weekday[a.getDay() + 1]);
      $("#event_shift").html(data[0].eventShift);
      $("#hall_portion").html(data[0].hallportion);
      // $("#editbookIslDate").val(data[0].hijriDate);
      $("#party_name").html(data[0].personName);
      $("#address").html(data[0].personAddress);
      $("#phone").html(data[0].personContact);
      $("#cnic").html(data[0].personCinc);
      // $("#editbookingEmail").val(data[0].personEmail);
      $("#event_name").html(data[0].eventName);
      $("#booking_amnt").html(data[0].bookingAmount);
      $("#advance_amnt").html(data[0].advanceAmount);
      $("#no_of_guest").html(data[0].totalGuest);
      $("#total_amnt").html(data[0].bookingAmount - data[0].advanceAmount)

      
      //   if (data[0].hallportion === "a") {
      //     $("#edit_book_b").prop("checked", false);
      //     $("#edit_book_a").prop("checked", true);
      //   } else {
      //     $("#edit_book_a").prop("checked", false);
      //     $("#edit_book_b").prop("checked", true);
      //   }
      //   if (data[0].eventShift === "morning") {
      //     $("#editevening").prop("checked", false);
      //     $("#editmorning").prop("checked", true);
      //   } else {
      //     $("#editmorning").prop("checked", false);
      //     $("#editevening").prop("checked", true);
      //   }
      //   editBalanceCal();
      //   $("#editBookingModal").modal("show");
      console.log(data[0])
    })
    .catch((err) => {
      throw err;
    });
  console.log($.urlParam('id'))
}