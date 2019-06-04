$("#agregar").click(function() {
	var dato=$("#nombre").val();
	var route="/categorias";
	var token=$("#token").val();

	$.ajax({
        url:route,
        headers:{'X-CSRF-TOKEN':token},
        type:'POST',
        dataType:'json',
        data:{nombre:dato}
	});
});