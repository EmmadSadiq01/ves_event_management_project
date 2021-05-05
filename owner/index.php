<?php 

// include '../config.php';
// session_start();

// if (!isset($_SESSION['username']) && !isset($_SESSION['urole']) && !isset($_SESSION['userhall'])) {
//     header("Location: ../index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>mhs | owner</title>
  <link rel="stylesheet" href="css/evo-calendar.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <link href="fontawesome/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="../logoutbtn.css" />
</head>

<body>
  <section class="calendar">
    <div class="my_row">
      <div class="calendar_section">
        <div id="calendar" class="sidebar-hide"></div>
      </div>
      <div class="bookings_section">
        <div class="bookings">
          <div class="booking_container">
            <div class="booking_header">
              <h3>Booking Info:</h3>
              <p id="booking_event_date"></p>
            </div>
            <div id="booking_view">
              <div class="event-container" role="button" data-event-index="19">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- add target Modal -->
  <div class="modal fade" id="addTargetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addTarget" aria-hidden="true">
    <div class="modal-dialog  modal-lg  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Target</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form>
          <div class="modal-body">
            <div class="input-group mb-3">
              <span class="input-group-text">Today Date</span>
              <input type="date" id="todayDate" class="form-control" disabled/>
              <!-- <input type="hidden" id="hallId" class="form-control" value="1" />
              <input type="hidden" id="ownerid" class="form-control" value="2" /> -->
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Target Date</span>
              <input type="date" id="targetDate" class="form-control" disabled/>
            </div>
            <div class="my-3 container">
              <table class="table text-center">
                <thead>
                  <tr>
                    <!-- <th scope="col">Date</th> -->
                    <th scope="col">Hall</th>
                    <th scope="col">Shift</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>


                    <td scope="col">A</td>
                    <td scope="col"><i class="fas fa-sun"></i></td>
                    <td scope="col"><input type="number" id="amnt-a-morning"><input type="hidden" id="targetId-a-morning"></td>
                    <td scope="col"><input type="button" class="btn btn-success" id="addTargetBtn-a-morning"
                        value="confirm" onclick="addTargetHandler('morning','a')"></td>
                  </tr>
                  <tr>
                    <td scope="col">A</td>
                    <td scope="col"><i class="fas fa-moon"></i></td>
                    <td scope="col"><input type="number" id="amnt-a-evening"><input type="hidden" id="targetId-a-evening"></td>
                    <td scope="col"><input type="button" class="btn btn-success" id="addTargetBtn-a-evening"
                        value="confirm" onclick="addTargetHandler('evening','a')"></td>
                  </tr>
                  <tr>
                    <td scope="col">B</td>
                    <td scope="col"><i class="fas fa-sun"></i></td>
                    <td scope="col"><input type="number" id="amnt-b-morning"><input type="hidden" id="targetId-b-morning"></td>
                    <td scope="col"><input type="button" class="btn btn-success" id="addTargetBtn-b-morning"
                        value="confirm" onclick="addTargetHandler('morning','b')"></td>

                  </tr>
                  <tr>
                    <td scope="col">B</td>
                    <td scope="col"><i class="fas fa-moon"></i></td>
                    <td scope="col"><input type="number" id="amnt-b-evening"><input type="hidden" id="targetId-b-evening"></td>
                    <td scope="col"><input type="button" class="btn btn-success" id="addTargetBtn-b-evening"
                        value="confirm" onclick="addTargetHandler('evening','b')"></td>

                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- view bo0king modal  -->
  <div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Booking</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="BookingEditSubmissionHandler()">
          <div class="modal-body">
          <div class="mb-3">
              <label for="edit_booking_id_concat" class="form-label">Booking Id</label>
              <input type="text" class="form-control" id="edit_booking_id_concat" disabled />
            </div>
            <div class="row">
              <div class="col">
                <input type="hidden" id="edit_booking_id" />
                <small>Booking Date</small>
                <input type="date" class="form-control" id="booking_edit_date" disabled />
              </div>
              <div class="col">
                <small>Program Date</small>
                <input type="date" id="booking_edit_program_date" class="form-control" disabled />
              </div>
              <div class="col">
                <small>Day</small>
                <input type="text" class="form-control" id="booking_edit_program_day" disabled />
              </div>
            </div>
            <div class="mb-3">
              <label for="editbookIslDate" class="form-label">Islamic Date</label>
              <input type="text" name="bookIslDate" class="form-control" id="editbookIslDate" disabled />
            </div>
            <div class="mb-3">
              <small>Shift</small>
              <label for="morning" class="form-label"><i class="fas fa-sun"></i></label>
              <input type="radio" name="editshift" value="morning" id="editmorning" class="form-label" disabled />
              <label for="evening" class="form-label"><i class="fas fa-moon"></i></label>
              <input type="radio" name="editshift" value="evening" id="editevening" class="form-label" disabled />
            </div>
            <div class="mb-3">
              <small>Select Hall</small>
              <input type="radio" name="edit_book_hall" value="a" id="edit_book_a" class="form-label" disabled />
              <label for="book_hall" class="form-label">A</label>
              <input type="radio" name="edit_book_hall" value="b" id="edit_book_b" class="form-label" disabled />
              <label for="book_hall" class="form-label">B</label>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="edit_booking_party_name" disabled />
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea type="number" name="address" class="form-control" id="edit_booking_address" cols="30" rows="1"
                disabled></textarea>
            </div>
            <div class="mb-3">
              <label for="cell_no" class="form-label">Cell No</label>
              <input type="text" name="booking_cell_no" class="form-control" id="edit_booking_cell_no" disabled />
            </div>
            <div class="mb-3">
              <label for="bookingcnic" class="form-label">CNIC</label>
              <input type="text" name="bookingcnic" class="form-control" id="editbookingcnic" disabled />
            </div>
            <div class="mb-3">
              <label for="bookingEmail" class="form-label">Email</label>
              <input type="email" name="bookingEmail" class="form-control" id="editbookingEmail" disabled />
            </div>
            <div class="mb-3">
              <label for="event_name" class="form-label">Event Name</label>
              <input type="text" name="booking_event_name" class="form-control" id="edit_booking_event_name" disabled />
            </div>


            <div class="mb-3">
              <label for="bookAmnt" class="form-label">Book Amount</label>
              <input type="number" name="editbookAmnt" class="form-control" id="editbookAmnt"
                onchange="editBalanceCal()" disabled />
            </div>
            <div class="mb-3">
              <label for="advance" class="form-label">Advance</label>
              <input type="number" name="editbooking_advance" class="form-control" id="edit_booking_advance"
                onchange="editBalanceCal()" disabled />
            </div>
            <div class="mb-3">
              <label for="edit_booking_balance" class="form-label">Balance</label>
              <input type="number" name="edit_booking_balance" class="form-control" id="edit_booking_balance"
                disabled />
            </div>
            <div class="mb-3">
              <label for="edit_booking_no_of_guests" class="form-label">No. of Guest</label>
              <input type="number" name="edit_booking_no_of_guests" class="form-control" id="edit_booking_no_of_guests"
                disabled />
            </div>
            <!-- <button type="submit" class="btn btn-primary">Update</button> -->
          </div>
          <!-- <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="Submit" class="btn btn-primary">Save changes</button>
    </div> -->
        </form>
      </div>
    </div>
  </div>

  <!-- view Inquiry Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Inquiry</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" onclick="editEventHandler()">
          <div class="modal-body">
          <div class="mb-3">
              <label for="editIslDate" class="form-label">Inquiry Id</label>
              <input type="text" class="form-control" id="edit_id_inq" disabled/>
            </div>
            <div class="mb-3">
              <input type="hidden" id="edit_id" />
              <label for="editDate" class="form-label">Date</label>
              <input type="date" name="event_date" class="form-control" id="Edit_On_event_date" disabled />
            </div>
            <div class="mb-3">
              <input type="hidden" id="edit_id" />
              <label for="editIslDate" class="form-label">Islamic Date</label>
              <input type="text" name="isl_event_date" class="form-control" id="editIslDate" disabled />
            </div>
            <div class="mb-3">
              <label for="editPartyName" class="form-label">Party Name</label>
              <input type="text" name="editPartyName" class="form-control" id="editPartyName" disabled />
            </div>
            <div class="mb-3">
              <label for="editAddress" class="form-label">Address</label>
              <textarea name="editAddress" class="form-control" id="editAddress" cols="30" rows="1" disabled></textarea>
            </div>
            <div class="mb-3">
              <label for="cnic" class="form-label">CNIC</label>
              <input type="text" name="cnic" class="form-control" id="editCnic" disabled />
            </div>
            <div class="mb-3">
              <label for="editemail" class="form-label">Email</label>
              <input type="email" name="editemail" class="form-control" id="editemail" disabled />
            </div>
            <div class="mb-3">
              <label for="edit_contact" class="form-label">Contact</label>
              <input type="text" name="number_guest" class="form-control" id="edit_contact" disabled />
            </div>
            <div class="mb-3">
              <small>Select Hall</small>
              <label for="edit_hall" class="form-label">A</label>
              <input type="radio" name="edit_hall" value="a" id="edit_a" class="form-label" disabled />
              <label for="edit_hall" class="form-label">B</label>
              <input type="radio" name="edit_hall" value="b" id="edit_b" class="form-label" disabled />
            </div>
            <div class="mb-3">
              <label for="edit_event_name" class="form-label">Event Name</label>
              <input type="text" name="name" class="form-control" id="edit_event_name" disabled />
            </div>
            <div class="mb-3">
              <label for="edit_event_cost" class="form-label">Estimated Cost Rs.</label>
              <input type="number" name="cost" class="form-control" id="edit_event_cost" disabled />
            </div>
            <div class="mb-3">
              <label for="edit_event_number_guest" class="form-label">No. of Guest</label>
              <input type="number" name="number_guest" class="form-control" id="edit_event_number_guest" disabled />
            </div>

            <!-- <button type="button" class="btn btn-primary">Booking</button> -->
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>

  <script src="js/evo-calendar.js"></script>
  <script>
    let eventdate = "";
    let myEvents = [];
    let pushEnvents = {};
    let newEnvents = [];
    let after_split = "";
    let calendarEvents = [];

    // $(document).ready(function() {
    let url = "http://localhost/mhs_api/ves_api/api-fetch-all.php";
    fetch(url)
      .then((res) => res.json())
      .then((out) => {
        var monthsArray = new Array();
        monthsArray[0] = "January";
        monthsArray[1] = "February";
        monthsArray[2] = "march";
        monthsArray[3] = "April";
        monthsArray[4] = "May";
        monthsArray[5] = "June";
        monthsArray[6] = "July";
        monthsArray[7] = "August";
        monthsArray[8] = "September";
        monthsArray[9] = "October";
        monthsArray[10] = "November";
        monthsArray[11] = "December";

        for (let i = 0; i < out.length; i++) {
          eventdate = out[i].inquery_date;
          // console.log(eventdate)
          changeFormat = eventdate.split("-");
          let year = changeFormat[0];
          // let getMonth = new Date(eventdate).getMonth();
          let month = changeFormat[1] - 1;
          let date = changeFormat[2];
          // console.log(month)
          // let more_split_date = date.split(" ");
          after_split = monthsArray[month] + "/" + date + "/" + year;
          // console.log("in then", after_split);

          pushEnvents = {
            id: out[i].iquery_id,
            name: out[i].event_name,
            date: after_split,
            type: out[i].iquery_id,
            description:
              "Hall: " +
              out[i].hallportion +
              "</br>Cost: " +
              out[i].estimated_cost +
              "</br>Conact:" +
              out[i].personContact,
            everyYear: false,
            color: "red",
          };
          myEvents.push(pushEnvents);
        }
        // console.log(newEnvents);
        // myEvents = [
        //   {
        //     id: "1", // Event's ID (required)
        //     name: "Emmad Function", // Event name (required)
        //     date: after_split, // Event date (required)
        //     type: "A", // Event type (required)
        //     description:
        //       "Hall: A </br>Cost: 25,000 </br>Guest: 300 </br>Conact: 03412725048 ",
        //     everyYear: false, // Same event every year (optional)
        //     color: "red",
        //   }
        // ];
        $("#calendar").evoCalendar({
          theme: "Royal Navy",
          // settingName: settingValue
          calendarEvents: myEvents,
        });
        // console.log(out)
      })
      // .then(() => {
      //
      // })
      .catch((err) => {
        throw err;
      });
      // let calendarEvents = [];
      // myEvents = [
      //   {
      //     id: "1", // Event's ID (required)
      //     name: "Emmad Function", // Event name (required)
      //     date: after_split, // Event date (required)
      //     type: "A", // Event type (required)
      //     description:
      //       "Hall: A </br>Cost: 25,000 </br>Guest: 300 </br>Conact: 03412725048 ",
      //     everyYear: false, // Same event every year (optional)
      //     color: "red",
      //   },
      //   {
      //     id: "2", // Event's ID (required)
      //     name: "Hasnain Function", // Event name (required)
      //     date: "march/01/2021", // Event date (required)
      //     type: "B", // Event type (required)
      //     description:
      //       "Hall: B </br>Cost: 57,000 </br>Guest: 300 </br>Conact: 03412725048 ",
      //     everyYear: false, // Same event every year (optional)
      //     color: "blue",
      //   },
      // ];
      // $("#calendar").evoCalendar({
      //   theme: "Midnight Blue",
      //   // settingName: settingValue
      //   calendarEvents: myEvents,
      // });
      // console.log($("#calendar").evoCalendar())

      // console.log(myEvents[0].name);
      // });
      // console.log(myEvents);
      // console.log("format date =>", after_split);
  </script>
  <a class="logoutbtn" href="../logout.php">Logout</a>
</body>

</html>