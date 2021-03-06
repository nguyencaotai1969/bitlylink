<?php 
	include 'api.php';
	header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bitlylink link rút gọn miễn phí</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
      <link rel="icon" href="public/icon.png" sizes="32x32" />
      <link rel="icon" href="public/icon.png" sizes="192x192" />
      <link rel="icon" type="image/png" href="public/icon.png" />
      <link rel="apple-touch-icon" href="public/icon.png" />
      <meta name="msapplication-TileImage" content="public/icon.png" />
      <link rel="stylesheet" href="public/bootstrap.min.css">
      <meta name="og:site_name" content="CodeZone">
      <meta property="og:type" content="website" />
      <meta property="og:image" content="public/icon.png">
      <script src="public/jquery.min.js"></script>
      <script src="public/popper.min.js"></script>
      <script src="public/bootstrap.min.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      <script src="public/vue.js"></script>
      <link rel="stylesheet" type="text/css" href="style.css">
      <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4VTZVGVYXB"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-4VTZVGVYXB');
    </script>
     <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WP8Z76Q');</script>
    <!-- End Google Tag Manager -->
   </head>
   <body>
      <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WP8Z76Q"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
   	<!-- #comment facebook -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="4sQAQvkW"></script>
<div id="app">
   <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
         <a class="navbar-brand" href="/">
            <h1>
            <img src="public/auto_site_logo.png" alt="Rút gọn link miễn phí - Web rút gọn liên kết - Free URL, bitlilink.fun">
            </h1>
         </a>   
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
         <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
         </ul>
         <button data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-success my-2 my-sm-0" type="submit">Kiếm tiền</button>
      </div>
   </nav>
   <div class="container" >
      <div class="jumbotron text-center">
         <div class="promo">
            <h1>Rút gọn link, làm ngắn link miễn phí, không có quảng cáo.</h1>
            <div class="promo">
               <p class="description">      
                  Website rút gọn link miễn phí, rút gọn link theo ý muốn, làm ngắn không có quảng cáo.Tốc độ truy cập cao và ổn định. Chứng chỉ bảo mật an toàn. <strong>Miễn phí và sẽ mãi như vậy.</strong>  
               </p>
            </div>
            <div class="noticer">!Lưu ý: Những link gốc có nội dung giả mạo, lừa đảo, đồi trụy, vi phạm pháp luật sẽ bị xóa mà không cần báo trước.</div>
         </div>
      </div>
      <div class="col-12">
         <div class="alert fade in alert-dismissible" v-show="hiddenMsg" v-bind:class="{ show: isActive,'alert-success':successActive,'alert-danger':errorsActive }" >
            <span v-html='message'></span> 
         </div>
         <div class="form-row">
            <div class="col-12 col-md">
               <div class="form-row">
                  <div class="col-12">
                     <input type="text" id="short" v-model="link" autocomplete="off" autocapitalize="none" spellcheck="false" name="url" class="input-style input-border-button form-control form-control-lg font-size-lg text-success" placeholder="Link cần rút gọn">
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-auto">
               <div class="form-row">
                  <div class="col-12 col-md">
                     <div class="input-group mt-3 mt-md-0">
                        <input type="text" v-model="captcha" name="captcha" placeholder="Captcha" id="captcha" autocomplete="off" class="captcha input-style form-control form-control-lg font-size-lg input-border-button">
                        <div class="input-group-append">
                           <span class="input-group-text p-0 bg-white input-style" id="basic-addon2"><img v-bind:src="numberCc" ></span>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md">
                     <button class="short-button btn btn-danger btn-lg btn-block font-size-lg mt-3 mt-md-0 text-capitalize"  v-on:click="short_btn" id="short-btn">Rút gọn link</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="short-results">
         <div class="card mt-3" v-show="hidden">
            <div class="card-body pb-1">
               <div class="short-container" id="focus">
                  <div class="form-group">
                     <label>Link Bitly</label>
                     <div class="input-group">
                        <input type="text" v-bind:value="linkBily" readonly="readonly" class="form-control" id="short-link">
                        <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Chuyển hướng">
                           <a target="_blank" class="btn btn-warning" v-bind:href="linkBily">
                           <i class="fa fa-external-link" aria-hidden="true"></i>
                           </a>
                        </div>
                        <div class="input-group-append"  data-toggle="tooltip" data-placement="top" title="Sao chép">
                           <button @click="copyUrl" class="btn btn-primary" type="button" data-clipboard-target="#short-link" data-original-title="Copy" data-toggle="tooltip-copy"><i class="fa fa-clone" aria-hidden="true"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="form-group d-none d-sm-block">
                     <label>Original URL</label>
                     <input type="text" v-bind:value="linkOriginal" readonly="readonly" class="form-control">
                  </div>
               </div>
            </div>
         </div>
         <div class="card mt-3 none-boder">
            <a class="btn btn-primary short-button" @click='getShortenlist' data-toggle="collapse" href="#listshorter" role="button" aria-expanded="false" aria-controls="listshorter">
           Các link đã rút gọn...
            </a>
            <div class="card-body pb-1 collapse listshorters" id="listshorter">
               <div class="short-container" >
                  <div class="form-group d-sm-block" v-if='dataShorter.length > 0' v-for="item in dataShorter" :key="item.id">
                     <label class='show-dots'>{{ item.full_url }}</label>
                     <div class="input-group">
                        <input type="text" v-bind:class='item.id' v-bind:value="item.shorten_url" readonly="readonly" class="form-control">
                        <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Chuyển hướng">
                           <a target="_blank" class="btn btn-warning" v-bind:href="item.shorten_url">
                           <i class="fa fa-external-link" aria-hidden="true"></i>
                           </a>
                        </div>
                        <div class="input-group-append"  data-toggle="tooltip" data-placement="top" title="Sao chép">
                           <button @click="coppyList(item.id)" class="btn btn-primary" type="button" data-clipboard-target="#short-link" data-original-title="Copy" data-toggle="tooltip-copy"><i class="fa fa-clone" aria-hidden="true"></i>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="fb-comments" data-width="100%" data-order-by="reverse_time" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
      </div>
   </div>
   <section class="red">
      <h2 class="text-center font-color">
         Thương hiệu nổi tiếng rút gọn link bằng Bitlylink  
      </h2>
      <div class="container">
         <div class="row">
            <div v-if='dataBaner.length > 0' v-for="item in dataBaner" :key="item.id" class="col-sm-2 feature2">
               <a target="_blank" v-bind:href="item.href">
               <img v-bind:src="item.img" v-bind:alt="item.name" style="height:50%;width:100%">
               </a>
            </div>
         </div>
      </div>
   </section>
   <div class="bottom section-padding">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <div class="copyright">
                  <p><span>Contact ads:</span> <a href="#" class="transition" >lagutai.edu.vn@gmail.com</a> Thanks you!.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title text-warning" id="exampleModalLabel">Warning !</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <h2 class="text-center text-danger">Tính năng này chúng tôi đang phát triển sẽ sớm ra mắt trong thời gian tới !</h2>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
</div>
		<script type="text/javascript" src="public/axios.min.js"></script>
		<script type="text/javascript" src="public/home.js">
		</script>
   </body>
</html>