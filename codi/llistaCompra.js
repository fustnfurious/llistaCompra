$(document).ready(main);

function main(){
  $(".llistaProductesDiv").hide();
  $("#arrowUp").hide();
  $(".formulariContainer").hide();
  $(".popUpPers").hide();
  var down=true;
  $(".titolLlistaProductesContainer").click(function(){
    if (down){
      $("#arrowDown").hide();
      $("#arrowUp").show();
    } else {
      $("#arrowUp").hide();
      $("#arrowDown").show();
    }
    down = !down;
    $(".llistaProductesDiv").slideToggle();
  });
  $(".botoCompra").click(function(){
    $(".formulariContainer").fadeIn();
  });

  $("#cancela").click(function(){
    $(".formulariContainer").fadeOut();
  });
  $(".popUpTancaBtn").click(function(){
    $(".popUpPers").fadeOut();
  });

  $("#prodList").on("click", "li.prodListItem", function(event){
    var idP = this.id;
    $(".llistaProductesDiv").slideToggle();
    $("#arrowUp").hide();
    $("#arrowDown").show();
    document.getElementById('titolPopUp').innerHTML = "Les últimes persones en comprar "+this.innerHTML.toLowerCase()+" han sigut:";
    $.post("quiProd.php", {
      idProd: idP
    },
    function(data){
      document.getElementById('popUpLlista').innerHTML = data;
    });
    $(".popUpPers").fadeIn();

  });



  $("#botoEsborra").click(function(){
    var r = confirm("Segur?");
    if (r == true) {
      $.post("esborraCompra.php");
      window.setTimeout(function(){
        location.reload();
      }, 500);
    } else {
    }
  });
}
