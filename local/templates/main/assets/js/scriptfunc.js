/*(function () {
    var $container = $(document.getElementById('one_string'));
    var $address = $container.find('[name="address"]');
    $address.fias({
        type: $.fias.type.city,
    });
}
)();*/

function ans (a) {
      var namecity = $(a).attr('name');
      $('.select2-search__field').text(namecity)

      }

 window.onload = function () {

//sessionStorage.removeItem('a');

if(!sessionStorage.getItem('a'))
        {
			sessionStorage.setItem('a',ymaps.geolocation.city);
		}
		var r = sessionStorage.getItem('a');
		jQuery("#user-region").text(r);
		jQuery("#user-regionr").text(r);
	 jQuery("#SDEK_cityName").text(r);
	 //IPOLSDEK_pvz.city = 'Москва';

  }

function region (b) {
		sessionStorage.setItem('a',$('#my_sity').val());
		var r = sessionStorage.getItem('a');
		jQuery("#user-region").text(r);
		jQuery("#user-regionr").text(r);
      }






