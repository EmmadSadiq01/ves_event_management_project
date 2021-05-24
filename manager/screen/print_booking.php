<?php
include '../../admin_class.php'; 
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mhs | Manager</title>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="../fontawesome/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/booking.css">
</head>

<body>
    <div class="container">
        <div class="button text-center mb-3 hide-on-print">
            <button class="btn btn-primary " onclick="window.print()"><i class="fas fa-print"></i></button>
        </div>
        <div class="print_title">
            <h1>Estimate</h1>
        </div>
        <div class="print_header">
            <div class="entry_field">
                <h4>S.no</h4>
                <p>MHS-SM<span id="sno"></span></p>
            </div>
            <div class="entry_field">
                <h4>Date</h4>
                <p id="todayDate"></p>
            </div>
        </div>
        <div class="estimate_details">
            <div class="entry_field">
                <h4>Function Date</h4>
                <p id="funtionDate"></p>
            </div>
            <div class="entry_field">
                <h4>Day</h4>
                <p id="eventDay"> </p>
            </div>
            <div class="entry_field">
                <h4> Shift </h4>
                <p id="event_shift"> </p>
            </div>
            <div class="entry_field">
                <h4> Hall </h4>
                <p id="hall_portion"> </p>
            </div>
        </div>
        <div class="estimate_details">
            <div class="entry_field">
                <h4>Function Organizer Name</h4>
                <p id="party_name"></p>
            </div>

        </div>
        <div class="estimate_details">
            <div class="entry_field">
                <h4>Function Organizer CNIC No</h4>
                <p id="cnic">--</p>
            </div>

        </div>
        <div class="estimate_details">
            <div class="entry_field">
                <h4>Address</h4>
                <p id="address"></p>
            </div>

        </div>
        <div class="estimate_details">
            <div class="entry_field">
                <h4>Cell</h4>
                <p id="phone">--</p>
            </div>
        </div>
        <div class="estimate_details">
            <div class="entry_field">
                <h4>Number of Guests</h4>
                <p id="no_of_guest"></p>
            </div>
            <div class="entry_field">
                <h4>Occasion</h4>
                <p id="event_name"></p>
            </div>
        </div>

        <div class="container amount-details">
            <table>
                <tr>
                    <td>
                        <div class="amnt_desc">

                            <h3>Banquet Rent</h3>
                            <p></p>
                        </div>
                    </td>
                    <td>
                        <div class="amnt-box">

                            <h3>Rs</h3>
                            <p id="booking_amnt"></p>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="amnt_desc">

                            <h3>Advance Paid</h3>
                            <p></p>
                        </div>
                    </td>
                    <td>
                        <div class="amnt-box">

                            <h3>Rs</h3>
                            <p id="advance_amnt"></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="amnt_desc">

                            <h3>Balance</h3>
                            <p></p>
                        </div>
                    </td>
                    <td>
                        <div class="amnt-box">

                            <h3>Rs</h3>
                            <p id="total_amnt"></p>
                        </div>
                    </td>
                </tr>

            </table>

        </div>

        <div class="rule ">
            <h2>قوائد و ضوابط:۔</h2>
            <p dir="rtl"> 
                <br>⇦ بکنگ کینسل کرانے کی صورت میں ایڈوانس واپس نہیں ہوگا، تاریخ کی تبدیلی پر مروجہ ریٹ وصول کیا جائے گا۔ 
                <br>⇦ تاریخ کی تبدیلی مشروط ہے، تاریخ کی موجودگی پر۔ 
                <br>⇦ تمام بقایا جات تقریب سے 7 دن پہلے لازمی ادا کرنے ہوں گے۔ 
                <br>⇦ رقم چیک کی صورت میں وصول نہیں کی جائیگی۔ 
                <br>⇦ گورنمنٹ کی طرف سے جو ٹیکس لگے گا وہ پارٹی پر لاگو ہونگے۔ 
                <br>⇦ مہمان بڑھنے کی صورت میں چارجز ادا کرنے ہونگے۔ 
                <br>⇦ بکنگ کروانے کے بعد کسی قسم کی کوئی تبدیلی نہیں کی جائے گی۔ 
                <br>⇦ ہال میں کسی قسم کا نقصان مثلاً کراکری، کٹلری اور دیگر ڈیکوریشن کا سامان ٹوٹنے کا نقصان پارٹی کو ادا کرنا ہوگا۔ 
                <br>⇦ ہال میں کوئی بھی سامان لے جانے کی صورت میں اس کا ایڈوانس آفس میں جمع کراناہوگا۔ 
                <br>⇦بحکم انتظامیہ (حکومت سندھ) شادی بیاہ دیگر تقریبات میں اسلحہ، آتش بازی لانا یا استعمال کرنا قانوناً جرم ہے کسی غیر قانونی عمل کی ذمہ داری متعلقہ فرد اور دولہا پر ہوگی۔ لان انتظامیہ یا عملہ کسی بھی طرح کا ذمہ دار نہ ہوگا۔ 
                <br>⇦ کار پارکنگ قانونی دائرے میں رہ کر کریں ، گاڑی چوری ہونے یا لفٹر ہونے کی صورت میں ہال انتظامیہ ذمہ دار نہ ہوگی۔ 
                <br>⇦ جنریٹر خراب ہونے کی صورت میں (Air Conditioners) کا بیک اپ ایک گھنٹے میں دیا جائے گا۔ 
                <br>⇦ برائے مہربانی اپنی تقریب رات (12) بارہ بجے تک ختم کرلیں اور اپنے مہمانوں کو بھی وقت کی پابندی سے آگاہ کریں۔ 
                </p>
        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <script src="js/print_booking.js"></script>
</body>

</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print | MHS</title>
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
                    <h3 class="text-center">Estimate </h3>
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
                            <p class="mb-0"><strong>Portion & shift: </strong><span id="hall_portion"></span >/<span id="event_shift"></span></p>
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
                    <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>DESCRIPTION</th>
                        <th class="text-center" width="40%">Amount</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Banquet Rent</span>
                           <!-- <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id sagittis arcu.</small> -->
                        </td>
                        <td class="text-center">Rs <span id="booking_amnt"></span> </td>
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Advance Paid</span>
                        </td>
                        <td class="text-center">Rs <span id="advance_amnt"></span></td>
                     </tr>
                     <!-- <tr>
                        <td>
                           <span class="text-inverse">Balance</span>
                        </td>
                        <td class="text-center">Rs <span id="total_amnt"></span> </td>
                     </tr> -->
                  </tbody>
               </table>
            </div>
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
                            <small>Balance</small> Rs <span class="f-w-600" id="total_amnt"></span>
                        </div>
                    </div>
                    <!-- end invoice-price -->
                </div>
                <div class="rule ">
            <h2 class="text-center">قوائد و ضوابط:۔</h2>
            <p dir="rtl"> 
                <br>⇦ بکنگ کینسل کرانے کی صورت میں ایڈوانس واپس نہیں ہوگا، تاریخ کی تبدیلی پر مروجہ ریٹ وصول کیا جائے گا۔ 
                <br>⇦ تاریخ کی تبدیلی مشروط ہے، تاریخ کی موجودگی پر۔ 
                <br>⇦ تمام بقایا جات تقریب سے 7 دن پہلے لازمی ادا کرنے ہوں گے۔ 
                <br>⇦ رقم چیک کی صورت میں وصول نہیں کی جائیگی۔ 
                <br>⇦ گورنمنٹ کی طرف سے جو ٹیکس لگے گا وہ پارٹی پر لاگو ہونگے۔ 
                <br>⇦ مہمان بڑھنے کی صورت میں چارجز ادا کرنے ہونگے۔ 
                <br>⇦ بکنگ کروانے کے بعد کسی قسم کی کوئی تبدیلی نہیں کی جائے گی۔ 
                <br>⇦ ہال میں کسی قسم کا نقصان مثلاً کراکری، کٹلری اور دیگر ڈیکوریشن کا سامان ٹوٹنے کا نقصان پارٹی کو ادا کرنا ہوگا۔ 
                <br>⇦ ہال میں کوئی بھی سامان لے جانے کی صورت میں اس کا ایڈوانس آفس میں جمع کراناہوگا۔ 
                <br>⇦بحکم انتظامیہ (حکومت سندھ) شادی بیاہ دیگر تقریبات میں اسلحہ، آتش بازی لانا یا استعمال کرنا قانوناً جرم ہے کسی غیر قانونی عمل کی ذمہ داری متعلقہ فرد اور دولہا پر ہوگی۔ لان انتظامیہ یا عملہ کسی بھی طرح کا ذمہ دار نہ ہوگا۔ 
                <br>⇦ کار پارکنگ قانونی دائرے میں رہ کر کریں ، گاڑی چوری ہونے یا لفٹر ہونے کی صورت میں ہال انتظامیہ ذمہ دار نہ ہوگی۔ 
                <br>⇦ جنریٹر خراب ہونے کی صورت میں (Air Conditioners) کا بیک اپ ایک گھنٹے میں دیا جائے گا۔ 
                <br>⇦ برائے مہربانی اپنی تقریب رات (12) بارہ بجے تک ختم کرلیں اور اپنے مہمانوں کو بھی وقت کی پابندی سے آگاہ کریں۔ 
                </p>
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
    <script src="js/print_booking.js"></script>

</body>

</html>