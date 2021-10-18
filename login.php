<?php 
session_start();
	if(!empty($_SESSION['user'])){
		header('Location:admin.php');
	}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>
      <link rel="stylesheet" href="public/bootstrap.min.css">
      <script src="public/jquery.min.js"></script>
      <script src="public/popper.min.js"></script>
      <script src="public/bootstrap.min.js"></script>
      <script src="public/vue.js"></script>
      <style type="text/css">
         .container{
         border:2px solid blue;
         text-align:center;
         height:500px;
         width:400px;
         }
         h1{
         margin:auto;
         }
         .row{
         height:90px;
         width:396px;
         background-color:paleturquoise;
         }
      </style>
   </head>
   <body>
      <div class="container" id="login">
         <div class="row">
            <h1><i class="fa fa-lock" aria-hidden="true"></i> Login</h1>
         </div>
         <br />
         <div class="alert fade in alert-dismissible" v-show="hiddenMsg" v-bind:class="{ show: isActive,'alert-success':successActive,'alert-danger':errorsActive }" >
         		<span v-html='message'></span> 
      		</div>
         <div class="input-group">
         	
            <div class="input-group-prepend">
               <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
            </div>
            <input type="text" v-model="username" name="" class="form-control" placeholder="username or email"/>
         </div>
         <br />
         <div class="input-group">
            <div class="input-group-prepend">
               <span class="input-group-text"><i class="fa fa-key icon"></i></span>
            </div>
            <input type="Password"   v-on:keyup.enter="btn_login" v-model="password" name="" class="form-control" placeholder="password"/>
         </div>
         <br />
         <div class="checkbox">
            <label><input type="checkbox" value=""/> Remember me</label>
         </div>
         <br />
         <button type="submit" @click='btn_login' class="btn btn-success"><span class="glyphicon glyphicon-off"></span> Login</button>
         <br /> 
         <center>
            <div style="border:1px solid black;height:1px;width:300px;"></div>
         </center>
         <br />
      </div>
      <script type="text/javascript" src="public/axios.min.js"></script>
      <script type="text/javascript">
      	
	      	var app = new Vue({
				  el: '#login',
				  data: {
				  isActive : false,
				  	errorsActive : true,
				  	successActive : false,
				  	password : '',
				    username: '',
				    message:'',
				    resdata:'',
				    hidden:false,
				    hiddenMsg:false
				  },
				  methods: {
				  	emptydata : function (value){
			    	return value === undefined || value === null || value === NaN || (typeof value === 'object' && Object.keys(value).length === 0 || (typeof value === 'string' && value.trim().length === 0));
			    	},
				    btn_login: function (event) {
					app.isActive = true;
			    	app.hidden = false;
	                app.hiddenMsg = true;
				    	if(app.emptydata(this.username) || app.emptydata(this.password)){
				    		this.message = `
								<strong>Error!</strong> Params invalid!`;
							app.errorsActive = true;
		                	app.successActive = false;
				    		return;
				    	}
				    	let thisMain = this;
				    	axios.post('api_admin.php?login', {
		                    username: this.username,
		                    password: this.password

		                })
		                .then(function (response) {
		                	if(response.data.error){
	                		app.message = `<strong>Error!</strong> ${response.data.error}`;
	                		app.errorsActive = true;
	                		app.successActive = false;
	                		app.timeoutMessgae();
	                		return;
		                	}
		                	if(response.data.success){
		                		location.reload()
		                		app.message = `<strong>Success!</strong> ${response.data.success}`;
		                		app.errorsActive = false;
		                		app.successActive = true;
				    				app.hidden = true;
		                		return;	
		                	}
		                })
		                .catch(function (error) {
		                    thisMain.resdata = error;
		                });
				    }
				  },

				});
      </script>
   </body>
</html>