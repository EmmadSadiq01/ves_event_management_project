<?php
include '../../admin_class.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/new_temp.css">
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="invoice">
                <!-- begin invoice-company -->
                <div class="invoice-company text-inverse f-w-600">
                    <span class="pull-right hidden-print">
                        <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i
                                class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                    </span>
                    <h3 class="text-center">INQUIRY </h3>
                </div>
                <!-- end invoice-company -->
                <!-- begin invoice-header -->
                <div class="invoice-header">
                    <div class="invoice-from">
                        <!-- <small>from</small> -->
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">Client Info</strong>
                            <p class="mb-0"> <strong>Name: </strong><span id="party_name"></span></p>
                            <p class="mb-0"> <strong>Contact: </strong><span id="phone" class="mb-0"></span></p>
                            <div class="client_address">
                                <p><strong>Address: </strong><span id="address"></span></p>
                            </div>
                        </address>
                    </div>
                    <div class="invoice-to">
                        <!-- <small>to</small> -->
                        <address class="m-t-5 m-b-5">
                            <!-- <strong class="text-inverse"></strong><br> -->
                            <p class="mb-0"><strong>Occasion: </strong><span id="event_name" class="mb-0"></span></p>
                            <p class="mb-0"><strong>No. of Guest: </strong><span id="no_of_guest"></span></p>
                            <p class="mb-0"><strong>Portion & shift: </strong><span id="hall_portion"></span></p>
                            <p class="mb-0"><strong>Function Date: </strong> <span id="funtionDate"></span></p>
                        </address>
                    </div>
                    <div class="invoice-date">
                        <small>Inquiry</small>
                        <div class="date text-inverse m-t-5"> <span id="todayDate"></span></div>
                        <div class="invoice-detail">
                            MHS-SM<span id="sno"></span><br>
                        </div>
                    </div>
                </div>
                <!-- end invoice-header -->
                <!-- begin invoice-content -->
                <div class="invoice-content">
                    <!-- begin table-responsive -->
                    <!-- <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>TASK DESCRIPTION</th>
                        <th class="text-center" width="10%">RATE</th>
                        <th class="text-center" width="10%">HOURS</th>
                        <th class="text-right" width="20%">LINE TOTAL</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Website design &amp; development</span><br>
                           <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                        </td>
                        <td class="text-center">$50.00</td>
                        <td class="text-center">50</td>
                        <td class="text-right">$2,500.00</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Branding</span><br>
                           <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                        </td>
                        <td class="text-center">$50.00</td>
                        <td class="text-center">40</td>
                        <td class="text-right">$2,000.00</td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Redesign Service</span><br>
                           <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small>
                        </td>
                        <td class="text-center">$50.00</td>
                        <td class="text-center">50</td>
                        <td class="text-right">$2,500.00</td>
                     </tr>
                  </tbody>
               </table>
            </div> -->
                    <!-- end table-responsive -->
                    <!-- begin invoice-price -->
                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <span class="text-inverse">0321-2616292</span>
                                    <small>Khurram Jalil Khan (Manager)</small>
                                </div>
                                <div class="sub-price">
                                    <span class="text-inverse">0322-2211043</span>
                                    <small>Shabir Ahmed (Manager)</small>
                                </div>
                                <div class="sub-price">
                                    <span class="text-inverse">0310-6648361</span>
                                    <small>Office</small>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>ESTIMATE COST</small> RS <span class="f-w-600" id="booking_amnt"></span>
                        </div>
                    </div>
                    <!-- end invoice-price -->
                </div>
                <!-- end invoice-content -->
                <!-- begin invoice-note -->
                <!-- <div class="invoice-note">
            * Make all cheques payable to [Your Company Name]<br>
            * Payment is due within 30 days<br>
            * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
         </div> -->
                <!-- end invoice-note -->
                <!-- begin invoice-footer -->
                <div class="invoice-footer">
                    <p class="text-center m-b-5 f-w-600">
                        <?php
                        echo $_SESSION['login_hall_address'] ;?>
                    </p>
                    <p class="text-center">
                        <span class="m-r-10">Developed BY: <i class="fa fa-fw fa-lg fa-globe"></i> ves-engr.com</span>
                    </p>
                </div>
                <!-- end invoice-footer -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="js/print_inquiry.js"></script>

</body>

</html>