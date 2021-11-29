(function () {
    var $container = $(document.getElementById('one_string'));
    var $address = $container.find('[name="address"]');
    $address.fias({
        type: $.fias.type.city,
    });
}
)();

function ans (a) {
      var namecity = $(a).attr('name');
      $('#answer').val(namecity)

      }

 window.onload = function () {

//sessionStorage.removeItem('a');

if(!sessionStorage.getItem('a'))
        {
			sessionStorage.setItem('a',ymaps.geolocation.region);
		}
		var r = sessionStorage.getItem('a');
		jQuery("#user-region").text(r);
		jQuery("#user-regionr").text(r);
  }

function region (b) {
		sessionStorage.setItem('a',$('#answer').val());
		var r = sessionStorage.getItem('a');
		jQuery("#user-region").text(r);
		jQuery("#user-regionr").text(r);
      }






