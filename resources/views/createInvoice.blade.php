<!DOCTYPE html>
<!-- saved from url=(0053)https://getbootstrap.com/docs/5.3/examples/dashboard/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    

    

<link href="/template/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="https://getbootstrap.com/docs/5.3/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/template/dashboard.css" rel="stylesheet">
  <style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Invoice APP</a>
  
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file align-text-bottom" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              Invoice
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Invoice</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="/" class="btn btn-sm btn-outline-secondary" style="margin-right: 5px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"/></svg>
                Back
            </a>
            <a href="#" onclick="submitForm()" class="btn btn-sm btn-outline-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Save 
            </a>
        </div>
      </div>
      <form id="form-invoice" method="post" action="/save-invoice">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Invoice Subject</label>
            <input type="text" class="form-control" id="inv-subject" name="invoice_subject" aria-describedby="emailHelp">
            <div id="inv-subject" class="text-danger visually-hidden">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" id="due-date">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Sender</label>
            <select class="form-select" name="sender_id" aria-label="Default select example">
                <option value="0">--Select Recipient--</option>
                @foreach($allAddress as $item)
                    <option value="{{$item->address_id}}">{{$item->address_recipient_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Recipient</label>
            <select class="form-select" name="recipient_id" aria-label="Default select example">
                <option value="0">--Select Recipient--</option>
                @foreach($allAddress as $item)
                    <option value="{{$item->address_id}}">{{$item->address_recipient_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0 float-end">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Add Item 
            </button>
        </div>
        <table class="table table-striped" id="invoice-item-table">
          <thead>
            <tr>
              <th scope="col" style="width:15%">Item Type</th>
              <th scope="col" style="width:45%">Description</th>
              <th scope="col" style="width:10%" class="text-end">Quantity</th>
              <th scope="col" style="width:15%" class="text-end">Unit Price</th>
              <th scope="col" style="width:15%" class="text-end">Amount</th>
            </tr>
          </thead>
          <tbody>           
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4" class="text-end">Subtotal</td>
              <td class="text-end" id="subtotal">0</td>
            </tr>
            <tr>
              <td colspan="4" class="text-end">Tax (10%)</td>
              <td class="text-end" id="tax" >0</td>
            </tr>
            <tr>
              <td colspan="4" class="text-end">Payments</td>
              <td class="text-end" id="payment">0</td>
            </tr>
            <tr>
              <td colspan="4" class="text-end">Amount Due</td>
              <td class="text-end">0</td>
            </tr>
          </tfoot>
        </table>
        </form>
      </div>

    </main>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Item</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Service</label>
            <select class="form-select" id="select-service" aria-label="Default select example">
                <option value="0">--Select Recipient--</option>
                @foreach($allService as $item)
                    <option value="{{$item->service_id}};{{$item->service_price}};{{$item->service_name}};{{$item->service_type}}">{{$item->service_name}}</option>
                @endforeach
            </select>
            <label for="exampleInputPassword1" class="form-label">Qty</label>
            <input type="number" class="form-control" id="service-qty" aria-describedby="emailHelp">
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="add-service">Add</button>
        </div>
        </div>
    </div>
    </div>
  </div>
</div>


    <script src="/template/bootstrap.bundle.min.js.download" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      <script src="/template/feather.min.js.download" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#add-service').on('click',function(){
                if(!$('#select-service').find(':selected').val() == '0' && ($('#service-qty').val() == '0' || $('#service-qty').val() == '')) {
                    return false
                } else {
                    var service = $('#select-service').find(':selected').val().split(';');
                    var serviceQty = $('#service-qty').val();
                    var price = Math.round((parseInt(serviceQty) / 100) * parseInt(service[1]))
                    var subtotal = $('#subtotal').text()
                    var newSubtotal = parseInt(subtotal) + price
                    $('#subtotal').text(newSubtotal)
                    var tax = (10 / 100) * newSubtotal
                    $('#tax').text(tax);
                    $('#payment').text(newSubtotal + tax)
                    var type = service[3] == '1' ? 'Services' : 'Goods';
                    var string = `<tr>
                                <td>`+type+`</td>
                                <td>`+service[2]+`</td>
                                <td class="text-end">`+serviceQty+`</td>
                                <td class="text-end">`+service[1]+`</td>
                                <td class="text-end">`+price+`</td>
                            </tr>
                            <input type="hidden" name="item[]" value="`+service[0]+`;`+serviceQty+`;`+price+`">`;
                    $('#invoice-item-table').find('tbody').append(string);
                    console.log(service)
                    $('#select-service').val(0)
                    $('#service-qty').val(0)
                    $('#staticBackdrop').modal('hide');
                }
            })
        });

        function submitForm() {
            $('#form-invoice').submit();
        }
    </script>

</body></html>