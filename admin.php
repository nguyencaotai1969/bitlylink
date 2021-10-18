<?php 

include 'api_admin.php';
$objApi = new Admin();
$objApi->index();
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">     
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      <link rel="stylesheet" type="text/css" href="style-admin.css">
      <script src="public/vue.js"></script>
   </head>
   <body class="fixed-nav sticky-footer bg-dark" id="page-top">
      <div id="app">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"  id="mainNav">
               <a class="navbar-brand" href="index.html">Admin</a>
               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                  	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <router-link class="nav-link" to="/"><i class="fa fa-fw fa-dashboard"></i>Tổng quan</router-link>
                     </li>
                     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                        <router-link class="nav-link" to="/data">
                           <i class="fa fa-fw fa-table"></i>
                           Báo cáo link
                        </router-link>
                     </li>
                  </ul>
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-envelope"></i>
                        <span class="d-lg-none">Messages
                        <span class="badge badge-pill badge-primary">12 New</span>
                           </span>
                           <span class="indicator text-primary d-none d-lg-block">
                           <i class="fa fa-fw fa-circle"></i>
                           </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                           <h6 class="dropdown-header">New Messages:</h6>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">
                              <strong>David Miller</strong>
                              <span class="small float-right text-muted">11:21 AM</span>
                              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">
                              <strong>Jane Smith</strong>
                              <span class="small float-right text-muted">11:21 AM</span>
                              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">
                              <strong>John Doe</strong>
                              <span class="small float-right text-muted">11:21 AM</span>
                              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item small" href="#">View all messages</a>
                        </div>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="d-lg-none">Alerts
                        <span class="badge badge-pill badge-warning">6 New</span>
                        </span>
                        <span class="indicator text-warning d-none d-lg-block">
                        <i class="fa fa-fw fa-circle"></i>
                        </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                           <h6 class="dropdown-header">New Alerts:</h6>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">
                              <span class="text-success">
                              <strong>
                              <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                              </span>
                              <span class="small float-right text-muted">11:21 AM</span>
                              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">
                              <span class="text-danger">
                              <strong>
                              <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                              </span>
                              <span class="small float-right text-muted">11:21 AM</span>
                              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">
                              <span class="text-success">
                              <strong>
                              <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                              </span>
                              <span class="small float-right text-muted">11:21 AM</span>
                              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item small" href="#">View all alerts</a>
                        </div>
                     </li>
                     <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                           <div class="input-group">
                              <input class="form-control" type="text" placeholder="Search for...">
                              <span class="input-group-append">
                              <button class="btn btn-primary" type="button">
                              <i class="fa fa-search"></i>
                              </button>
                              </span>
                           </div>
                        </form>
                     </li>
                     <li class="nav-item">
                        <a href="/api_admin.php?logout" class="nav-link">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                     </li>
                  </ul>
               </div>
            </nav>
            
         <template>
            <div class="content-wrapper ">  

               <router-view class="container-fluid"></router-view>
               <footer class="sticky-footer">
                  <div class="container">
                     <div class="text-center">
                        <small>Copyright © Your Website 2021</small>
                     </div>
                  </div>
               </footer>
            </div>
         </template>
      </div>
   </body>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
   <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.js"></script>
   <script type="text/javascript" src="public/axios.min.js"></script>
   <script src="public/vue-router.js"></script>
   <script type="text/javascript" src="public/admin.js">
   </script>
   <script  defer type="text/javascript">
      //routing
      const DataUrl = { 
         name:"DataUrl",
         template: `<div class="card mb-3">
            <div class="card-header">
               <i class="fa fa-table"></i> Data Table Example
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table id="dataTable"class="table table-bordered"  width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>Shorten</th>
                           <th>Full url</th>
                           <th>Clicks</th>
                           <th>status</th>
                           <th>Domain</th>
                           <th>Setting</th>
                        </tr>
                     </thead>
                     <tbody id='renderdata'>
                   
                     </tbody>
                     <tfoot>
                        <tr>
                           <th>Shorten</th>
                           <th>Full url</th>
                           <th>Clicks</th>
                           <th>status</th>
                           <th>Domain</th>
                           <th>Setting</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
            <div class="card-footer small text-muted">Updated: {{ update_at }}</div>
            <div id="Modal" class="modal fade seminor-login-modal" data-backdrop="static">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Cảnh bảo bạn đang xóa !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa không ?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <span v-on:click="getUrl"><button type="button" class="btn btn-primary ok-delete" data-delete-id="" v-on:click="btn_delete">Xóa</button></span>
                  </div>
                </div>
              </div>
            </div>
            <div id="Modaledit" class="modal fade seminor-login-modal" data-backdrop="static">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"Sửa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Fullurl:</label>
                     <input type="text" class="form-control editFullurl">
                  </div>
                  <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Clicks:</label>
                     <input type="number" class="form-control editClicks">
                  </div>
                  <div class="form-group">
                     <label for="recipient-name" class="col-form-label">Status:</label>
                     <select class="form-control editStatus">
                        <option value='1'>Mở</option>
                        <option value='2'>Đóng</option>
                     </select>
                     
                        <span id='error'>
                        </span> 
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ok-edit" data-edit-id="" v-on:click="btn_edit">Sửa</button>
                  </div>
                </div>
              </div>
            </div>
         </div>`,
         data :function(){
               return{
                     update_at: new Date().toLocaleString(),
                     listUrls:[],
                     thisname:this,
               }                     
         },
         methods:{
               getUrl(){
                  let str = '';
                  axios.get('api_admin.php?listUrl')
                        .then(response =>{
                           if(response.data.success){
                              this.listUrls = response.data.success;
                                 response.data.success.forEach((listUrl)=>{
                                   str += `<tr>
                                       <td>${ listUrl.shorten_url }</td>
                                       <td  class='show-dots'>
                                          <a target="_blank" class="btn btn-warning" href="${ listUrl.full_url }">
                                                ${ listUrl.full_url }
                                          </a>
                                       </td>
                                       <td>${ listUrl.clicks }</td>
                                       <td >${ listUrl.status }</td>
                                       <td >${ listUrl.domain }</td>
                                    <td>
   <button data-id-editFullurl="${listUrl.full_url}" data-id-editStatus='${listUrl.status}' data-id-editClick='${listUrl.clicks}' data-id-editId='${listUrl.id}' class="btn-edit btn btn-outline-success" type="button">
                                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                       </button>
                                       <button data-id-row="${listUrl.id}" class="btn-delete btn btn-outline-warning" type="button">
                                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                                       </button>
                                    </td>
                                 </tr>`;  
                              });
                              $("#renderdata").empty().append(str);
                              $('#dataTable').DataTable();

                           }
                        }).catch(function (error) {
                           console.log(error);
                        });
               },
             
               btn_delete(){
                  const id_delete = $(".ok-delete").attr('data-delete-id');
                  if(id_delete != ""){
                     axios.post('api_admin.php?deleteUrl', {
                             id: id_delete,
                         }).then(function (response) {
                           if(response.data.successfully){
                              $("#Modal").modal('hide');
                              $('#dataTable').DataTable();
                           }
                         }).catch(function(errors){
                           console.log(errors);
                     });   
                  }
               },
               btn_edit(){
                  const id_delete = $(".ok-edit").attr('data-edit-id');
                  const status = $("#Modaledit").find(".editStatus").val();
                  const click = $("#Modaledit").find(".editClicks").val();
                  const fullurl =$("#Modaledit").find(".editFullurl").val();
                  if(status != "" || id_delete != "" || click != "" || fullurl != ""){
                        axios.post('api_admin.php?editUrl', {
                                id: id_delete,
                                status:status,
                                click:click,
                                fullurl:fullurl
                            }).then(function (response) {
                              if(response.data.error){
                                 $("#error").html(`<div class="alert in alert-dismissible alert-danger">
                                    <strong>Error!</strong> ${response.data.error}
                                       </div`);
                                 return;
                              }
                              if(response.data.successfully){
                                 location.reload();
                              }
                            }).catch(function(errors){
                              console.log(errors);
                        });   
                     }
               },
         },
         created(){
            $('body').on('click','.btn-delete',function(){
               const data = $(this).attr('data-id-row');
               $(".ok-delete").attr('data-delete-id', data);
               $("#Modal").modal('show');
            });

            $('body').on('click','.btn-edit',function(){
               let inforId = $(this).attr('data-id-editId');
               let inforFullurl = $(this).attr('data-id-editFullurl');
               let inforStatus = $(this).attr('data-id-editStatus');
               let inforClicks = $(this).attr('data-id-editClick');
               $("#Modaledit").find(".editStatus").find(`option[value=`+inforStatus+`]`).prop('selected', true);
               $("#Modaledit").find(".editClicks").val(inforClicks);
               $("#Modaledit").find(".editFullurl").val(inforFullurl);

               
               $(".ok-edit").attr('data-edit-id', inforId);
               $("#Modaledit").modal('show');
            });
         },
         mounted(){
               this.getUrl();
            } 
         }
      const Home = { 
         name:'Home',
         props:{
            tools:[]
         },
         template: `<div>
                  <div class="row">
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fa fa-fw fa-comments"></i>
                              </div>
                              <div class="mr-5">{{ counter_online }} Online</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left">View Details</span>
                           <span class="float-right">
                           <i class="fa fa-angle-right"></i>
                           </span>
                           </a>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fa fa-fw fa-list"></i>
                              </div>
                              <div class="mr-5">{{ counter_day }} Day</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left">View Details</span>
                           <span class="float-right">
                           <i class="fa fa-angle-right"></i>
                           </span>
                           </a>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fa fa-fw fa-shopping-cart"></i>
                              </div>
                              <div class="mr-5">{{ counter_week }} Week</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left">View Details</span>
                           <span class="float-right">
                           <i class="fa fa-angle-right"></i>
                           </span>
                           </a>
                        </div>
                     </div>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fa fa-fw fa-support"></i>
                              </div>
                              <div class="mr-5">{{ counter_all }} All</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left">View Details</span>
                           <span class="float-right">
                           <i class="fa fa-angle-right"></i>
                           </span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-8">
                        <!-- Example Bar Chart Card-->
                        <div class="card mb-3">
                           <div class="card-header">
                              <i class="fa fa-bar-chart"></i> {{ chart_names.Bar_chart }}
                           </div>
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-8 my-auto">
                                    <canvas id="myBarChart" width="100" height="50"></canvas>
                                 </div>
                                 <div class="col-sm-4 text-center my-auto">
                                    <div class="h4 mb-0 text-primary">7 day: {{ counter_7_day }}</div>
                                    <div class="small text-muted">YTD Revenue</div>
                                    <hr>
                                    <div class="h4 mb-0 text-warning">Week: {{ counter_week }}</div>
                                    <div class="small text-muted">YTD Expenses</div>
                                    <hr>
                                    <div class="h4 mb-0 text-success">Year: {{ counter_year }}</div>
                                    <div class="small text-muted">YTD Margin</div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-footer small text-muted">Updated at: {{ update_at }}</div>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <!-- Example Pie Chart Card-->
                        <div class="card mb-3">
                           <div class="card-header">
                              <i class="fa fa-area-chart"></i>  {{ chart_names.Area_chart }}
                           </div>
                           <div class="card-body">
                              <canvas id="myAreaChart" width="100%" height="100"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>
                  </div>`,
                  data: function(){
                  	return {
                        update_at: new Date().toLocaleString(),
                  		chart_names:{
                           Bar_chart:'7 ngày gần nhất',
                           Area_chart:'6 tháng gần nhất',
                        },
                        counter_all:Number,
                        counter_day:Number,
                        counter_month:Number,
                        counter_online:Number,
                        counter_week:Number,
                        counter_year:Number,
                        counter_yesterday:Number,
                        counter_7_day:Number,
                  	}
                  },
                  methods:{
			    	      getData:  function(){
                        axios
                        .get('api_admin.php?counter')
                        .then( response =>{
                           if(response.data){

                              this.counter_all = response.data.counter_all; 
                              this.counter_day = response.data.counter_day; 
                              this.counter_month = response.data.counter_month; 
                              this.counter_online = response.data.counter_online; 
                              this.counter_week = response.data.counter_week; 
                              this.counter_year = response.data.counter_year; 
                              this.counter_yesterday = response.data.counter_yesterday; 
                              this.counter_7_day = response.data.counter_7_day;
                              localStorage.setItem('counter_before_day_1',response.data.counter_before_week.counter_yesterday_1);
                              localStorage.setItem('counter_before_day_2',response.data.counter_before_week.counter_yesterday_2);
                              localStorage.setItem('counter_before_day_3',response.data.counter_before_week.counter_yesterday_3);
                              localStorage.setItem('counter_before_day_4',response.data.counter_before_week.counter_yesterday_4);
                              localStorage.setItem('counter_before_day_5',response.data.counter_before_week.counter_yesterday_5);
                              localStorage.setItem('counter_before_day_6',response.data.counter_before_week.counter_yesterday_6);
                              localStorage.setItem('counter_before_day_7',response.data.counter_before_week.counter_yesterday_7);
                              localStorage.setItem('counter_before_month',response.data.counter_month.counter_month);
                              localStorage.setItem('counter_before_month_1',response.data.counter_month.counter_month1);
                              localStorage.setItem('counter_before_month_2',response.data.counter_month.counter_month2);
                              localStorage.setItem('counter_before_month_3',response.data.counter_month.counter_month3);
                              localStorage.setItem('counter_before_month_4',response.data.counter_month.counter_month4);
                              localStorage.setItem('counter_before_month_5',response.data.counter_month.counter_month5);
                           }
                        }).catch(function (error) {
                           console.log(error);
                        });
                       }
			    	     },
                   created(){
                   },
                   mounted(){
                     this.getData();
                     var myLineChartele = document.getElementById("myBarChart");
                     var myLineChart = new Chart(myLineChartele, {
                       type: 'bar',
                       data: {
                         labels: ["1", "2", "3", "4", "5", "6","7"],
                         datasets: [{
                           label: "Revenue",
                           backgroundColor: "rgba(2,117,216,1)",
                           borderColor: "rgba(2,117,216,1)",
                           data: [ localStorage.getItem("counter_before_day_1"),
                                    localStorage.getItem("counter_before_day_2"),
                                    localStorage.getItem("counter_before_day_3"),
                                    localStorage.getItem("counter_before_day_4"),
                                    localStorage.getItem("counter_before_day_5"),
                                    localStorage.getItem("counter_before_day_6"),
                                    localStorage.getItem("counter_before_day_7"), 
                           ],
                         }],
                       },
                       options: {
                         scales: {
                           xAxes: [{
                             time: {
                               unit: 'month'
                             },
                             gridLines: {
                               display: false
                             },
                             ticks: {
                               maxTicksLimit: 6
                             }
                           }],
                           yAxes: [{
                             ticks: {
                               min: 0,
                               max: 20000,
                               maxTicksLimit: 5
                             },
                             gridLines: {
                               display: true
                             }
                           }],
                         },
                         legend: {
                           display: false
                         }
                       }
                     }); 
                     var myLineChartele = document.getElementById("myAreaChart");
                     var myLineChart = new Chart(myLineChartele, {
                       type: 'line',
                       data: {
                         labels: ["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6"],
                         datasets: [{
                           label: "Sessions",
                           lineTension: 0.3,
                           backgroundColor: "rgba(2,117,216,0.2)",
                           borderColor: "rgba(2,117,216,1)",
                           pointRadius: 5,
                           pointBackgroundColor: "rgba(2,117,216,1)",
                           pointBorderColor: "rgba(255,255,255,0.8)",
                           pointHoverRadius: 5,
                           pointHoverBackgroundColor: "rgba(2,117,216,1)",
                           pointHitRadius: 20,
                           pointBorderWidth: 2,
                           data: [
                           localStorage.getItem('counter_before_month'),
                           localStorage.getItem('counter_before_month1'),
                           localStorage.getItem('counter_before_month2'),
                           localStorage.getItem('counter_before_month3'),
                           localStorage.getItem('counter_before_month4'),
                           localStorage.getItem('counter_before_month5'),],
                         }],
                       },
                       options: {
                         scales: {
                           xAxes: [{
                             time: {
                               unit: 'date'
                             },
                             gridLines: {
                               display: false
                             },
                             ticks: {
                               maxTicksLimit: 7
                             }
                           }],
                           yAxes: [{
                             ticks: {
                               min: 0,
                               max: 20000,
                               maxTicksLimit: 5
                             },
                             gridLines: {
                               color: "rgba(0, 0, 0, .125)",
                             }
                           }],
                         },
                         legend: {
                           display: false
                         }
                       }
                     });   

                   },
                    

             }
      const routes = [
       { path: '/', component: Home },
       { path: '/data', component: DataUrl },
      ];
      const router = new VueRouter({
      	 routes // short for `routes: routes`
      })
      const app = new Vue({
      	el: '#app',
      	router,
      }).$mount('#app');
   </script>
</html>