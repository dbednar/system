$( document ).ready(function() {
	function onlineUser(){
		 $.ajax({
        url: '/dashboard/online' ,
        data: '',
        success: function(data){
            $('#onlineUsers').html(data.online);
        }
		});
	}
	onlineUser()
    setInterval(function(){ 
		onlineUser()
    },300000);
    });
   