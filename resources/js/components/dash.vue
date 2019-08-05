<template>
<div>
  <div class="container-fluid">
          <div class="row">
            <div class="page-header">
              <div class="d-flex align-items-center">
                  <h2 class="page-header-title">Inicio</h2>
                  <div>
                  <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="dashboard.html"><i class="ti ti-home"></i></a></li>
                      <li class="breadcrumb-item active">Inicio</li>
                  </ul>
                  </div>
              </div>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <div class="col-xl-3 col-md-6 col-sm-6">
                <!-- Begin Widget 01 -->
                <div class="widget widget-01 has-shadow">
                    <div class="widget-body no-padding">
                        <h3>Happy Customers <span class="text-green">+24%</span></h3>
                        <div class="circle">
                            <div class="percent"></div>
                        </div>
                        <!-- Begin Other Stats -->
                        <div class="other-stats">
                            <!-- Begin Row -->
                            <div class="row no-margin justify-content-center">
                                <div class="col-12 col-xl-10 col-md-10 col-sm-10">
                                    <div class="today-sales">
                                        <div class="graph">
                                            <div class="chart">
                                                <canvas id="today-chart"></canvas>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <div class="heading">Today Sales</div>
                                            <div class="number">489</div>
                                            <div class="value text-blue">+30%</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Today Sales -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Other Stats -->
                    </div>
                </div>
                <!-- End Widget 01 -->
            </div>
            <div class="col-xl-5 col-md-6 col-sm-6">
                <!-- Begin Widget 02 -->
                <div class="widget widget-02 has-shadow">
                    <!-- Begin Widget Header -->
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Activity Graph</h2>
                        <div class="widget-options">
                            <div class="dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                    <i class="la la-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-history"></i>History
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-bell-slash"></i>Disable Alerts
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-edit"></i>Edit Widget
                                    </a>
                                    <a href="#" class="dropdown-item faq">
                                        <i class="la la-question-circle"></i>FAQ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Header -->
                    <!-- Begin Widget Body -->
                    <div class="widget-body no-padding">
                        <!-- Begin Item -->
                        <div class="text-center">
                            <div class="more-charts">
                               <a class="btn btn-shadow" href="components-charts.html">More Charts</a>
                            </div>
                        </div>
                        <!-- End Item -->
                    </div>
                    <!-- End Widget Body -->
                    <div class="chart">
                        <canvas id="sale-chart"></canvas>
                    </div>
                </div>
                <!-- End Widget 02 -->
            </div>
            <div class="col-xl-4 col-md-12">
                <!-- Begin Widget 03 -->
                <div class="widget-image widget-03 has-shadow blog-image position-relative">
                    <div class="blog-overlay"></div>
                    <div class="blog-content">
                        <span class="author">By Saerox</span>
                        <h3 class="blog-title"><a href="#">Be<br>Elisyam</a></h3>
                        <ul class="meta">
                            <li><i class="la la-comments"></i><span class="numb">85</span></li>
                            <li><i class="la la-heart"></i><span class="numb">254</span></li>
                        </ul>
                        <div class="blog-category">
                            <a href="#0">Webdesign</a>
                        </div>
                    </div>
                </div>
                <!-- End Widget 03 -->
            </div>
        </div>
        <!-- End Row -->
        <!-- Begin Row/Widget 12 -->
        <div class="row flex-row">
            <!-- Begin Facebook -->
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ion-social-facebook text-facebook"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title">David Green</div>
                                <div class="number">10,865 Likes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Facebook -->
            <!-- Begin Twitter -->
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ion-social-twitter text-twitter"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title">@David_Green</div>
                                <div class="number">8,986 Followers</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Twitter -->
            <!-- Begin Linkedin -->
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ion-social-linkedin-outline text-linkedin"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title">@David_Green</div>
                                <div class="number">3,654 Followers</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Linkedin -->
            <!-- Begin Youtube -->
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="ion-social-youtube-outline text-youtube"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title">/beElisyam</div>
                                <div class="number">12,357 Views</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Youtube -->
        </div>
        <!-- End Row/Widget 12 -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <!-- Begin Widget 13 -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-13 has-shadow">
                    <div class="widget-body p-0">
                        <div class="author-avatar">
                            <img src="assets/img/avatar/avatar-04.jpg" alt="..." class="img-fluid rounded-circle">
                        </div>
                        <div class="author-name">
                            Nathan Hunter
                            <span>Mobile Designer</span>
                        </div>
                        <div class="follow-btn text-center mt-4">
                            <a class="btn btn-shadow" href="#">Follow</a>
                        </div>
                        <div class="social-stats mt-5">
                            <div class="row d-flex justify-content-between">
                                <div class="col-4 text-center">
                                    <i class="la la-users followers"></i>
                                    <div class="counter">+124</div>
                                    <div class="heading">Followers</div>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="la la-dribbble dribbble"></i>
                                    <div class="counter">+357</div>
                                    <div class="heading">Likes</div>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="la la-behance behance"></i>
                                    <div class="counter">+98</div>
                                    <div class="heading">Followers</div>
                                </div>
                            </div>
                        </div>
                        <div class="shape-container">
                            <svg class="wavy" viewbox="00 0 85 25">
                                <path fill="#e4e8f0" d="M0 30 V15 Q30 3 60 15 V30z" />
                                <path fill="#5d5386" d="M0 30 V5 Q30 20 55 12 T100 11 V30z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 13 -->
            <!-- Begin Widget 14 -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-14 has-shadow">
                    <div class="widget-body">
                        <div class="section-title mb-5">
                            <h2>Calendar</h2>
                        </div>
                        <div class="widget14 owl-carousel">
                            <div class="item">
                                <div class="item-projects">
                                    <div class="month">April</div>
                                    <div class="year">2018</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-projects">
                                    <div class="month">May</div>
                                    <div class="year">2018</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-projects">
                                    <div class="month">June</div>
                                    <div class="year">2018</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-projects">
                                    <div class="month">July</div>
                                    <div class="year">2018</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-projects">
                                    <div class="month">August</div>
                                    <div class="year">2018</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-projects">
                                    <div class="month">September</div>
                                    <div class="year">2018</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-projects">
                                    <div class="month">October</div>
                                    <div class="year">2018</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-projects">
                                    <div class="month">November</div>
                                    <div class="year">2018</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-projects">
                                    <div class="month">December</div>
                                    <div class="year">2018</div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group w-100 mt-3">
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="event-date align-self-center mr-3">
                                        10
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="event-title text-secondary">Meeting with Team</div>
                                        <div class="event-desc mr-3">
                                            <i class="la la-calendar"></i>
                                            <span>09:30 AM</span>
                                        </div>
                                        <div class="event-desc">
                                            <i class="la la-user"></i>
                                            <span>4</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="event-date align-self-center mr-3">
                                        12
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="event-title text-info">Dentist</div>
                                        <div class="event-desc mr-3">
                                            <i class="la la-calendar"></i>
                                            <span>11:00 AM</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="event-date align-self-center mr-3">
                                        15
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="event-title text-dark">Brandon Birthday</div>
                                        <div class="event-desc mr-3">
                                            <i class="la la-calendar"></i>
                                            <span>07:00 PM</span>
                                        </div>
                                        <div class="event-desc">
                                            <i class="la la-user"></i>
                                            <span>2</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="event-date align-self-center mr-3">
                                        21
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="event-title text-primary">Flight Paris</div>
                                        <div class="event-desc mr-3">
                                            <i class="la la-calendar"></i>
                                            <span>10:00 PM</span>
                                        </div>
                                        <div class="event-desc">
                                            <i class="la la-user"></i>
                                            <span>30</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Widget 14 -->
            <!-- Begin Widget 15 -->
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                <div class="widget widget-15 has-shadow">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-center align-items-center">
                                <div class="weather-infos">
                                    <div class="temp">24°</div>
                                    <div class="city">Paris, FR</div>
                                    <div class="risk"><i class="la la-tint"></i>80%</div>
                                </div>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-center align-items-center">
                                <div class="weather-icon">
                                    <i class="meteocons-cloudy"></i>
                                </div>
                            </div>
                        </div>
                        <ul class="time-nav nav nav-tabs justify-content-center mt-5 mb-5" role="tablist" id="weather-tab">
                            <li><a class="active" data-toggle="tab" href="#weekly" role="tab" id="weekly-tab">Weekly</a></li>
                            <li><a data-toggle="tab" href="#hourly" role="tab" id="hourly-tab">Hourly</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- Begin Tab 1 -->
                            <div role="tabpanel" class="tab-pane show active" id="weekly" aria-labelledby="weekly-tab">
                                <div class="widget15-weekly owl-carousel">
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-sun"></i>
                                        </div>
                                        <div class="day">Monday</div>
                                        <div class="weather">2 Apr</div>
                                        <div class="weather-temp">12 / 30°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>10%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-lightning3"></i>
                                        </div>
                                        <div class="day">Tuesday</div>
                                        <div class="weather">3 Apr</div>
                                        <div class="weather-temp">8 / 21°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>95%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-rainy2"></i>
                                        </div>
                                        <div class="day">Wednesday</div>
                                        <div class="weather">4 Apr</div>
                                        <div class="weather-temp">8 / 19°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>82%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-cloudy"></i>
                                        </div>
                                        <div class="day">Thursday</div>
                                        <div class="weather">5 Apr</div>
                                        <div class="weather-temp">6 / 20°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>50%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-sun"></i>
                                        </div>
                                        <div class="day">Friday</div>
                                        <div class="weather">6 Apr</div>
                                        <div class="weather-temp">14 / 25°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>0%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab 1 -->
                            <!-- Begin Tab 2 -->
                            <div role="tabpanel" class="tab-pane" id="hourly" aria-labelledby="hourly-tab">
                                <div class="widget15-hourly owl-carousel">
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-sun"></i>
                                        </div>
                                        <div class="day">11:00 PM</div>
                                        <div class="weather-temp">24°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>10%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-sun"></i>
                                        </div>
                                        <div class="day">12:00 PM</div>
                                        <div class="weather-temp">25°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>0%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-sun"></i>
                                        </div>
                                        <div class="day">13:00 PM</div>
                                        <div class="weather-temp">25°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>10%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-cloudy"></i>
                                        </div>
                                        <div class="day">14:00 PM</div>
                                        <div class="weather-temp">20°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>30%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-sun"></i>
                                        </div>
                                        <div class="day">15:00 PM</div>
                                        <div class="weather-temp">30°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>0%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-sun"></i>
                                        </div>
                                        <div class="day">16:00 PM</div>
                                        <div class="weather-temp">30°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>0%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-sun"></i>
                                        </div>
                                        <div class="day">17:00 PM</div>
                                        <div class="weather-temp">28°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>5%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-sun"></i>
                                        </div>
                                        <div class="day">18:00 PM</div>
                                        <div class="weather-temp">28°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>5%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-cloud"></i>
                                        </div>
                                        <div class="day">19:00 PM</div>
                                        <div class="weather-temp">23°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>20%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-weather2"></i>
                                        </div>
                                        <div class="day">20:00 PM</div>
                                        <div class="weather-temp">22°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>0%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-weather2"></i>
                                        </div>
                                        <div class="day">22:00 PM</div>
                                        <div class="weather-temp">22°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>0%
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="weather-mini-icon mb-2">
                                            <i class="meteocons-weather2"></i>
                                        </div>
                                        <div class="day">23:00 PM</div>
                                        <div class="weather-temp">20°</div>
                                        <div class="rain">
                                            <i class="la la-tint"></i>50%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab 2 -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 15 -->
        </div>
        <!-- End Row -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <!-- Begin Widget 16 -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-16 has-shadow">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter">258,036</div>
                                <div class="total-views">Total Page Views</div>
                            </div>
                            <div class="col-xl-4 d-flex justify-content-center align-items-center">
                                <div class="pages-views">
                                    <div class="percent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 16 -->
            <!-- Begin Widget 17 -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-17 has-shadow">
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-xl-7 d-flex flex-column justify-content-center align-items-center">
                                <div class="counter">1,658</div>
                                <div class="total-visitors">Visitors Online</div>
                            </div>
                            <div class="col-xl-5 d-flex justify-content-center align-items-center">
                                <div class="visitors">
                                    <div class="percent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 17 -->
        </div>
        <!-- End Row -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <!-- Begin Widget 18 -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-18 has-shadow">
                    <!-- Begin Widget Header -->
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Messages Box</h2>
                        <div class="widget-options">
                            <div class="dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                    <i class="la la-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="app-chat.html" class="dropdown-item">
                                        <i class="la la-comments"></i>New Message
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-bell-slash"></i>Disable Alerts
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-edit"></i>Edit Widget
                                    </a>
                                    <a href="#" class="dropdown-item faq">
                                        <i class="la la-question-circle"></i>FAQ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Header -->
                    <div class="widget-body">
                        <div class="input-group">
                            <span class="input-group-addon pr-0 pl-0">
                                <a class="btn" href="#">
                                    <i class="la la-search la-2x"></i>
                                </a>
                            </span>
                            <input type="text" class="form-control no-ppading-right no-padding-left" placeholder="Search">
                        </div>
                        <div class="new-message">
                            <div class="media">
                                <div class="media-left align-self-center mr-3">
                                    <img src="assets/img/avatar/avatar-04.jpg" alt="..." class="img-fluid rounded-circle" style="width: 50px;">
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="new-message-sender">Nathan Hunter</div>
                                    <div class="new-message-time">New message about 2 minutes ago</div>
                                </div>
                                <div class="media-right align-self-center">
                                    <div class="actions">
                                        <a href="app-chat.html"><i class="la la-reply reply"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group w-100 mt-5">
                            <li class="list-group-item">
                                <div class="other-message">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-3">
                                            <img src="assets/img/avatar/avatar-02.jpg" alt="..." class="img-fluid rounded-circle" style="width: 50px;">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="other-message-sender">Brandon Smith</div>
                                            <div class="other-message-time">Are you serious? - 3 min ago</div>
                                        </div>
                                        <div class="media-right align-self-center">
                                            <div class="actions">
                                                <a href="app-chat.html"><i class="la la-reply reply"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="other-message">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-3">
                                            <img src="assets/img/avatar/avatar-03.jpg" alt="..." class="img-fluid rounded-circle" style="width: 50px;">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="other-message-sender">Louis Henry</div>
                                            <div class="other-message-time">Bonne idée, coucou à ... - 10 min ago</div>
                                        </div>
                                        <div class="media-right align-self-center">
                                            <div class="actions">
                                                <a href="app-chat.html"><i class="la la-reply reply"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="other-message">
                                    <div class="media">
                                        <div class="media-left align-self-center mr-3">
                                            <img src="assets/img/avatar/avatar-05.jpg" alt="..." class="img-fluid rounded-circle" style="width: 50px;">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="other-message-sender">Megan Duncan</div>
                                            <div class="other-message-time">See you later! - 20 min ago</div>
                                        </div>
                                        <div class="media-right align-self-center">
                                            <div class="actions">
                                                <a href="app-chat.html"><i class="la la-reply reply"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Widget 18 -->
            <!-- Begin Widget 19 -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-19 has-shadow">
                    <!-- Begin Widget Header -->
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>New Meeting</h2>
                        <div class="widget-options">
                            <div class="dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                    <i class="la la-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-bell-slash"></i>Disable Alerts
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-edit"></i>Edit Widget
                                    </a>
                                    <a href="#" class="dropdown-item faq">
                                        <i class="la la-question-circle"></i>FAQ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Header -->
                    <div class="widget-body p-0">
                        <div class="form-group row mt-3 mr-0 mb-3 ml-0">
                            <div class="col-xl-12">
                                <label class="form-control-label">Meeting Name</label>
                                <input type="text" value="My Meeting" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mr-0 mb-3 ml-0">
                            <div class="col-xl-8 mb-3">
                                <label class="form-control-label">Date</label>
                                <select name="meeting-date" class="custom-select form-control">
                                    <option value="">Select Date</option>
                                    <option value="01">Sun 1 April</option>
                                    <option value="02">Mon 2 April</option>
                                    <option value="03">Tue 3 April</option>
                                    <option value="04">Wed 4 April</option>
                                    <option value="05">Thu 5 April</option>
                                    <option value="07">Fri 6 April</option>
                                    <option value="08">Sat 7 April</option>
                                    <option value="09">Sun 8 April</option>
                                    <option value="10">Mon 9 April</option>
                                    <option value="11">Tue 10 April</option>
                                    <option value="12">Wed 11 April</option>
                                    <option value="05">Thu 12 April</option>
                                    <option value="07">Fri 13 April</option>
                                    <option value="08">Sat 14 April</option>
                                    <option value="09">Sun 15 April</option>
                                    <option value="10">Mon 16 April</option>
                                    <option value="11">Tue 17 April</option>
                                    <option value="12">Wed 18 April</option>
                                    <option value="05">Thu 19 April</option>
                                    <option value="07">Fri 20 April</option>
                                    <option value="08">Sat 21 April</option>
                                    <option value="09">Sun 22 April</option>
                                    <option value="10">Mon 23 April</option>
                                    <option value="11">Tue 24 April</option>
                                    <option value="04">Wed 25 April</option>
                                    <option value="05">Thu 26 April</option>
                                    <option value="07">Fri 27 April</option>
                                    <option value="08">Sat 28 April</option>
                                    <option value="09">Sun 29 April</option>
                                    <option value="10">Mon 30 April</option>
                                </select>
                            </div>
                            <div class="col-xl-4">
                                <label class="form-control-label">Hour</label>
                                <select name="meeting-hour" class="custom-select form-control">
                                    <option value="">Select Hour</option>
                                    <option value="01">07:00 am</option>
                                    <option value="02">08:00 am</option>
                                    <option value="03">09:00 am</option>
                                    <option value="04">10:00 am</option>
                                    <option value="05">11:00 am</option>
                                    <option value="07">12:00 am</option>
                                    <option value="08">01:00 pm</option>
                                    <option value="09">02:00 pm</option>
                                    <option value="10">03:00 pm</option>
                                    <option value="08">04:00 pm</option>
                                    <option value="09">05:00 pm</option>
                                    <option value="10">06:00 pm</option>
                                    <option value="08">07:00 pm</option>
                                    <option value="09">08:00 pm</option>
                                    <option value="10">09:00 pm</option>
                                    <option value="08">10:00 pm</option>
                                    <option value="09">11:00 pm</option>
                                    <option value="10">12:00 pm</option>
                                </select>
                            </div>
                        </div>
                        <ul class="list-group w-100 widget-scroll" style="max-height:250px;">
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left align-self-center mr-3">
                                        <img src="assets/img/avatar/avatar-02.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="people-name">Brandon Smith</div>
                                    </div>
                                    <div class="media-right align-self-center">
                                        <div class="checkbox check"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left align-self-center mr-3">
                                        <img src="assets/img/avatar/avatar-03.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="people-name">Louis Henry</div>
                                    </div>
                                    <div class="media-right align-self-center">
                                        <div class="checkbox check"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left align-self-center mr-3">
                                        <img src="assets/img/avatar/avatar-04.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="people-name">Nathan Hunter</div>
                                    </div>
                                    <div class="media-right align-self-center">
                                        <div class="checkbox check"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left align-self-center mr-3">
                                        <img src="assets/img/avatar/avatar-05.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="people-name">Megan Duncan</div>
                                    </div>
                                    <div class="media-right align-self-center">
                                        <div class="checkbox check"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left align-self-center mr-3">
                                        <img src="assets/img/avatar/avatar-06.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="people-name">Beverly Oliver</div>
                                    </div>
                                    <div class="media-right align-self-center">
                                        <div class="checkbox check"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left align-self-center mr-3">
                                        <img src="assets/img/avatar/avatar-07.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="people-name">Lisa Garett</div>
                                    </div>
                                    <div class="media-right align-self-center">
                                        <div class="checkbox check"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left align-self-center mr-3">
                                        <img src="assets/img/avatar/avatar-08.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="people-name">Peter Collins</div>
                                    </div>
                                    <div class="media-right align-self-center">
                                        <div class="checkbox check"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left align-self-center mr-3">
                                        <img src="assets/img/avatar/avatar-09.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="people-name">Michael Bradley</div>
                                    </div>
                                    <div class="media-right align-self-center">
                                        <div class="checkbox check"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center mt-4 mb-3">
                            <button type="button" class="btn btn-gradient-01" data-toggle="modal" data-target="#delay-modal">
                                Create Meeting
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 19 -->
            <!-- Begin Widget 20 -->
            <div class="col-xl-4">
                <div class="widget widget-20 has-shadow">
                    <!-- Begin Widget Header -->
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Files</h2>
                        <div class="widget-options">
                            <div class="dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                    <i class="la la-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-edit"></i>Manage Files
                                    </a>
                                    <a href="#" class="dropdown-item faq">
                                        <i class="la la-question-circle"></i>FAQ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Header -->
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="widget20 owl-carousel">
                                    <div class="item">
                                        <div class="card-image">
                                            <img src="assets/img/background/03.jpg" alt="...">
                                            <div class="card-overlay card-overlay-01">
                                                <div class="card-overlay-content">
                                                    <div class="category">
                                                        <a href="#">Category</a>
                                                    </div>
                                                    <a href="#0" class="card-title">Title Collection</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card-image">
                                            <img src="assets/img/background/04.jpg" alt="...">
                                            <div class="card-overlay card-overlay-02">
                                                <div class="card-overlay-content">
                                                    <div class="category">
                                                        <a href="#">Category</a>
                                                    </div>
                                                    <a href="#0" class="card-title">Title Collection</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card-image">
                                            <img src="assets/img/background/05.jpg" alt="...">
                                            <div class="card-overlay card-overlay-01">
                                                <div class="card-overlay-content">
                                                    <div class="category">
                                                        <a href="#">Category</a>
                                                    </div>
                                                    <a href="#0" class="card-title">Title Collection</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="card-image">
                                            <img src="assets/img/background/02.jpg" alt="...">
                                            <div class="card-overlay card-overlay-02">
                                                <div class="card-overlay-content">
                                                    <div class="category">
                                                        <a href="#">Category</a>
                                                    </div>
                                                    <a href="#0" class="card-title">Title Collection</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 mr-0 ml-0">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center mb-4">
                                <div class="media w-100">
                                    <div class="align-self-center mr-2">
                                        <i class="la la-file-video-o"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="files-title"><a href="#">My Video</a></div>
                                        <div class="files-number">84 Files</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center mb-4">
                                <div class="media w-100">
                                    <div class="align-self-center mr-2">
                                        <i class="la la-file-audio-o"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="files-title"><a href="#">My Songs</a></div>
                                        <div class="files-number">786 Files</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center mb-4">
                                <div class="media w-100">
                                    <div class="align-self-center mr-2">
                                        <i class="la la-file-picture-o"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="files-title"><a href="#">Photos</a></div>
                                        <div class="files-number">189 Files</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center mb-4">
                                <div class="media w-100">
                                    <div class="align-self-center mr-2">
                                        <i class="la la-file-zip-o"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="files-title"><a href="#">Template</a></div>
                                        <div class="files-number">36 Files</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center mb-4">
                                <div class="media w-100">
                                    <div class="align-self-center mr-2">
                                        <i class="la la-file-pdf-o"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="files-title"><a href="#">Pdf</a></div>
                                        <div class="files-number">19 Files</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center mb-4">
                                <div class="media w-100">
                                    <div class="align-self-center mr-2">
                                        <i class="la la-file-powerpoint-o"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="files-title"><a href="#">Presentation</a></div>
                                        <div class="files-number">263 Files</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 20 -->
        </div>
        <!-- End Row -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <!-- Begin Widget 21 -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-21 has-shadow">
                    <div class="widget-body">
                        <div class="section-title">
                            <h3>Hit Rate</h3>
                        </div>
                        <div class="hit-rate">
                            <div class="percent"></div>
                        </div>
                        <div class="value-progress text-green">
                            + 34%
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 21 -->
            <!-- Begin Widget 22 -->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="widget widget-22 has-shadow">
                    <div class="widget-body bg-gradient-03">
                        <div class="section-title">
                            <h3>Happy Customers</h3>
                        </div>
                        <div class="happy-customers">
                            <div class="percent"></div>
                        </div>
                        <div class="value-progress">
                            + 54 Today
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 22 -->
            <!-- Begin Widget 23 -->
            <div class="col-xl-4">
                <div class="widget widget-23 bg-gradient-02 d-flex justify-content-center align-items-center">
                    <div class="widget-body text-center">
                        <i class="ti ti-zip"></i>
                        <div class="title">Archive Title</div>
                        <div class="number">Download Archive</div>
                        <div class="text-center mt-3 mb-3">
                            <button type="button" class="btn btn-outline-light">
                                Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Widget 23 -->
        </div>
        <!-- End Row -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <div class="col-xl-4 col-md-12">
                <!-- Begin Widget 24 -->
                <div class="widget-24 widget-image has-shadow bg-image">
                    <div class="overlay"></div>
                    <div class="content">
                        <div class="weather-icon text-center">
                            <i class="meteocons-cloudy"></i>
                        </div>
                        <div class="weather-infos text-center">
                            <div class="temp">24°</div>
                        </div>
                        <div class="city">Paris, FR</div>
                        <div class="week-prev">
                            <div class="row">
                                <div class="col-xl-2 text-center">
                                    <div class="day">MON</div>
                                    <div class="weather-mini-icon">
                                        <i class="meteocons-sun"></i>
                                    </div>
                                    <div class="weather-temp">26°</div>
                                </div>
                                <div class="col-xl-2 text-center">
                                    <div class="day">TUE</div>
                                    <div class="weather-mini-icon">
                                        <i class="meteocons-cloudy"></i>
                                    </div>
                                    <div class="weather-temp">30°</div>
                                </div>
                                <div class="col-xl-2 text-center">
                                    <div class="day">WED</div>
                                    <div class="weather-mini-icon">
                                        <i class="meteocons-sun"></i>
                                    </div>
                                    <div class="weather-temp">32°</div>
                                </div>
                                <div class="col-xl-2 text-center">
                                    <div class="day">THU</div>
                                    <div class="weather-mini-icon">
                                        <i class="meteocons-sun"></i>
                                    </div>
                                    <div class="weather-temp">27°</div>
                                </div>
                                <div class="col-xl-2 text-center">
                                    <div class="day">FRI</div>
                                    <div class="weather-mini-icon">
                                        <i class="meteocons-cloudy2"></i>
                                    </div>
                                    <div class="weather-temp">25°</div>
                                </div>
                                <div class="col-xl-2 text-center">
                                    <div class="day">SAT</div>
                                    <div class="weather-mini-icon">
                                        <i class="meteocons-windy2"></i>
                                    </div>
                                    <div class="weather-temp">31°</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Widget 24 -->
            </div>
            <!-- Begin Widget 32 -->
            <div class="col-xl-4">
                <div class="widget-32 widget-image bg-image">
                    <div class="overlay"></div>
                    <div class="content">
                        <div id="events-day"></div>
                        <div id="events-date"></div>
                        <div id="events-year"></div>
                    </div>
                    <div class="real-time">
                        <div id="events-time"></div>
                    </div>
                </div>
            </div>
            <!-- End Widget 32 -->
        </div>
        <!-- End Row -->
  </div>

</div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
