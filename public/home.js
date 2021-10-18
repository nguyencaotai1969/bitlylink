            var api = {
				verry:'api.php?verry',
				cp:'api.php?captcha',
			}
			var app = new Vue({
			  el: '#app',
			  data: {
			  	isActive : false,
			  	errorsActive : true,
			  	successActive : false,
			  	link : '',
			  	captcha : '',
			    name: 'Vue.js',
			    message:'',
			    resdata:'',
			    numberCc:'',
			    linkBily:'',
			    linkOriginal:'',
			    hidden:false,
			    hiddenMsg:false
			  },
			  methods: {
			    short_btn: function (event) {
			    	app.isActive = true;
			    	app.hidden = false;
	                app.hiddenMsg = true;

			    	if(app.emptydata(this.link) || app.emptydata(this.captcha)){
			    		this.message = `
							<strong>Error!</strong> Params invalid!`;
						app.errorsActive = true;
	                	app.successActive = false;
	                	app.timeoutMessgae();
			    		return;
			    	}
			    	let thisMain = this;
			    	axios.post(api.verry, {
	                    link: this.link,
	                    captcha: this.captcha

	                })
	                .then(function (response) {
			    		app.captchas();

	                	if(response.data.error){
	                		app.message = `<strong>Error!</strong> ${response.data.error}`;
	                		app.errorsActive = true;
	                		app.successActive = false;
	                		app.timeoutMessgae();
	                		return;
	                	}
	                	if(response.data.success){
	                		app.message = `<strong>Success!</strong> ${response.data.success}`;
	                		app.errorsActive = false;
	                		app.successActive = true;
	                		app.linkBily = response.data.link_shorten;
	                		app.linkOriginal = response.data.link_full;
	                		app.link = '';
	                		app.captcha = '';
			    			app.hidden = true;
	                		app.timeoutMessgae();
	                		return;	
	                	}
	                })
	                .catch(function (error) {
	                    thisMain.resdata = error;
	                });
			    },
			    timeoutMessgae:function(){
					setTimeout(()=>{
			            app.isActive = false;
			            app.hiddenMsg = false;
			        }, 3000);
			    },
			    emptydata : function (value){
			    	return value === undefined || value === null || value === NaN || (typeof value === 'object' && Object.keys(value).length === 0 || (typeof value === 'string' && value.trim().length === 0));
			    },
			    captchas : function(){
			    	axios.get(api.cp)
	                .then(function (response) {
	                	app.numberCc = api.cp+'='+response.data;
	                	return;
	                })
	                .catch(function (error) {
	                    console.log(error);
	                });
			    },
			    copyUrl:function (){
			    	let Url = $("#short-link");
			    	Url.select();
			    	document.execCommand("copy");
			    }
			  },

			});
			app.captchas();