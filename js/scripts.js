$(function(){

  //Caminho do site
	var include_path = $("base").attr("base"); 
	



/*
/JS para ajustes da tela
*/
 	if($(window)[0].innerWidth > 991){
 		$("#button-logout").addClass("order-3");
 	}else{
 		$("#logo").addClass("me-auto");
 		$("#card-info").addClass("collapse");
 	}

 	$(window).resize(function(){
 		if($(window)[0].innerWidth > 991){
 			$("#button-logout").addClass("order-3");
 			$("#logo").removeClass("me-auto");
 			$("#card-info").removeClass("collapse");
 		}else{
 			$("#logo").addClass("me-auto");
 			$("#button-logout").removeClass("order-3");
 			$("#card-info").addClass("collapse");
 		}
 	})

/*
/Events on Click
*/

var element =  $(".div-link");
	for (var i = element.length - 1; i >= 0; i--) {
		console.log(element[i]);
	}


	$(".div-link,.nav-link").click(function(){

		var classAtual = $(this).attr("class").split(/\s+/)[0];
		var gearIcon = '<i id="active-gear" class="bi bi-gear-fill me-2"></i>';
		var ativado = $(".div-active");
		var vaiAtivar = $(this);

		if(classAtual == "div-link")
		{
		// removendo elementos e classes do link ativado
			ativado.addClass("text-secondary");
			ativado.removeClass("div-active");
			$("#active-gear").remove();

		// Adicionando elementos e classes para o próximo link a ser ativo
			$(this).removeClass("text-secondary");
			$(this).addClass("div-active");
			$(this).prepend(gearIcon);
		}
		else if(classAtual == "nav-link")
		{
			$(".active").removeClass("active");
			$(this).addClass("active");
			if($(window)[0].innerWidth < 991){
				$("#button-toggle").click();
			}
		}
	// Rolando a pagina para o target
		var target = $(this).attr("target");
		var divScroll = $(target).offset().top-55;

      $('html,body').animate({'scrollTop': divScroll});

		return false;
	})

	$("body").on("click","#alert-div",function(){
    	$(this).remove();
  })

})