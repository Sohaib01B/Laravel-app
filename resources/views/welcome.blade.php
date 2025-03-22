<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/uppy.min.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="vertical  light  ">
<div class="wrapper">
@include('layouts.navbar')
</div>

<div>
  @include('layouts.sidebare') 
</div>
     
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Welcome to Your E-commerce Dashboard!</h2>
                    </div>
                </div>

                <!-- E-commerce Dashboard Cards -->
                <div class="mb-2 align-items-center">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row mt-1 align-items-center">
                                <!-- New Product Suggestions -->
                                <div class="col-12 col-lg-4 text-left pl-4">
                                    <p class="mb-1 small text-muted">New Product Suggestions</p>
                                    <span class="h3">Top Picks</span>
                                    <p class="text-muted mt-2">Explore our best-selling items.</p>
                                </div>
                                <!-- Sales Overview -->
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Today's Sales</p>
                                    <span class="h3">$2,500</span><br />
                                    <p class="text-muted">Sales made today</p>
                                </div>
                                <!-- Customer Reviews -->
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Customer Ratings</p>
                                    <span class="h3">4.5/5</span><br />
                                    <p class="text-muted">Average product rating</p>
                                </div>
                                <!-- Orders Completed -->
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Orders Completed</p>
                                    <span class="h3">150</span><br />
                                    <p class="text-muted">Completed orders today</p>
                                </div>
                                <!-- Discounts and Promotions -->
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">Current Discounts</p>
                                    <span class="h3">10%</span><br />
                                    <p class="text-muted">Discount on selected products</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Financial Summary and Graph -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <!-- Revenue Overview -->
                            <div class="col-lg-4 text-left pl-4">
                                <p class="small text-muted">Total Revenue</p>
                                <span class="h3">$12,600</span>
                                <span class="small text-muted">+20%</span>
                                <span class="fe fe-arrow-up text-success fe-12"></span>
                                <p class="text-muted mt-2">This month’s total revenue so far</p>
                            </div>
                            <!-- Sales Stats -->
                            <div class="col-lg-8 d-flex justify-content-around">
                                <div class="text-center">
                                    <p class="small text-muted">Today</p>
                                    <span class="h3">$1,200</span><br />
                                    <span class="small text-muted">+20%</span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                                <div class="text-center">
                                    <p class="small text-muted">Goal</p>
                                    <span class="h3">$3,000</span><br />
                                    <span class="small text-muted">+6%</span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                                <div class="text-center">
                                    <p class="small text-muted">Orders</p>
                                    <span class="h3">150</span><br />
                                    <span class="small text-muted">+20%</span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                            </div>
                        </div>
                        <!-- Graph -->
                        <div class="chartbox mr-4">
                            <div id="areaChart"></div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders and Products Section -->
                <div class="row">
                    <div class="col-md-12 col-lg-4 mb-4">
                        <div class="card timeline shadow">
                            <div class="card-header">
                                <strong class="card-title">Recent Orders</strong>
                                <a class="float-right small text-muted" href="#!">View all</a>
                            </div>
                            <div class="card-body" style="height:355px; overflow-y: auto; overflow-x: hidden;">
                                <h6 class="text-uppercase text-muted mb-4">Today</h6>
                                <p>Order #2001: 3 items</p>
                                <p>Order #2002: 2 items</p>
                                <p>Order #2003: 1 item</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-8">
                        <div class="card shadow">
                            <div class="card-header">
                                <strong class="card-title">Recently Viewed Products</strong>
                                <a class="float-right small text-muted" href="#!">View all</a>
                            </div>
                            <div class="card-body my-n2">
                                <table class="table table-striped table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1001</td>
                                            <th>Leather Jacket</th>
                                            <td>Apparel</td>
                                            <td>$150</td>
                                            <td><a class="btn btn-sm" href="#">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>1002</td>
                                            <th>Wireless Headphones</th>
                                            <td>Electronics</td>
                                            <td>$200</td>
                                            <td><a class="btn btn-sm" href="#">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>1003</td>
                                            <th>Smart Watch</th>
                                            <td>Accessories</td>
                                            <td>$120</td>
                                            <td><a class="btn btn-sm" href="#">View</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shortcut Modal for Quick Actions -->
                <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body px-5">
                                <div class="row align-items-center">
                                    <div class="col-6 text-center">
                                        <div class="squircle bg-success">
                                            <i class="fe fe-shopping-cart fe-32 text-white"></i>
                                        </div>
                                        <p>View Cart</p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="squircle bg-primary">
                                            <i class="fe fe-gift fe-32 text-white"></i>
                                        </div>
                                        <p>Discounts</p>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-6 text-center">
                                        <div class="squircle bg-primary">
                                            <i class="fe fe-truck fe-32 text-white"></i>
                                        </div>
                                        <p>Order Status</p>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div class="squircle bg-primary">
                                            <i class="fe fe-box fe-32 text-white"></i>
                                        </div>
                                        <p>Track Product</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</main>

 main 
    </div> <!-- .wrapper -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/d3.min.js"></script>
    <script src="js/topojson.min.js"></script>
    <script src="js/datamaps.all.min.js"></script>
    <script src="js/datamaps-zoomto.js"></script>
    <script src="js/datamaps.custom.js"></script>
    <script src="js/Chart.min.js"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="js/gauge.min.js"></script>
    <script src="js/jquery.sparkline.min.js"></script>
    <script src="js/apexcharts.min.js"></script>
    <script src="js/apexcharts.custom.js"></script>
    <script src='js/jquery.mask.min.js'></script>
    <script src='js/select2.min.js'></script>
    <script src='js/jquery.steps.min.js'></script>
    <script src='js/jquery.validate.min.js'></script>
    <script src='js/jquery.timepicker.js'></script>
    <script src='js/dropzone.min.js'></script>
    <script src='js/uppy.min.js'></script>
    <script src='js/quill.min.js'></script>
    <script>
      $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
      $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
      $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
      /** date range picker */
      if ($('.datetimes').length)
      {
        $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
      }
      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end)
      {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
      $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
      cb(start, end);
      $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
      $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
      $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
      $('.input-phoneus').mask('(000) 000-0000');
      $('.input-mixed').mask('AAA 000-S0S');
      $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function()
      {
        'use strict';
        window.addEventListener('load', function()
        {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form)
          {
            form.addEventListener('submit', function(event)
            {
              if (form.checkValidity() === false)
              {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script>
      var uptarg = document.getElementById('drag-drop-area');
      if (uptarg)
      {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
        {
          endpoint: 'https://master.tus.io/files/'
        });
        uppy.on('complete', (result) =>
        {
          console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
      }
    </script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>