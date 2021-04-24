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
  <title>mhs | manager</title>
  <link rel="stylesheet" href="css/evo-calendar.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css"
    integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous" />
  <link href="fontawesome/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="../logoutbtn.css" />

</head>

<body>
  <section class="calendar">
    <?php
  //   $uname= $_SESSION['username'];
  //   $urole= $_SESSION['urole'];
  //   $uhallid= $_SESSION['userhall'];
    
  //    $hallname="";
     
  //    $sql = "SELECT * FROM Hall WHERE hall_id='$uhallid'";
	// $result = mysqli_query($conn, $sql);
	// if ($result->num_rows > 0) {
  //       $row = mysqli_fetch_assoc($result);
  //       $hallname = $row['hall_name'];
  //       echo "<h3>Welcome " . $uname." Manager of ".$hallname."</h3>"; 
  //   }
    ?>
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
            <!-- <div class="booking-empty">
                <p>No event for today.. so take a rest! :)</p>
              </div> -->
            <div id="booking_view">
              <div class="event-container" role="button" data-event-index="19">
                <!-- <div class="event-icon">
                  <div
                    class="event-bullet-19"
                    style="background-color: red"
                  ></div>
                </div>
                <div class="event-info">
                  <p class="event-title">valima</p>
                  <p class="event-desc">
                    Hall: a<br />Cost: 200000<br />Conact:0303003030
                  </p>
                  <button
                    type="button"
                    class="btn btn-success"
                    id="19"
                    onclick="editEvent(this.id)"
                  >
                    Edit
                  </button>
                  <button
                    type="button"
                    class="btn btn-warning"
                    id="19"
                    onclick="deleteEvent(this.id)"
                  >
                    Delete
                  </button>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Inquiry Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Inquiry</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" onsubmit="eventHandler()">
          <div class="modal-body">
            <div class="mb-3">
              <label for="date" class="form-label">Date</label>
              <input type="date" name="event_date" class="form-control" id="On_event_date" require />
              <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
              <label for="islDate" class="form-label">Islamic Date</label>
              <input type="text" name="islDate" class="form-control" id="islDateInput" require />
            </div>
            <div class="mb-3">
              <label for="partyName" class="form-label">Party Name</label>
              <input type="text" name="partyName" class="form-control" id="partyName" require />
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea name="address" class="form-control" id="address" cols="30" rows="1" require></textarea>
            </div>
            <div class="mb-3">
              <label for="guest_contact" class="form-label">Contact</label>
              <input type="text" name="number_guest" class="form-control" id="contact" require />
            </div>
            <div class="mb-3">
              <label for="cnic" class="form-label">CNIC</label>
              <input type="text" name="cnic" class="form-control" id="cnic" require />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" require />
            </div>
            <div class="mb-3">
              <label for="event_number_guest" class="form-label">No. of Guest</label>
              <input type="number" name="number_guest" class="form-control" id="event_number_guest" require />
            </div>
            <div class="mb-3">
              <small>Select Hall</small>
              <label for="hall" class="form-label">A</label>
              <input type="radio" name="hall" value="a" id="hall" class="form-label" onchange="getTargetValue()" />
              <label for="hall" class="form-label">B</label>
              <input type="radio" name="hall" value="b" id="hall" class="form-label" onchange="getTargetValue()"/>
            </div>
            <div class="mb-3">
              <small>Select Shift</small>
              <label for="shift" class="form-label"><i class="fas fa-sun"></i></label>
              <input type="radio" name="inq_shift" value="morning" id="shift" class="form-label" onchange="getTargetValue()" />
              <label for="shift" class="form-label"><i class="fas fa-moon"></i></label>
              <input type="radio" name="inq_shift" value="evening" id="shift" class="form-label" onchange="getTargetValue()" />
            </div>

            <div class="mb-3">
              <label for="targetValue" class="form-label">Target Value</label>
              <input type="text" name="targetValue" class="form-control" id="targetValue" disabled />
            </div>
            <div class="mb-3">
              <label for="event_name" class="form-label">Event Name</label>
              <input type="text" name="name" class="form-control" id="event_name" require />
            </div>
            <div class="mb-3">
              <label for="event_cost" class="form-label">Estimated Cost Rs.</label>
              <input type="number" name="cost" class="form-control" id="event_cost" require />
            </div>


          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>

          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- edit inquiry modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Inquiry</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action=""  onsubmit ="editEventHandler()">
          <div class="modal-body">
            <div class="mb-3">
              <label for="editDate" class="form-label">Inquiry Id</label>
              <input type="text" id="edit_inq_id_concat" class="form-control" disabled />
            </div>
            <div class="mb-3">
            <input type="hidden" id="edit_id" class="form-control" />
              <label for="editDate" class="form-label">Date</label>
              <input type="date" name="event_date" class="form-control" id="Edit_On_event_date" require />
            </div>
            <div class="mb-3">
              <label for="editIslDate" class="form-label">Islamic Date</label>
              <input type="text" name="isl_event_date" class="form-control" id="editIslDate" require />
            </div>
            <div class="mb-3">
              <label for="editPartyName" class="form-label">Party Name</label>
              <input type="text" name="editPartyName" class="form-control" id="editPartyName" require />
            </div>
            <div class="mb-3">
              <label for="editAddress" class="form-label">Address</label>
              <textarea name="editAddress" class="form-control" id="editAddress" cols="30" rows="1" require></textarea>
            </div>
            <div class="mb-3">
              <label for="cnic" class="form-label">CNIC</label>
              <input type="text" name="cnic" class="form-control" id="editCnic" require />
            </div>
            <div class="mb-3">
              <label for="editemail" class="form-label">Email</label>
              <input type="email" name="editemail" class="form-control" id="editemail" require />
            </div>
            <div class="mb-3">
              <label for="edit_contact" class="form-label">Contact</label>
              <input type="text" name="number_guest" class="form-control" id="edit_contact" require />
            </div>
            <div class="mb-3">
              <small>Select Hall</small>
              <label for="edit_hall" class="form-label">A</label>
              <input type="radio" name="edit_hall" value="a" id="edit_a" class="form-label" />
              <label for="edit_hall" class="form-label">B</label>
              <input type="radio" name="edit_hall" value="b" id="edit_b" class="form-label" />
            </div>
            <div class="mb-3">
              <small>Select Shift</small>
              <label for="edit_inq_shift" class="form-label"><i class="fas fa-sun"></i></label>
              <input type="radio" name="edit_inq_shift" value="morning" id="edit_moning" class="form-label" />
              <label for="edit_inq_shift" class="form-label"><i class="fas fa-moon"></i></label>
              <input type="radio" name="edit_inq_shift" value="evening" id="edit_evening" class="form-label" />
            </div>
            <div class="mb-3">
              <label for="edit_event_name" class="form-label">Event Name</label>
              <input type="text" name="name" class="form-control" id="edit_event_name" require />
            </div>
            <div class="mb-3">
              <label for="edit_event_cost" class="form-label">Estimated Cost Rs.</label>
              <input type="number" name="cost" class="form-control" id="edit_event_cost" require />
            </div>
            <div class="mb-3">
              <label for="edit_event_number_guest" class="form-label">No. of Guest</label>
              <input type="number" name="number_guest" class="form-control" id="edit_event_number_guest" require />
            </div>

            <!-- <button type="button" class="btn btn-primary">Booking</button> -->
          </div>
          <div class="modal-footer">
            
            <div id="inq_print"></div>
            <button type="button" class="btn btn-warning" onclick="convertBooking()">Convert Booking</button>
            <button type="submit" class="btn btn-primary">Update</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Booking Modal -->
  <div class="modal fade" id="booking_modal" tabindex="-1" aria-labelledby="booking_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Booking</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="BookingSubmissionHandler()">
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <small>Booking Date</small>
                <input type="date" class="form-control" id="booking_date" require />
              </div>
              <div class="col">
                <small>Program Date</small>
                <input type="date" id="booking_program_date" class="form-control" require />
              </div>
              <div class="col">
                <small>Day</small>
                <input type="text" class="form-control" id="booking_program_day" require />
              </div>
            </div>
            <div class="mb-3">
              <label for="bookIslDate" class="form-label">Islamic Date</label>
              <input type="text" name="bookIslDate" class="form-control" id="bookIslDate" require />
            </div>
            <div class="mb-3">
              <small>Shift</small>
              <label for="morning" class="form-label"><i class="fas fa-sun"></i></label>
              <input type="radio" name="shift" value="morning" id="morning" class="form-label" />
              <label for="evening" class="form-label"><i class="fas fa-moon"></i></label>
              <input type="radio" name="shift" value="evening" id="evening" class="form-label" />
            </div>
            <div class="mb-3">
              <small>Select Hall</small>
              <label for="book_hall" class="form-label">A</label>
              <input type="radio" name="book_hall" value="a" id="book_a" class="form-label" />
              <label for="book_hall" class="form-label">B</label>
              <input type="radio" name="book_hall" value="b" id="book_b" class="form-label" />
            </div>


            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="booking_party_name" require />
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea type="number" name="address" class="form-control" id="booking_address" cols="30" rows="1"
                require></textarea>
            </div>
            <div class="mb-3">
              <label for="cell_no" class="form-label">Cell No</label>
              <input type="text" name="booking_cell_no" class="form-control" id="booking_cell_no" require />
            </div>
            <div class="mb-3">
              <label for="bookingcnic" class="form-label">CNIC</label>
              <input type="text" name="bookingcnic" class="form-control" id="bookingcnic" require />
            </div>
            <div class="mb-3">
              <label for="bookingEmail" class="form-label">Email</label>
              <input type="email" name="bookingEmail" class="form-control" id="bookingEmail" require />
            </div>
            <div class="mb-3">
              <label for="event_name" class="form-label">Event Name</label>
              <input type="text" name="booking_event_name" class="form-control" id="booking_event_name" require />
            </div>


            <div class="mb-3">
              <label for="bookAmnt" class="form-label">Book Amount</label>
              <input type="number" name="bookAmnt" class="form-control" id="bookAmnt"
                onchange="balanceCal(this.value)" />
            </div>
            <div class="mb-3">
              <label for="advance" class="form-label">Advance</label>
              <input type="number" name="booking_advance" class="form-control" id="booking_advance"
                onchange="balanceCal(this.value)" />
            </div>
            <div class="mb-3">
              <label for="balance" class="form-label">Balance</label>
              <input type="number" name="booking_balance" class="form-control" id="booking_balance" />
            </div>
            <div class="mb-3">
              <label for="booking_no_of_guests" class="form-label">No. of Guest</label>
              <input type="number" name="booking_no_of_guests" class="form-control" id="booking_no_of_guests" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Confirm Booking</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--Booking Edit Modal -->
  <div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Booking</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="BookingEditSubmissionHandler()">
          <div class="modal-body">
          <div class="mb-3">
              <label for="booking_id" class="form-label">Booking Id</label>
              <input type="text" class="form-control" id="edit_booking_id_concat" disabled/>

            </div>
            <div class="row">
              
              <div class="col">
                <small>Booking Date</small>
                <input type="date" class="form-control" id="booking_edit_date" />
                <input type="hidden" class="form-control" id="edit_booking_id" />
              </div>
              <div class="col">
                <small>Program Date</small>
                <input type="date" id="booking_edit_program_date" class="form-control" />
              </div>
              <div class="col">
                <small>Day</small>
                <input type="text" class="form-control" id="booking_edit_program_day" />
              </div>
            </div>
            <div class="mb-3">
              <label for="editbookIslDate" class="form-label">Islamic Date</label>
              <input type="text" name="bookIslDate" class="form-control" id="editbookIslDate" />
            </div>
            <div class="mb-3">
              <small>Shift</small>
              <label for="morning" class="form-label">Morning</label>
              <input type="radio" name="editshift" value="morning" id="editmorning" class="form-label" />
              <label for="evening" class="form-label">Evening</label>
              <input type="radio" name="editshift" value="evening" id="editevening" class="form-label" />
            </div>
            <div class="mb-3">
              <small>Select Hall</small>
              <label for="book_hall" class="form-label">A</label>
              <input type="radio" name="edit_book_hall" value="a" id="edit_book_a" class="form-label" />
              <label for="book_hall" class="form-label">B</label>
              <input type="radio" name="edit_book_hall" value="b" id="edit_book_b" class="form-label" />
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="edit_booking_party_name" />
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea type="number" name="address" class="form-control" id="edit_booking_address" cols="30"
                rows="1"></textarea>
            </div>
            <div class="mb-3">
              <label for="cell_no" class="form-label">Cell No</label>
              <input type="text" name="booking_cell_no" class="form-control" id="edit_booking_cell_no" />
            </div>
            <div class="mb-3">
              <label for="bookingcnic" class="form-label">CNIC</label>
              <input type="text" name="bookingcnic" class="form-control" id="editbookingcnic" />
            </div>
            <div class="mb-3">
              <label for="bookingEmail" class="form-label">Email</label>
              <input type="email" name="bookingEmail" class="form-control" id="editbookingEmail" />
            </div>
            <div class="mb-3">
              <label for="event_name" class="form-label">Event Name</label>
              <input type="text" name="booking_event_name" class="form-control" id="edit_booking_event_name" />
            </div>
          

            <div class="mb-3">
              <label for="bookAmnt" class="form-label">Book Amount</label>
              <input type="number" name="editbookAmnt" class="form-control" id="editbookAmnt"
                onchange="editBalanceCal()" />
            </div>
            <div class="mb-3">
              <label for="advance" class="form-label">Advance</label>
              <input type="number" name="editbooking_advance" class="form-control" id="edit_booking_advance"
                onchange="editBalanceCal()" />
            </div>
            <div class="mb-3">
              <label for="edit_booking_balance" class="form-label">Balance</label>
              <input type="number" name="edit_booking_balance" class="form-control" id="edit_booking_balance" />
            </div>
            <div class="mb-3">
              <label for="edit_booking_no_of_guests" class="form-label">No. of Guest</label>
              <input type="number" name="edit_booking_no_of_guests" class="form-control"
                id="edit_booking_no_of_guests" />
            </div>
          </div>
          <div class="modal-footer">
         <div id="print_btn"></div>
            <button type="submit" class="btn btn-primary">Update Booking</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--balance payment Modal -->
  <div class="modal fade" id="balPayment" tabindex="-1" aria-labelledby="balPaymentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Balance Payment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form onsubmit="addPayment()">
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <input type="hidden" id="balBookId" />
                <small>Program Date</small>
                <input type="date" class="form-control" id="balProgramDate" disabled />
              </div>
              <div class="col">
                <small>Payment Date</small>
                <input type="date" id="balPaymentDate" class="form-control" />
              </div>
            </div>
            <div class="mb-3">
              <label for="bookAmnt" class="form-label">Book Amount</label>
              <input type="number" name="balBookAmnt" class="form-control" id="balBookAmnt" onchange="editBalanceCal()"
                disabled />
            </div>
            <div class="my-3 container">
              <table class="table" id="partial_payment_table">
              </table>
            </div>
            <div class="mb-3" id="balpayment">
              <label for="bookAmnt" class="form-label">Payment</label>
              <input type="number" name="balPayment" class="form-control" id="balPaymentAmnt"
                onchange="changePayment()" />
            </div>
            <div class="mb-3" id="balBalance">
              <label for="bookAmnt" class="form-label">Balance</label>
              <input type="number" name="currentBal" class="form-control" id="balcurrentBal" disabled />
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="addBalance">Add</button>

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

    function eventHandler() {
      let date = document.getElementById("On_event_date").value;
      let islDate = document.getElementById("islDateInput").value;
      let partyName = document.getElementById("partyName").value;
      let address = document.getElementById("address").value;
      let cnic = document.getElementById("cnic").value;
      let email = document.getElementById("email").value;
      let event_name = document.getElementById("event_name").value;
      let event_cost = document.getElementById("event_cost").value;
      let event_number_guest = document.getElementById("event_number_guest")
        .value;
      let party_contact = document.getElementById("contact").value;
      let hall = "";
      let shit = "";
      let hall_select = document.getElementsByName("hall");
      for (i = 0; i < hall_select.length; i++) {
        if (hall_select[i].checked) {
          hall = hall_select[i].value;
        }
      }
      let shift_select = document.getElementsByName("inq_shift");
      for (i = 0; i < shift_select.length; i++) {
        if (shift_select[i].checked) {
          shit = shift_select[i].value;
        }
      }
      let push_data = {
        idate: date,
        ihijtidate: islDate,
        iname: partyName,
        iaddress: address,
        icontact: party_contact,
        icnic: cnic,
        iemail: email,
        iportion: hall,
        ishift: shit,
        ievent: event_name,
        icost: event_cost,
        iguest: event_number_guest,
      };
      // console.log("data=>",push_data);
      fetch("http://localhost/mhs_api/ves_api/api-insert.php", {
        method: "POST",
        body: JSON.stringify(push_data),
      })
        .then((result) => {
          result.json();
        })
        .catch((err) => {
          throw err;
        });

      // console.log(myEvents);
    }
    const editEventHandler = () => {
      let hall = "";
      let shift = "";
      let date = $("#Edit_On_event_date").val();
      let islDate = $("#editIslDate").val();
      let editPartyName = $("#editPartyName").val();
      let event_name = $("#edit_event_name").val();
      let editAddress = $("#editAddress").val();
      let editCnic = $("#editCnic").val();
      let editemail = $("#editemail").val();
      let event_cost = $("#edit_event_cost").val();
      let total_guest = $("#edit_event_number_guest").val();
      let contact = $("#edit_contact").val();
      let edit_id = $("#edit_id").val();
      let hall_select = document.getElementsByName("edit_hall");
      for (i = 0; i < hall_select.length; i++) {
        if (hall_select[i].checked) {
          hall = hall_select[i].value;
        }
      }
      let shift_select = document.getElementsByName("edit_inq_shift");
      for (i = 0; i < shift_select.length; i++) {
        if (shift_select[i].checked) {
          shift = shift_select[i].value;
        }
      }
      // console.log(hall);
      let editDataObj = {
        inqid: edit_id,
        idate: date,
        ihijtidate: islDate,
        iname: editPartyName,
        iaddress: editAddress,
        icontact: contact,
        icnic: editCnic,
        iemail: editemail,
        iportion: hall,
        ishift: shift,
        ievent: event_name,
        icost: event_cost,
        iguest: total_guest,
      };
      console.log(shift)

      console.log(editDataObj)

      fetch("http://localhost/mhs_api/ves_api/api-update.php", {
        method: "POST",
        body: JSON.stringify(editDataObj),
      })
        .then((result) => {
          result.json();
        })
        .catch((err) => {
          throw err;
        });
    };
    const convertBooking = () => {
      let hall = ""
      let shift = ""

      let date = $("#Edit_On_event_date").val();
      let islDate = $("#editIslDate").val();
      let editPartyName = $("#editPartyName").val();
      let event_name = $("#edit_event_name").val();
      let editAddress = $("#editAddress").val();
      let editCnic = $("#editCnic").val();
      let editemail = $("#editemail").val();
      let event_cost = $("#edit_event_cost").val();
      let total_guest = $("#edit_event_number_guest").val();
      let contact = $("#edit_contact").val();
      let edit_id = $("#edit_id").val();
      let hall_select = document.getElementsByName("edit_hall");
      for (i = 0; i < hall_select.length; i++) {
        if (hall_select[i].checked) {
          hall = hall_select[i].value;
        }
      }
      let shift_select = document.getElementsByName("edit_inq_shift");
      for (i = 0; i < shift_select.length; i++) {
        if (shift_select[i].checked) {
          shift = shift_select[i].value;
        }
      }

        var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

        var a = new Date(date);

        let PushBookObj = {
        bokdate: taodayDate(),
        bhijtidate: islDate,
        beventdate: date,
        beventday: weekday[a.getDay()+1],
        bpname: editPartyName,
        bpaddress: editAddress,
        bpcontact: contact,
        bpcnic: editCnic,
        bpemail: editemail,
        beventshift: shift,
        bportion: hall,
        beventname: event_name,
        bamount: event_cost,
        badvance: 0,
        bguest: total_guest,
        btotal: 0,
      };
      // console.log("pushObj=>", PushBookObj);
      fetch("http://localhost/mhs_api/ves_api/api-insert-booking.php", {
        method: "POST",
        body: JSON.stringify(PushBookObj),
      })
        .then((result) => {
          result.json();
        })
        // .then(() => console.log("sent successfull"))
        .catch((err) => {
          throw err;
        });
        location.reload();
    };
    const BookingSubmissionHandler = () => {
      let hallShift = "";
      let shiftOption = document.getElementsByName("shift");
      for (i = 0; i < shiftOption.length; i++) {
        if (shiftOption[i].checked) {
          hallShift = shiftOption[i].value;
        }
      }
      let hall = "";
      let hall_select = document.getElementsByName("book_hall");
      for (i = 0; i < hall_select.length; i++) {
        if (hall_select[i].checked) {
          hall = hall_select[i].value;
        }
      }
      let PushBookObj = {
        bokdate: $("#booking_date").val(),
        bhijtidate: $("#bookIslDate").val(),
        beventdate: $("#booking_program_date").val(),
        beventday: $("#booking_program_day").val(),
        bpname: $("#booking_party_name").val(),
        bpaddress: $("#booking_address").val(),
        bpcontact: $("#booking_cell_no").val(),
        bpcnic: $("#bookingcnic").val(),
        bpemail: $("#bookingEmail").val(),
        beventshift: hallShift,
        bportion: hall,
        beventname: $("#booking_event_name").val(),
        bamount: $("#bookAmnt").val(),
        badvance: $("#booking_advance").val(),
        bguest: $("#booking_no_of_guests").val(),
        btotal: 0,
      };
      // console.log("pushObj=>", PushBookObj);
      fetch("http://localhost/mhs_api/ves_api/api-insert-booking.php", {
        method: "POST",
        body: JSON.stringify(PushBookObj),
      })
        .then((result) => {
          result.json();
        })
        .then(() => console.log("sent successfull"))
        .catch((err) => {
          throw err;
        });
    };
  </script>
  <a class="logoutbtn" href="../logout.php">Logout</a>
</body>

</html>