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
          <!-- <div class="booking-empty">
            <p>No event for today.. so take a rest! :)</p>
          </div> -->
          <div id="booking_view">
            <div class="event-container" role="button" data-event-index="19">
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
        <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <form action="" onsubmit="eventHandler()">
        <div class="modal-body">
          <div class="mb-3">
            <label for="date" class="form-label">Function Date</label>
            <input type="date" name="event_date" class="form-control" id="On_event_date" disabled require />
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <div class="mb-3">
            <label for="islDate" class="form-label">Islamic Date</label>
            <input type="text" name="islDate" class="form-control" id="islDateInput" require />
          </div>
          <div class="mb-3">
            <label for="partyName" class="form-label">Name</label>
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
            <input type="radio" name="hall" value="a" class="form-label" onchange="getTargetValue()" />
            <label for="hall" class="form-label">B</label>
            <input type="radio" name="hall" value="b" class="form-label" onchange="getTargetValue()" />
          </div>
          <div class="mb-3">
            <small>Select Shift</small>
            <label for="shift" class="form-label"><i class="fas fa-sun"></i></label>
            <input type="radio" name="inq_shift" value="morning" class="form-label" onchange="getTargetValue()" />
            <label for="shift" class="form-label"><i class="fas fa-moon"></i></label>
            <input type="radio" name="inq_shift" value="evening" class="form-label" onchange="getTargetValue()" />
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
          <div class="mb-3">
            <label for="inq_remarks" class="form-label">Remarks</label>
            <textarea cols="30" rows="1" name="inq_remarks" class="form-control" id="inq_remarks" require></textarea>
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
        <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <form action="" onsubmit="editEventHandler()">
        <div class="modal-body">
          <div class="mb-3">
            <label for="editDate" class="form-label">Inquiry Id</label>
            <input type="text" id="edit_inq_id_concat" class="form-control" disabled />
          </div>
          <div class="mb-3">
            <input type="hidden" id="edit_id" class="form-control" />
            <label for="editDate" class="form-label">Inquiry Date</label>
            <input type="date" name="inq_date" class="form-control" id="Edit_inq_date" disabled require />
          </div>
          <div class="mb-3">
            <input type="hidden" id="edit_id" class="form-control" />
            <label for="editDate" class="form-label">Function Date</label>
            <input type="date" name="event_date" class="form-control" id="Edit_On_event_date" disabled require />
          </div>
          <div class="mb-3">
            <label for="editIslDate" class="form-label">Islamic Date</label>
            <input type="text" name="isl_event_date" class="form-control" id="editIslDate" require />
          </div>
          <div class="mb-3">
            <label for="editPartyName" class="form-label">Name</label>
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
          <div class="mb-3">
            <label for="edit_inq_remarks" class="form-label">Remarks</label>
            <textarea cols="30" rows="1" name="edit_inq_remarks" class="form-control" id="edit_inq_remarks" require></textarea>
          </div>


          <!-- <button type="button" class="btn btn-primary">Booking</button> -->
        </div>
        <div class="modal-footer">

          <div id="inq_print"></div>
          <button type="button" class="btn btn-warning" id="convertBookingBtn" onclick="convertBooking()">Convert Booking</button>
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
        <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <form onsubmit="BookingSubmissionHandler()">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <small>Booking Date</small>
              <input type="date" class="form-control" id="booking_date" disabled require />
            </div>
            <div class="col">
              <small>Function Date</small>
              <input type="date" id="booking_program_date" class="form-control" disabled require />
            </div>
            <div class="col">
              <small>Day</small>
              <input type="text" class="form-control" id="booking_program_day" disabled require />
            </div>
          </div>
          <div class="mb-3">
            <label for="bookIslDate" class="form-label">Islamic Date</label>
            <input type="text" name="bookIslDate" class="form-control" id="bookIslDate" require />
          </div>
          <!-- <div class="mb-3">
            <small>Shift</small>
            <label for="morning" class="form-label"><i class="fas fa-sun"></i></label>
            <input type="radio" name="shift" value="morning" id="morning" class="form-label"/>
            <label for="evening" class="form-label"><i class="fas fa-moon"></i></label>
            <input type="radio" name="shift" value="evening" id="evening" class="form-label"/>
          </div>
          <div class="mb-3">
            <small>Select Hall</small>
            <label for="book_hall" class="form-label">A</label>
            <input type="radio" name="book_hall" value="a" id="book_a" class="form-label"/>
            <label for="book_hall" class="form-label">B</label>
            <input type="radio" name="book_hall" value="b" id="book_b" class="form-label"/>
          </div> -->
          <div class="mb-3 container" id="available_slots">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Hall</th>
                  <th scope="col">Morning</th>
                  <th scope="col">Evening</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">A</th>
                  <td><input type="radio" name="hallSlots" value="morning_a" id="morning_a" class="form-label" /></td>
                  <td><input type="radio" name="hallSlots" value="evening_a" id="evening_a" class="form-label" /></td>
                </tr>
                <tr>
                  <th scope="row">B</th>
                  <td><input type="radio" name="hallSlots" value="morning_b" id="morning_b" class="form-label" /></td>
                  <td><input type="radio" name="hallSlots" value="evening_b" id="evening_b" class="form-label" /></td>
                </tr>
              </tbody>

            </table>
          </div>
          <!-- <div class="mb-3" id="duplicateAlert"></div> -->


          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="booking_party_name" require />
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea type="number" name="address" class="form-control" id="booking_address" cols="30" rows="1" require></textarea>
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
            <input type="number" name="bookAmnt" class="form-control" id="bookAmnt" onchange="balanceCal(this.value)" />
          </div>
          <div class="mb-3">
            <label for="advance" class="form-label">Advance</label>
            <input type="number" name="booking_advance" class="form-control" id="booking_advance" onchange="balanceCal(this.value)" />
          </div>
          <div class="mb-3">
            <label for="balance" class="form-label">Balance</label>
            <input type="number" name="booking_balance" class="form-control" id="booking_balance" />
          </div>
          <div class="mb-3">
            <label for="booking_no_of_guests" class="form-label">No. of Guest</label>
            <input type="number" name="booking_no_of_guests" class="form-control" id="booking_no_of_guests" />
          </div>
          <div class="mb-3">
            <label for="booking_remarks" class="form-label">Remarks</label>
            <textarea cols="30" rows="1" name="booking_remarks" class="form-control" id="booking_remarks"></textarea>
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
        <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <form onsubmit="BookingEditSubmissionHandler()">
        <div class="modal-body">
          <div class="mb-3">
            <label for="booking_id" class="form-label">Booking Id</label>
            <input type="text" class="form-control" id="edit_booking_id_concat" disabled />

          </div>
          <div class="row">

            <div class="col">
              <small>Booking Date</small>
              <input type="date" class="form-control" id="booking_edit_date" />
              <input type="hidden" class="form-control" id="edit_booking_id" />
            </div>
            <div class="col">
              <small>Function Date</small>
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
          <!-- <div class="mb-3">
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
          </div> -->
          <div class="mb-3">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Hall</th>
                  <th scope="col">Morning</th>
                  <th scope="col">Evening</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">A</th>
                  <td><input type="radio" name="edithallSlots" value="morning_a" id="editmorning_a" class="form-label" /></td>
                  <td><input type="radio" name="edithallSlots" value="evening_a" id="editevening_a" class="form-label" /></td>
                </tr>
                <tr>
                  <th scope="row">B</th>
                  <td><input type="radio" name="edithallSlots" value="morning_b" id="editmorning_b" class="form-label" /></td>
                  <td><input type="radio" name="edithallSlots" value="evening_b" id="editevening_b" class="form-label" /></td>
                </tr>
              </tbody>

            </table>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="edit_booking_party_name" />
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea type="number" name="address" class="form-control" id="edit_booking_address" cols="30" rows="1"></textarea>
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
            <input type="number" name="editbookAmnt" class="form-control" id="editbookAmnt" disabled onchange="editBalanceCal()" />
          </div>
          <div class="mb-3">
            <label for="advance" class="form-label">Advance</label>
            <input type="number" name="editbooking_advance" class="form-control" id="edit_booking_advance" onchange="editBalanceCal()" />
          </div>
          <div class="mb-3">
            <label for="edit_booking_balance" class="form-label">Balance</label>
            <input type="number" name="edit_booking_balance" class="form-control" id="edit_booking_balance" />
          </div>
          <div class="mb-3">
            <label for="edit_booking_no_of_guests" class="form-label">No. of Guest</label>
            <input type="number" name="edit_booking_no_of_guests" class="form-control" id="edit_booking_no_of_guests" />
          </div>
          <div class="mb-3">
            <label for="edit_booking_remarks" class="form-label">Remarks</label>
            <textarea cols="30" rows="1" name="edit_booking_remarks" class="form-control" id="edit_booking_remarks"></textarea>
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
        <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <form onsubmit="addPayment()">
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <input type="hidden" id="balBookId" />
              <small>Function Date</small>
              <input type="date" class="form-control" id="balProgramDate" disabled />
            </div>
            <div class="col">
              <small>Payment Date</small>
              <input type="date" id="balPaymentDate" class="form-control" />
            </div>
          </div>
          <div class="mb-3">
            <label for="bookAmnt" class="form-label">Book Amount</label>
            <input type="number" name="balBookAmnt" class="form-control" id="balBookAmnt" onchange="editBalanceCal()" disabled />
          </div>
          <div class="my-3 container">
            <table class="table" id="partial_payment_table">
            </table>
          </div>
          <div class="mb-3" id="balpayment">
            <label for="bookAmnt" class="form-label">Payment</label>
            <input type="number" name="balPayment" class="form-control" id="balPaymentAmnt" onchange="changePayment()" />
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
<!--Add Packages Modal -->
<div class="modal fade" id="addPackages" tabindex="-1" aria-labelledby="addPackagesModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Packages</h5>
        <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <form onsubmit="addPakages()">
        <div class="modal-body">
          <div class="showBookedPkgs">
            <table class="table ">
              <table class="table table-bordered text-center" id="pkgTable">


              </table>
          </div>
          <div class="row" id="addPackagesBox">
            <input type="hidden" id="packageBookingId">
            <div class="col-2 small-6 columns">
              <select name="add_package_name" class="form-control" placeholder="Package Name" id="select_pkg_1" onchange="getSelectPkgPrice(1)">
                <option value="">select</option>
              </select>
            </div>
            <div class="col-2 small-6 columns">
              <input type="text" name="add_package_price" class="form-control" placeholder="Package Price" id="select_pkg_price_1" onchange="calculateTotal(this.id.slice(17))">
            </div>
            <div class="col-2 small-6 columns">
              <input type="number" name="add_package_qty" class="form-control" placeholder="Qunantity" id="select_pkg_qty_1" onchange="calculateTotal(this.id.slice(15))">
              <input type="number" name="add_package_calculate" class="form-control" placeholder="Total" id="select_pkg_calculate_1" disabled>
            </div>

            <div class="col-2 small-6 columns">
              <textarea name="pkg_desc" id="pkg_desc_1" class="form-control" cols="30" rows="1" placeholder="Pakage Description"></textarea>
            </div>

            <div class="col-2 small-6 columns">
              <input type="checkbox" class="mx-3" id="include_1"> <label for="">Included</label>
            </div>

            <div class="col-2 small-6 columns">
              <div class="btn btn-warning" id="add_1" onclick="addPackageRow()">Add</div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--Hall Packages Modal -->

<div class="modal fade" id="hallPackages" tabindex="-1" role="dialog" aria-labelledby="hallPackagesLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hallPackagesLabel">Hall Packages</h5>
        <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <div class="modal-body">


        <div class="showPkgs">
          <table class="table table-bordered text-center" id="showPkgs">

          </table>
        </div>
        <form action="" class="row align-center">
          <div class="modal-body">
            <div class="mb-3" id="balBalance">
              <label for="package_name" class="form-label">Package Name</label>
              <input type="text" name="package_name" id="package_name" class="form-control" required />
            </div>
            <div class="mb-3" id="balBalance">
              <label for="pkg_price" class="form-label">Sell Price</label>
              <input type="number" required name="pkg_price" id="pkg_price" class="form-control" required />
            </div>
            <div class="mb-3" id="balBalance">
              <label for="pkg_ret_price" class="form-label">Return Price</label>
              <input type="number" required name="pkg_ret_price" id="pkg_ret_price" class="form-control" required />
            </div>
            <!-- <div class="small-12 medium-6 columns small-centered">
            
            <div class="row">
              <div class="small-12 columns">
                
                <input type="text" required name="package_name" id="package_name" placeholder="Package Name">
              </div>
            </div>
            <div class="row">
              <div class="small-12 columns">
                <input type="number" required name="pkg_price" id="pkg_price" placeholder="Sell Price">
              </div>
            </div>
            <div class="row">
              <div class="small-12 columns">
                <input type="number" required name="pkg_ret_price" id="pkg_ret_price" placeholder="Return Price">
              </div>
            </div>
          </div> -->


            <div class="modal-footer">
              <!-- <button type="buuton" class="btn btn-primary">Submit</button> -->
              <input type="button" class="btn btn-primary" value="Submit" onclick="addPkgData()">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Return Packages-->
<div class="modal fade" id="returnPackages" tabindex="-1" role="dialog" aria-labelledby="returnPackagesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="returnPackagesLabel">Return Packages</h5>
        <i class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>
      <form action="" class="row align-center" onsubmit="submitReturn()">
        <div class="modal-body">
          <input type="hidden" id="return_pak_pkgId">
          <input type="hidden" id="return_pak_pkgBookId">
          <input type="hidden" id="return_pak_bookingID">
          <div class="small-12 medium-6 small-centered">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Return Package</span>
              <input type="text" class="form-control" placeholder="Username" name="return_pak_name" id="return_pak_name" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Return Price</span>
              <input type="text" class="form-control" placeholder="Username" name="return_pak_price" id="return_pak_price" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Qunantity</span>
              <input type="number" class="form-control" placeholder="Username" name="return_pak_qty" id="return_pak_qty" aria-label="Username" aria-describedby="basic-addon1" onchange="totalReturn()">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Total</span>
              <input type="number" class="form-control" placeholder="Username" name="return_pak_total" id="return_pak_total" aria-label="Username" aria-describedby="basic-addon1">
            </div>

          </div>


          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="manager/js/evo-calendar.js"></script>
<script src="manager/css/button/button.js"></script>
<script>
  let eventdate = "";
  let myEvents = [];
  let pushEnvents = {};
  let newEnvents = [];
  let after_split = "";
  let calendarEvents = [];
  let add_row = 2;

  // $(document).ready(function() {
  let url = "./api/api-fetch-all.php";
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
      fetch('./api/api-getHallShortCode.php')
        .then(resonse => resonse.json())
        .then(hallCode => {
          for (let i = 0; i < out.length; i++) {
            eventdate = out[i].inquery_date;
            changeFormat = eventdate.split("-");
            let year = changeFormat[0];
            let month = changeFormat[1] - 1;
            let date = changeFormat[2];
            after_split = monthsArray[month] + "/" + date + "/" + year;

            pushEnvents = {
              id: out[i].iquery_id,
              name: out[i].event_name,
              date: after_split,
              type: out[i].iquery_id,
              description: "<b>HMS-" + hallCode + "-" + (1000 + parseInt(out[i].iquery_id)) + "</b><br/>Name:" +
                out[i].personName + "<br/>Hall/shift: " +
                out[i].hallportion +
                "/" + out[i].hall_shift + "</br>Cost: " +
                out[i].estimated_cost +
                "</br>Conact:" +
                out[i].personContact,
              everyYear: false,
              color: "red",
            };
            myEvents.push(pushEnvents);
          }
        })
      $("#calendar").evoCalendar({
        theme: "Royal Navy",
        calendarEvents: myEvents,
      });
    })
    .catch((err) => {
      throw err;
    });

  function eventHandler() {
    start_load()
    let date = document.getElementById("On_event_date").value;
    let islDate = document.getElementById("islDateInput").value;
    let partyName = document.getElementById("partyName").value;
    let address = document.getElementById("address").value;
    let cnic = document.getElementById("cnic").value;
    let email = document.getElementById("email").value;
    let event_name = document.getElementById("event_name").value;
    let event_cost = document.getElementById("event_cost").value;
    let remarks = document.getElementById("inq_remarks").value;
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
      remarks: remarks,
    };
    // console.log("data=>",push_data);
    fetch("./api/api-insert.php", {
        method: "POST",
        body: JSON.stringify(push_data),
      })
      .then((result) => {
        result.json();
      })
      .catch((err) => {
        throw err;
      });
    end_load()
    // console.log(myEvents);
  }
  const editEventHandler = () => {
    start_load()
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
    let remarks = $("#edit_inq_remarks").val();
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
      remarks: remarks,
    };
    console.log(shift)

    console.log(editDataObj)

    fetch("./api/api-update.php", {
        method: "POST",
        body: JSON.stringify(editDataObj),
      })
      .then((result) => {
        result.json();
      })
      .catch((err) => {
        throw err;
      });
    end_load()
  };
  const convertBooking = () => {
    start_load()
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
    let remarks = $("#edit_inq_remarks").val();
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

    var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

    var a = new Date(date);

    let PushBookObj = {
      bokdate: taodayDate(),
      bhijtidate: islDate,
      beventdate: date,
      beventday: weekday[a.getDay() + 1],
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
      remarks: remarks,
    };
    // console.log("pushObj=>", PushBookObj);
    fetch("./api/api-insert-booking.php", {
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
    end_load()
    location.reload();

  };
  const BookingSubmissionHandler = () => {
    start_load()
    let shiftOption = document.getElementsByName("hallSlots");
    let shift_hall = ""
    for (i = 0; i < shiftOption.length; i++) {
      if (shiftOption[i].checked) {
        shift_hall = shiftOption[i].value;
      }
    }
    let split_shit = shift_hall.split("_")

    // let hall = "";
    // let hall_select = document.getElementsByName("book_hall");
    // for (i = 0; i < hall_select.length; i++) {
    //   if (hall_select[i].checked) {
    //     hall = hall_select[i].value;
    //   }
    // }
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
      beventshift: split_shit[0],
      bportion: split_shit[1],
      beventname: $("#booking_event_name").val(),
      bamount: $("#bookAmnt").val(),
      badvance: $("#booking_advance").val(),
      bguest: $("#booking_no_of_guests").val(),
      btotal: 0,
      remarks: $("#booking_remarks").val(),
    };
    // console.log("pushObj=>", PushBookObj);
    fetch("./api/api-insert-booking.php", {
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

    end_load()
  };
  const addPackageRow = () => {
    let html = '';

    html += '<div class="col-2  small-6 columns">'
    html += '<select name="add_package_name" class="form-control"  placeholder="Package Name" id="select_pkg_' + add_row + '"  onchange="getSelectPkgPrice(' + add_row + ')">'
    html += ' <option value="">select</option>'
    html += '  </select>'
    html += ' </div>'
    html += ' <div class="col-2 small-6 columns">'
    html += '  <input type="text" name="add_package_price" class="form-control"  placeholder="Package Price"  id="select_pkg_price_' + add_row + '">'
    html += ' </div>'
    html += ' <div class="col-2 small-6 columns">'
    html += '<input type="number" name="add_package_qty" class="form-control" placeholder="Qunantity" id="select_pkg_qty_' + add_row + '"  onchange="calculateTotal(this.id.slice(15))">'
    html += '   <input type="number" name="add_package_calculate" class="form-control" placeholder="Total"  id="select_pkg_calculate_' + add_row + '" disabled></div>'
    html += '   <div class="col-2 small-6 columns">'
    html += '<textarea name="pkg_desc" id="pkg_desc_' + add_row + '"  class="form-control"  cols="30" rows="1" placeholder="Pakage Description"></textarea>'
    html += '</div>'
    html += '<div class="col-2 small-6 columns">'
    html += '<input type="checkbox" class="mx-3" id="include_' + add_row + '"> <label for="">Included</label>'
    html += '</div>'
    html += '<div class="col-2 small-6 columns">'
    html += ' <div class="btn btn-warning" id="add_' + add_row + '" onclick="addPackageRow()">Add</div>'
    html += ' </div>'
    $('[id^=add_]').hide()
    // $('#add_' + add_row).hide()
    $('#addPackagesBox').append(html);
    fetchPkgData(add_row)
    add_row += 1;


  }
  let pkg_shown = false
  const addPkgData = () => {
    let pkg_name = $('#package_name').val();
    let pkg_amnt = $('#pkg_price').val()
    let return_price = $('#pkg_ret_price').val()
    let pushPakageDataObj = {
      pkgName: pkg_name,
      pkgAmnt: pkg_amnt,
      return_price: return_price
    }
    fetch('./api/api-pkg-insert.php', {
        method: 'POST',
        body: JSON.stringify(pushPakageDataObj)
      })
      .then((result) => {
        return result.json();
      })
      .then(() => {

        pkg_shown = true
        showPkg()
        $('#package_name').val("");
        $('#pkg_price').val("")
        $('#pkg_ret_price').val("")
        pkg_shown = false

      })
      .catch((err) => {
        throw err;
      });

  }
  const showPkg = () => {
    let url = "./api/api-packages-fetch.php";
    fetch(url)
      .then((res) => res.json())
      .then((data) => {
        let html = '';
        html += '    <thead>'
        html += '  <tr>'
        html += '<th>#</th>'
        html += '<th>Name</th>'
        html += '<th>Sell Price</th>'
        html += '<th>Return Price</th>'
        html += '<th>Action</th>'
        html += '</tr>'
        html += '</thead>'
        html += '<tbody>'
        for (let i = 0; i < data.length; i++) {
          html += '<tr>'
          html += '<td>' + (i + 1) + '</td>'
          html += '<td id="pkg_name_' + data[i].packages_id + '">' + data[i].package_name + '</td>'
          html += '<td id="pkg_cost_' + data[i].packages_id + '">' + data[i].pkg_cost + '</td>'
          html += '<td id="pkg_return_' + data[i].packages_id + '">' + data[i].return_price + '</td>'
          html += '<td><button  id="e_' + data[i].packages_id + '" class="btn btn-success" value="" onclick="editPkg(this.id)"><i class="fas fa-edit"></i> Edit</button><button type="button" id="d_' + data[i].packages_id + '" class="btn btn-danger" onclick="delPkg(this.id)"><i class="fas fa-trash-alt"></i></button></td>'
          html += '</tr>'
        }
        html += '</tbody>'
        $('#showPkgs').html(html)
        if (pkg_shown != true) {
          $('#hallPackages').modal('show')

        }
      })
      .catch((err) => {
        throw err;
      });

  }
  const fetchPkgData = (row_num) => {
    fetch('./api/api-pkg-fetch.php')
      .then((data) => {
        return data.json()
      })
      .then((res) => {
        let pkgObjLength = res.length
        for (let i = 0; i < pkgObjLength; i++) {
          $('#select_pkg_' + row_num).append(' <option value="' + res[i].packages_id + '">' + res[i].package_name + '</option>')
        }
      })
  }
  const getSelectPkgPrice = (row_num) => {
    let getPriceID = {
      pkgId: $('#select_pkg_' + row_num).val()
    }
    fetch('./api/api-pkg-getPrice.php', {
        method: 'POST',
        body: JSON.stringify(getPriceID)
      })
      .then((res) => {
        return res.json()
      })
      .then((render) => {
        $('#select_pkg_price_' + row_num).val(render[0].pkg_cost)
      })
  }
  const addPakages = () => {
    start_load()
    let pkg_price = ''
    let selected_pk = ''
    let selected_pkg_name = ''
    let booking_id = ''
    let included = ''
    for (let i = 1; i < add_row; i++) {
      pkg_price = $('#select_pkg_calculate_' + i).val()
      selected_pkg = $('#select_pkg_' + i).val()
      qty_pkg = $('#select_pkg_qty_' + i).val()
      desc_pkg = $('#pkg_desc_' + i).val()
      selected_pkg_name = $('#select_pkg_' + i + ' :selected').text()
      booking_id = $('#packageBookingId').val()
      if ($('#include_' + i).is(' :checked')) {
        included = 'included';
      } else {
        included = 'not included'
      }
      // console.log($('#include_'+i))
      let addPackageObj = {
        pkg_id: selected_pkg,
        pkg_name: selected_pkg_name,
        pkg_cost: pkg_price,
        qty_pkg: qty_pkg,
        pkg_desc: desc_pkg,
        booking_id: booking_id,
        included: included
      }
      console.log(addPackageObj)
      if (addPackageObj.qty_pkg === "" || addPackageObj.pkg_id === "" || addPackageObj.pkg_name === "select" || addPackageObj.pkg_cost === "") {
        console.log("no")
      } else {
        fetch('./api/api-bookedPackages-insert.php', {
            method: 'POST',
            body: JSON.stringify(addPackageObj)
          })
          .then((res) => {
            return res.json()
          })
          .catch((err) => {
            throw err
          })
      }

    }
    //       add_package_price

    // $('[id^=add_]')
    end_load()
    window.open("./manager/screen/print_packages.php?id=" + booking_id, "_blank");

  }
  const calculateTotal = (id) => {
    $('#select_pkg_calculate_' + id).val($('#select_pkg_price_' + id).val() * $('#select_pkg_qty_' + id).val())

  }

  const editPkg = (id) => {
    let pkg_namme = $('#pkg_name_' + id.slice(2)).html()
    $('#pkg_name_' + id.slice(2)).html('<input type="text" id="pkg_name_inp_' + id.slice(2) + '" value="' + pkg_namme + '">')
    let pkg_cost = $('#pkg_cost_' + id.slice(2)).html()
    $('#pkg_cost_' + id.slice(2)).html('<input type="number" id="pkg_cost_inp_' + id.slice(2) + '" value="' + pkg_cost + '">')
    let pkg_return = $('#pkg_return_' + id.slice(2)).html()
    $('#pkg_return_' + id.slice(2)).html('<input type="number" id="pkg_return_inp_' + id.slice(2) + '" value="' + pkg_return + '">')
    $('#e_' + id.slice(2)).attr('onclick', 'updatePkg(this.id)')
    $('#e_' + id.slice(2)).attr('class', 'btn btn-warning')
    $('#e_' + id.slice(2)).attr('id', 'u_' + id.slice(2))
    // $('#u_' + id.slice(2)).attr('value', 'update')
    $('#u_' + id.slice(2)).html("Update")



  }
  const delPkg = (id) => {
    console.log(id)
    let editPkgObj = {
      packages_id: id.slice(2)
    }
    if (confirm("do you want to delete?")) {
      fetch('./api/api-pkg-del.php', {
          method: 'POST',
          body: JSON.stringify(editPkgObj)
        })
        .then((res) => {
          return res.json()
        })
        .then(() => {
          // window.location.reload();
          showPkg()
        })
        .catch((err) => {
          throw err
        })
    }

  }
  const updatePkg = (id) => {
    editPkgObj = {
      packages_id: id.slice(2),
      package_name: $('#pkg_name_inp_' + id.slice(2)).val(),
      pkg_cost: $('#pkg_cost_inp_' + id.slice(2)).val(),
      return_price: $('#pkg_return_inp_' + id.slice(2)).val()
    }
    console.log(id.slice(2))
    fetch('./api/api-pkg-update.php', {
        method: 'POST',
        body: JSON.stringify(editPkgObj)
      })
      .then((res) => {
        showPkg()
        return res.json()
      })
      .then(showPkg())
      .catch((err) => {
        throw err
      })

  }
</script>