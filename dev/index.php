<?php
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Dev");
?>

<div class="orders-list">
	<div class="order-item">
		<div class="order-item__head">
			<div class="order-item__number">Заказ №3092</div>
			<div class="order-item__pay">
				<a href="#" class="btn">Оплатить заказ</a>
			</div>
			<a href="#" class="order-item__repeat">
				<span>Повторить заказ</span>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M4.28195 10.7189C4.21228 10.649 4.12952 10.5936 4.0384 10.5558C3.94728 10.518 3.8496 10.4985 3.75095 10.4985C3.6523 10.4985 3.55461 10.518 3.4635 10.5558C3.37238 10.5936 3.28962 10.649 3.21995 10.7189L0.219947 13.7189C0.0791174 13.8597 0 14.0507 0 14.2499C0 14.449 0.0791174 14.64 0.219947 14.7809C0.360777 14.9217 0.551784 15.0008 0.750947 15.0008C0.950111 15.0008 1.14112 14.9217 1.28195 14.7809L3.75095 12.3104L6.21995 14.7809C6.36078 14.9217 6.55178 15.0008 6.75095 15.0008C6.95011 15.0008 7.14112 14.9217 7.28195 14.7809C7.42278 14.64 7.5019 14.449 7.5019 14.2499C7.5019 14.0507 7.42278 13.8597 7.28195 13.7189L4.28195 10.7189ZM23.7819 9.21888C23.7123 9.14903 23.6295 9.09362 23.5384 9.05581C23.4473 9.018 23.3496 8.99854 23.2509 8.99854C23.1523 8.99854 23.0546 9.018 22.9635 9.05581C22.8724 9.09362 22.7896 9.14903 22.7199 9.21888L20.2509 11.6894L17.7819 9.21888C17.6411 9.07805 17.4501 8.99893 17.2509 8.99893C17.0518 8.99893 16.8608 9.07805 16.7199 9.21888C16.5791 9.35971 16.5 9.55071 16.5 9.74988C16.5 9.94904 16.5791 10.14 16.7199 10.2809L19.7199 13.2809C19.7896 13.3507 19.8724 13.4061 19.9635 13.4439C20.0546 13.4818 20.1523 13.5012 20.2509 13.5012C20.3496 13.5012 20.4473 13.4818 20.5384 13.4439C20.6295 13.4061 20.7123 13.3507 20.7819 13.2809L23.7819 10.2809C23.8518 10.2112 23.9072 10.1284 23.945 10.0373C23.9828 9.94621 24.0023 9.84853 24.0023 9.74988C24.0023 9.65122 23.9828 9.55354 23.945 9.46242C23.9072 9.37131 23.8518 9.28854 23.7819 9.21888Z" fill="currentColor"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M12 4.4998C10.7507 4.49884 9.52107 4.81026 8.42287 5.40574C7.32466 6.00121 6.39278 6.86183 5.712 7.9093C5.60007 8.068 5.43094 8.17709 5.2402 8.21363C5.04947 8.25016 4.852 8.21129 4.68934 8.10518C4.52668 7.99908 4.41153 7.83401 4.3681 7.64473C4.32467 7.45544 4.35636 7.25669 4.4565 7.0903C5.51474 5.46405 7.07018 4.22333 8.89098 3.55308C10.7118 2.88283 12.7004 2.81894 14.5605 3.37094C16.4206 3.92294 18.0524 5.06126 19.2129 6.61623C20.3733 8.1712 21.0002 10.0596 21 11.9998C21 12.1989 20.9209 12.3899 20.7801 12.5307C20.6393 12.6714 20.4484 12.7505 20.2493 12.7505C20.0501 12.7505 19.8592 12.6714 19.7184 12.5307C19.5776 12.3899 19.4985 12.1989 19.4985 11.9998C19.4985 10.0107 18.7083 8.10302 17.3018 6.6965C15.8953 5.28997 13.9876 4.4998 11.9985 4.4998H12ZM3.75 11.2498C3.94891 11.2498 4.13968 11.3288 4.28033 11.4695C4.42098 11.6101 4.5 11.8009 4.5 11.9998C4.49944 13.6171 5.0217 15.1913 5.98888 16.4875C6.95606 17.7838 8.31634 18.7326 9.86686 19.1926C11.4174 19.6526 13.075 19.5991 14.5927 19.04C16.1103 18.4809 17.4065 17.4462 18.288 16.0903C18.34 16.0039 18.4088 15.929 18.4904 15.8698C18.572 15.8106 18.6647 15.7685 18.7629 15.746C18.8611 15.7235 18.9629 15.721 19.0621 15.7386C19.1613 15.7563 19.256 15.7938 19.3404 15.8489C19.4248 15.9039 19.4972 15.9754 19.5534 16.0591C19.6095 16.1428 19.6483 16.2369 19.6672 16.3359C19.6862 16.4349 19.685 16.5367 19.6637 16.6352C19.6425 16.7337 19.6016 16.8269 19.5435 16.9093C18.4853 18.5355 16.9298 19.7763 15.109 20.4465C13.2882 21.1168 11.2996 21.1807 9.4395 20.6287C7.57944 20.0767 5.94756 18.9383 4.78712 17.3834C3.62669 15.8284 2.99983 13.94 3 11.9998C3 11.9012 3.01945 11.8035 3.05723 11.7124C3.09502 11.6213 3.1504 11.5386 3.2202 11.4689C3.29 11.3993 3.37286 11.3441 3.46403 11.3065C3.55519 11.2689 3.65288 11.2496 3.7515 11.2498H3.75Z" fill="currentColor"/>
				</svg>
			</a>
			<a href="#" class="order-item__cancel">
				<span>Отменить заказ</span>
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8 15C6.14348 15 4.36301 14.2625 3.05025 12.9497C1.7375 11.637 1 9.85652 1 8C1 6.14348 1.7375 4.36301 3.05025 3.05025C4.36301 1.7375 6.14348 1 8 1C9.85652 1 11.637 1.7375 12.9497 3.05025C14.2625 4.36301 15 6.14348 15 8C15 9.85652 14.2625 11.637 12.9497 12.9497C11.637 14.2625 9.85652 15 8 15ZM8 16C10.1217 16 12.1566 15.1571 13.6569 13.6569C15.1571 12.1566 16 10.1217 16 8C16 5.87827 15.1571 3.84344 13.6569 2.34315C12.1566 0.842855 10.1217 0 8 0C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8C0 10.1217 0.842855 12.1566 2.34315 13.6569C3.84344 15.1571 5.87827 16 8 16Z" fill="currentColor"/>
					<path d="M5.25412 5.786C5.25275 5.81829 5.258 5.85053 5.26955 5.88072C5.2811 5.91091 5.2987 5.93841 5.32127 5.96155C5.34385 5.98468 5.37091 6.00296 5.40081 6.01524C5.43071 6.02753 5.4628 6.03357 5.49512 6.033H6.32012C6.45812 6.033 6.56812 5.92 6.58612 5.783C6.67612 5.127 7.12612 4.649 7.92812 4.649C8.61412 4.649 9.24212 4.992 9.24212 5.817C9.24212 6.452 8.86812 6.744 8.27712 7.188C7.60412 7.677 7.07112 8.248 7.10912 9.175L7.11212 9.392C7.11317 9.45761 7.13997 9.52017 7.18674 9.5662C7.23351 9.61222 7.2965 9.63801 7.36212 9.638H8.17312C8.23942 9.638 8.30301 9.61166 8.3499 9.56478C8.39678 9.51789 8.42312 9.4543 8.42312 9.388V9.283C8.42312 8.565 8.69612 8.356 9.43312 7.797C10.0421 7.334 10.6771 6.82 10.6771 5.741C10.6771 4.23 9.40112 3.5 8.00412 3.5C6.73712 3.5 5.34912 4.09 5.25412 5.786ZM6.81112 11.549C6.81112 12.082 7.23612 12.476 7.82112 12.476C8.43012 12.476 8.84912 12.082 8.84912 11.549C8.84912 10.997 8.42912 10.609 7.82012 10.609C7.23612 10.609 6.81112 10.997 6.81112 11.549Z" fill="currentColor"/>
				</svg>
			</a>
		</div>
		<div class="order-item__details">
			<div class="order-item__detail">
				<span>Дата оформления заказа</span>
				30/08/21
			</div>
			<div class="order-item__detail">
				<span>Статус оплаты и сумма</span>
				Неоплачен<br>
				Сумма 5 138 ₽
			</div>
			<div class="order-item__detail">
				<span>Доставка</span>
				до ПВЗ СДЕК
			</div>
			<div class="order-item__detail">
				<span>Дата и адрес доставки</span>
				Дата получения 01-03/09/2021<br>
				Адрес: Москва, ул. Летная, д. 7, стр. 4
			</div>
			<div class="order-item__detail">
				<span>Статус заказа</span>
				Оформлен,<br> ожидает оплаты
			</div>
		</div>
		<div class="order-item__count">12 товаров</div>
		<div class="order-item__products-previews-cont">
			<div class="order-item__products-previews">
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
			</div>
		</div>
		<div class="order-item__products">
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
		</div>
		<div class="order-products__toggle">
			<span>Подробнее о товарах</span>
			<span>Скрыть детали</span>
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M11.4699 6.96888C11.5396 6.89903 11.6224 6.84362 11.7135 6.80581C11.8046 6.768 11.9023 6.74854 12.0009 6.74854C12.0996 6.74854 12.1973 6.768 12.2884 6.80581C12.3795 6.84362 12.4623 6.89903 12.5319 6.96888L21.5319 15.9689C21.6728 16.1097 21.7519 16.3007 21.7519 16.4999C21.7519 16.699 21.6728 16.89 21.5319 17.0309C21.3911 17.1717 21.2001 17.2508 21.0009 17.2508C20.8018 17.2508 20.6108 17.1717 20.4699 17.0309L12.0009 8.56038L3.53195 17.0309C3.39112 17.1717 3.20011 17.2508 3.00095 17.2508C2.80178 17.2508 2.61078 17.1717 2.46995 17.0309C2.32912 16.89 2.25 16.699 2.25 16.4999C2.25 16.3007 2.32912 16.1097 2.46995 15.9689L11.4699 6.96888Z" fill="currentColor"/>
			</svg>
		</div>
	</div>
	<div class="order-item">
		<div class="order-item__head">
			<div class="order-item__number">Заказ №9778</div>
			<a href="#" class="order-item__repeat">
				<span>Повторить заказ</span>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M4.28195 10.7189C4.21228 10.649 4.12952 10.5936 4.0384 10.5558C3.94728 10.518 3.8496 10.4985 3.75095 10.4985C3.6523 10.4985 3.55461 10.518 3.4635 10.5558C3.37238 10.5936 3.28962 10.649 3.21995 10.7189L0.219947 13.7189C0.0791174 13.8597 0 14.0507 0 14.2499C0 14.449 0.0791174 14.64 0.219947 14.7809C0.360777 14.9217 0.551784 15.0008 0.750947 15.0008C0.950111 15.0008 1.14112 14.9217 1.28195 14.7809L3.75095 12.3104L6.21995 14.7809C6.36078 14.9217 6.55178 15.0008 6.75095 15.0008C6.95011 15.0008 7.14112 14.9217 7.28195 14.7809C7.42278 14.64 7.5019 14.449 7.5019 14.2499C7.5019 14.0507 7.42278 13.8597 7.28195 13.7189L4.28195 10.7189ZM23.7819 9.21888C23.7123 9.14903 23.6295 9.09362 23.5384 9.05581C23.4473 9.018 23.3496 8.99854 23.2509 8.99854C23.1523 8.99854 23.0546 9.018 22.9635 9.05581C22.8724 9.09362 22.7896 9.14903 22.7199 9.21888L20.2509 11.6894L17.7819 9.21888C17.6411 9.07805 17.4501 8.99893 17.2509 8.99893C17.0518 8.99893 16.8608 9.07805 16.7199 9.21888C16.5791 9.35971 16.5 9.55071 16.5 9.74988C16.5 9.94904 16.5791 10.14 16.7199 10.2809L19.7199 13.2809C19.7896 13.3507 19.8724 13.4061 19.9635 13.4439C20.0546 13.4818 20.1523 13.5012 20.2509 13.5012C20.3496 13.5012 20.4473 13.4818 20.5384 13.4439C20.6295 13.4061 20.7123 13.3507 20.7819 13.2809L23.7819 10.2809C23.8518 10.2112 23.9072 10.1284 23.945 10.0373C23.9828 9.94621 24.0023 9.84853 24.0023 9.74988C24.0023 9.65122 23.9828 9.55354 23.945 9.46242C23.9072 9.37131 23.8518 9.28854 23.7819 9.21888Z" fill="currentColor"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M12 4.4998C10.7507 4.49884 9.52107 4.81026 8.42287 5.40574C7.32466 6.00121 6.39278 6.86183 5.712 7.9093C5.60007 8.068 5.43094 8.17709 5.2402 8.21363C5.04947 8.25016 4.852 8.21129 4.68934 8.10518C4.52668 7.99908 4.41153 7.83401 4.3681 7.64473C4.32467 7.45544 4.35636 7.25669 4.4565 7.0903C5.51474 5.46405 7.07018 4.22333 8.89098 3.55308C10.7118 2.88283 12.7004 2.81894 14.5605 3.37094C16.4206 3.92294 18.0524 5.06126 19.2129 6.61623C20.3733 8.1712 21.0002 10.0596 21 11.9998C21 12.1989 20.9209 12.3899 20.7801 12.5307C20.6393 12.6714 20.4484 12.7505 20.2493 12.7505C20.0501 12.7505 19.8592 12.6714 19.7184 12.5307C19.5776 12.3899 19.4985 12.1989 19.4985 11.9998C19.4985 10.0107 18.7083 8.10302 17.3018 6.6965C15.8953 5.28997 13.9876 4.4998 11.9985 4.4998H12ZM3.75 11.2498C3.94891 11.2498 4.13968 11.3288 4.28033 11.4695C4.42098 11.6101 4.5 11.8009 4.5 11.9998C4.49944 13.6171 5.0217 15.1913 5.98888 16.4875C6.95606 17.7838 8.31634 18.7326 9.86686 19.1926C11.4174 19.6526 13.075 19.5991 14.5927 19.04C16.1103 18.4809 17.4065 17.4462 18.288 16.0903C18.34 16.0039 18.4088 15.929 18.4904 15.8698C18.572 15.8106 18.6647 15.7685 18.7629 15.746C18.8611 15.7235 18.9629 15.721 19.0621 15.7386C19.1613 15.7563 19.256 15.7938 19.3404 15.8489C19.4248 15.9039 19.4972 15.9754 19.5534 16.0591C19.6095 16.1428 19.6483 16.2369 19.6672 16.3359C19.6862 16.4349 19.685 16.5367 19.6637 16.6352C19.6425 16.7337 19.6016 16.8269 19.5435 16.9093C18.4853 18.5355 16.9298 19.7763 15.109 20.4465C13.2882 21.1168 11.2996 21.1807 9.4395 20.6287C7.57944 20.0767 5.94756 18.9383 4.78712 17.3834C3.62669 15.8284 2.99983 13.94 3 11.9998C3 11.9012 3.01945 11.8035 3.05723 11.7124C3.09502 11.6213 3.1504 11.5386 3.2202 11.4689C3.29 11.3993 3.37286 11.3441 3.46403 11.3065C3.55519 11.2689 3.65288 11.2496 3.7515 11.2498H3.75Z" fill="currentColor"/>
				</svg>
			</a>
			<a href="#" class="order-item__cancel">
				<span>Отменить заказ</span>
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8 15C6.14348 15 4.36301 14.2625 3.05025 12.9497C1.7375 11.637 1 9.85652 1 8C1 6.14348 1.7375 4.36301 3.05025 3.05025C4.36301 1.7375 6.14348 1 8 1C9.85652 1 11.637 1.7375 12.9497 3.05025C14.2625 4.36301 15 6.14348 15 8C15 9.85652 14.2625 11.637 12.9497 12.9497C11.637 14.2625 9.85652 15 8 15ZM8 16C10.1217 16 12.1566 15.1571 13.6569 13.6569C15.1571 12.1566 16 10.1217 16 8C16 5.87827 15.1571 3.84344 13.6569 2.34315C12.1566 0.842855 10.1217 0 8 0C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8C0 10.1217 0.842855 12.1566 2.34315 13.6569C3.84344 15.1571 5.87827 16 8 16Z" fill="currentColor"/>
					<path d="M5.25412 5.786C5.25275 5.81829 5.258 5.85053 5.26955 5.88072C5.2811 5.91091 5.2987 5.93841 5.32127 5.96155C5.34385 5.98468 5.37091 6.00296 5.40081 6.01524C5.43071 6.02753 5.4628 6.03357 5.49512 6.033H6.32012C6.45812 6.033 6.56812 5.92 6.58612 5.783C6.67612 5.127 7.12612 4.649 7.92812 4.649C8.61412 4.649 9.24212 4.992 9.24212 5.817C9.24212 6.452 8.86812 6.744 8.27712 7.188C7.60412 7.677 7.07112 8.248 7.10912 9.175L7.11212 9.392C7.11317 9.45761 7.13997 9.52017 7.18674 9.5662C7.23351 9.61222 7.2965 9.63801 7.36212 9.638H8.17312C8.23942 9.638 8.30301 9.61166 8.3499 9.56478C8.39678 9.51789 8.42312 9.4543 8.42312 9.388V9.283C8.42312 8.565 8.69612 8.356 9.43312 7.797C10.0421 7.334 10.6771 6.82 10.6771 5.741C10.6771 4.23 9.40112 3.5 8.00412 3.5C6.73712 3.5 5.34912 4.09 5.25412 5.786ZM6.81112 11.549C6.81112 12.082 7.23612 12.476 7.82112 12.476C8.43012 12.476 8.84912 12.082 8.84912 11.549C8.84912 10.997 8.42912 10.609 7.82012 10.609C7.23612 10.609 6.81112 10.997 6.81112 11.549Z" fill="currentColor"/>
				</svg>
			</a>
		</div>
		<div class="order-item__details">
			<div class="order-item__detail">
				<span>Дата оформления заказа</span>
				30/08/21
			</div>
			<div class="order-item__detail">
				<span>Статус оплаты и сумма</span>
				Неоплачен<br>
				Сумма 5 138 ₽
			</div>
			<div class="order-item__detail">
				<span>Доставка</span>
				до ПВЗ СДЕК
			</div>
			<div class="order-item__detail">
				<span>Дата и адрес доставки</span>
				Дата получения 01-03/09/2021<br>
				Адрес: Москва, ул. Летная, д. 7, стр. 4
			</div>
			<div class="order-item__detail">
				<span>Статус заказа</span>
				Формируется
			</div>
		</div>
		<div class="order-item__count">12 товаров</div>
		<div class="order-item__products-previews-cont">
			<div class="order-item__products-previews">
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
			</div>
		</div>
		<div class="order-item__products">
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
		</div>
		<div class="order-products__toggle">
			<span>Подробнее о товарах</span>
			<span>Скрыть детали</span>
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M11.4699 6.96888C11.5396 6.89903 11.6224 6.84362 11.7135 6.80581C11.8046 6.768 11.9023 6.74854 12.0009 6.74854C12.0996 6.74854 12.1973 6.768 12.2884 6.80581C12.3795 6.84362 12.4623 6.89903 12.5319 6.96888L21.5319 15.9689C21.6728 16.1097 21.7519 16.3007 21.7519 16.4999C21.7519 16.699 21.6728 16.89 21.5319 17.0309C21.3911 17.1717 21.2001 17.2508 21.0009 17.2508C20.8018 17.2508 20.6108 17.1717 20.4699 17.0309L12.0009 8.56038L3.53195 17.0309C3.39112 17.1717 3.20011 17.2508 3.00095 17.2508C2.80178 17.2508 2.61078 17.1717 2.46995 17.0309C2.32912 16.89 2.25 16.699 2.25 16.4999C2.25 16.3007 2.32912 16.1097 2.46995 15.9689L11.4699 6.96888Z" fill="currentColor"/>
			</svg>
		</div>
	</div>
	<div class="order-item">
		<div class="order-item__head">
			<div class="order-item__number">Заказ №4353</div>
			<a href="#" class="order-item__repeat">
				<span>Повторить заказ</span>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M4.28195 10.7189C4.21228 10.649 4.12952 10.5936 4.0384 10.5558C3.94728 10.518 3.8496 10.4985 3.75095 10.4985C3.6523 10.4985 3.55461 10.518 3.4635 10.5558C3.37238 10.5936 3.28962 10.649 3.21995 10.7189L0.219947 13.7189C0.0791174 13.8597 0 14.0507 0 14.2499C0 14.449 0.0791174 14.64 0.219947 14.7809C0.360777 14.9217 0.551784 15.0008 0.750947 15.0008C0.950111 15.0008 1.14112 14.9217 1.28195 14.7809L3.75095 12.3104L6.21995 14.7809C6.36078 14.9217 6.55178 15.0008 6.75095 15.0008C6.95011 15.0008 7.14112 14.9217 7.28195 14.7809C7.42278 14.64 7.5019 14.449 7.5019 14.2499C7.5019 14.0507 7.42278 13.8597 7.28195 13.7189L4.28195 10.7189ZM23.7819 9.21888C23.7123 9.14903 23.6295 9.09362 23.5384 9.05581C23.4473 9.018 23.3496 8.99854 23.2509 8.99854C23.1523 8.99854 23.0546 9.018 22.9635 9.05581C22.8724 9.09362 22.7896 9.14903 22.7199 9.21888L20.2509 11.6894L17.7819 9.21888C17.6411 9.07805 17.4501 8.99893 17.2509 8.99893C17.0518 8.99893 16.8608 9.07805 16.7199 9.21888C16.5791 9.35971 16.5 9.55071 16.5 9.74988C16.5 9.94904 16.5791 10.14 16.7199 10.2809L19.7199 13.2809C19.7896 13.3507 19.8724 13.4061 19.9635 13.4439C20.0546 13.4818 20.1523 13.5012 20.2509 13.5012C20.3496 13.5012 20.4473 13.4818 20.5384 13.4439C20.6295 13.4061 20.7123 13.3507 20.7819 13.2809L23.7819 10.2809C23.8518 10.2112 23.9072 10.1284 23.945 10.0373C23.9828 9.94621 24.0023 9.84853 24.0023 9.74988C24.0023 9.65122 23.9828 9.55354 23.945 9.46242C23.9072 9.37131 23.8518 9.28854 23.7819 9.21888Z" fill="currentColor"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M12 4.4998C10.7507 4.49884 9.52107 4.81026 8.42287 5.40574C7.32466 6.00121 6.39278 6.86183 5.712 7.9093C5.60007 8.068 5.43094 8.17709 5.2402 8.21363C5.04947 8.25016 4.852 8.21129 4.68934 8.10518C4.52668 7.99908 4.41153 7.83401 4.3681 7.64473C4.32467 7.45544 4.35636 7.25669 4.4565 7.0903C5.51474 5.46405 7.07018 4.22333 8.89098 3.55308C10.7118 2.88283 12.7004 2.81894 14.5605 3.37094C16.4206 3.92294 18.0524 5.06126 19.2129 6.61623C20.3733 8.1712 21.0002 10.0596 21 11.9998C21 12.1989 20.9209 12.3899 20.7801 12.5307C20.6393 12.6714 20.4484 12.7505 20.2493 12.7505C20.0501 12.7505 19.8592 12.6714 19.7184 12.5307C19.5776 12.3899 19.4985 12.1989 19.4985 11.9998C19.4985 10.0107 18.7083 8.10302 17.3018 6.6965C15.8953 5.28997 13.9876 4.4998 11.9985 4.4998H12ZM3.75 11.2498C3.94891 11.2498 4.13968 11.3288 4.28033 11.4695C4.42098 11.6101 4.5 11.8009 4.5 11.9998C4.49944 13.6171 5.0217 15.1913 5.98888 16.4875C6.95606 17.7838 8.31634 18.7326 9.86686 19.1926C11.4174 19.6526 13.075 19.5991 14.5927 19.04C16.1103 18.4809 17.4065 17.4462 18.288 16.0903C18.34 16.0039 18.4088 15.929 18.4904 15.8698C18.572 15.8106 18.6647 15.7685 18.7629 15.746C18.8611 15.7235 18.9629 15.721 19.0621 15.7386C19.1613 15.7563 19.256 15.7938 19.3404 15.8489C19.4248 15.9039 19.4972 15.9754 19.5534 16.0591C19.6095 16.1428 19.6483 16.2369 19.6672 16.3359C19.6862 16.4349 19.685 16.5367 19.6637 16.6352C19.6425 16.7337 19.6016 16.8269 19.5435 16.9093C18.4853 18.5355 16.9298 19.7763 15.109 20.4465C13.2882 21.1168 11.2996 21.1807 9.4395 20.6287C7.57944 20.0767 5.94756 18.9383 4.78712 17.3834C3.62669 15.8284 2.99983 13.94 3 11.9998C3 11.9012 3.01945 11.8035 3.05723 11.7124C3.09502 11.6213 3.1504 11.5386 3.2202 11.4689C3.29 11.3993 3.37286 11.3441 3.46403 11.3065C3.55519 11.2689 3.65288 11.2496 3.7515 11.2498H3.75Z" fill="currentColor"/>
				</svg>
			</a>
		</div>
		<div class="order-item__details">
			<div class="order-item__detail">
				<span>Дата оформления заказа</span>
				30/08/21
			</div>
			<div class="order-item__detail">
				<span>Статус оплаты и сумма</span>
				Неоплачен<br>
				Сумма 5 138 ₽
			</div>
			<div class="order-item__detail">
				<span>Доставка</span>
				до ПВЗ СДЕК
			</div>
			<div class="order-item__detail">
				<span>Дата и адрес доставки</span>
				Дата получения 01-03/09/2021<br>
				Адрес: Москва, ул. Летная, д. 7, стр. 4
			</div>
			<div class="order-item__detail">
				<span>Статус заказа</span>
				Доставлен
			</div>
		</div>
		<div class="order-item__count">12 товаров</div>
		<div class="order-item__products-previews-cont">
			<div class="order-item__products-previews">
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
			</div>
		</div>
		<div class="order-item__products">
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
		</div>
		<div class="order-products__toggle">
			<span>Подробнее о товарах</span>
			<span>Скрыть детали</span>
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M11.4699 6.96888C11.5396 6.89903 11.6224 6.84362 11.7135 6.80581C11.8046 6.768 11.9023 6.74854 12.0009 6.74854C12.0996 6.74854 12.1973 6.768 12.2884 6.80581C12.3795 6.84362 12.4623 6.89903 12.5319 6.96888L21.5319 15.9689C21.6728 16.1097 21.7519 16.3007 21.7519 16.4999C21.7519 16.699 21.6728 16.89 21.5319 17.0309C21.3911 17.1717 21.2001 17.2508 21.0009 17.2508C20.8018 17.2508 20.6108 17.1717 20.4699 17.0309L12.0009 8.56038L3.53195 17.0309C3.39112 17.1717 3.20011 17.2508 3.00095 17.2508C2.80178 17.2508 2.61078 17.1717 2.46995 17.0309C2.32912 16.89 2.25 16.699 2.25 16.4999C2.25 16.3007 2.32912 16.1097 2.46995 15.9689L11.4699 6.96888Z" fill="currentColor"/>
			</svg>
		</div>
	</div>
	<div class="order-item">
		<div class="order-item__head">
			<div class="order-item__number">Заказ №4353</div>
			<a href="#" class="order-item__repeat">
				<span>Повторить заказ</span>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M4.28195 10.7189C4.21228 10.649 4.12952 10.5936 4.0384 10.5558C3.94728 10.518 3.8496 10.4985 3.75095 10.4985C3.6523 10.4985 3.55461 10.518 3.4635 10.5558C3.37238 10.5936 3.28962 10.649 3.21995 10.7189L0.219947 13.7189C0.0791174 13.8597 0 14.0507 0 14.2499C0 14.449 0.0791174 14.64 0.219947 14.7809C0.360777 14.9217 0.551784 15.0008 0.750947 15.0008C0.950111 15.0008 1.14112 14.9217 1.28195 14.7809L3.75095 12.3104L6.21995 14.7809C6.36078 14.9217 6.55178 15.0008 6.75095 15.0008C6.95011 15.0008 7.14112 14.9217 7.28195 14.7809C7.42278 14.64 7.5019 14.449 7.5019 14.2499C7.5019 14.0507 7.42278 13.8597 7.28195 13.7189L4.28195 10.7189ZM23.7819 9.21888C23.7123 9.14903 23.6295 9.09362 23.5384 9.05581C23.4473 9.018 23.3496 8.99854 23.2509 8.99854C23.1523 8.99854 23.0546 9.018 22.9635 9.05581C22.8724 9.09362 22.7896 9.14903 22.7199 9.21888L20.2509 11.6894L17.7819 9.21888C17.6411 9.07805 17.4501 8.99893 17.2509 8.99893C17.0518 8.99893 16.8608 9.07805 16.7199 9.21888C16.5791 9.35971 16.5 9.55071 16.5 9.74988C16.5 9.94904 16.5791 10.14 16.7199 10.2809L19.7199 13.2809C19.7896 13.3507 19.8724 13.4061 19.9635 13.4439C20.0546 13.4818 20.1523 13.5012 20.2509 13.5012C20.3496 13.5012 20.4473 13.4818 20.5384 13.4439C20.6295 13.4061 20.7123 13.3507 20.7819 13.2809L23.7819 10.2809C23.8518 10.2112 23.9072 10.1284 23.945 10.0373C23.9828 9.94621 24.0023 9.84853 24.0023 9.74988C24.0023 9.65122 23.9828 9.55354 23.945 9.46242C23.9072 9.37131 23.8518 9.28854 23.7819 9.21888Z" fill="currentColor"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M12 4.4998C10.7507 4.49884 9.52107 4.81026 8.42287 5.40574C7.32466 6.00121 6.39278 6.86183 5.712 7.9093C5.60007 8.068 5.43094 8.17709 5.2402 8.21363C5.04947 8.25016 4.852 8.21129 4.68934 8.10518C4.52668 7.99908 4.41153 7.83401 4.3681 7.64473C4.32467 7.45544 4.35636 7.25669 4.4565 7.0903C5.51474 5.46405 7.07018 4.22333 8.89098 3.55308C10.7118 2.88283 12.7004 2.81894 14.5605 3.37094C16.4206 3.92294 18.0524 5.06126 19.2129 6.61623C20.3733 8.1712 21.0002 10.0596 21 11.9998C21 12.1989 20.9209 12.3899 20.7801 12.5307C20.6393 12.6714 20.4484 12.7505 20.2493 12.7505C20.0501 12.7505 19.8592 12.6714 19.7184 12.5307C19.5776 12.3899 19.4985 12.1989 19.4985 11.9998C19.4985 10.0107 18.7083 8.10302 17.3018 6.6965C15.8953 5.28997 13.9876 4.4998 11.9985 4.4998H12ZM3.75 11.2498C3.94891 11.2498 4.13968 11.3288 4.28033 11.4695C4.42098 11.6101 4.5 11.8009 4.5 11.9998C4.49944 13.6171 5.0217 15.1913 5.98888 16.4875C6.95606 17.7838 8.31634 18.7326 9.86686 19.1926C11.4174 19.6526 13.075 19.5991 14.5927 19.04C16.1103 18.4809 17.4065 17.4462 18.288 16.0903C18.34 16.0039 18.4088 15.929 18.4904 15.8698C18.572 15.8106 18.6647 15.7685 18.7629 15.746C18.8611 15.7235 18.9629 15.721 19.0621 15.7386C19.1613 15.7563 19.256 15.7938 19.3404 15.8489C19.4248 15.9039 19.4972 15.9754 19.5534 16.0591C19.6095 16.1428 19.6483 16.2369 19.6672 16.3359C19.6862 16.4349 19.685 16.5367 19.6637 16.6352C19.6425 16.7337 19.6016 16.8269 19.5435 16.9093C18.4853 18.5355 16.9298 19.7763 15.109 20.4465C13.2882 21.1168 11.2996 21.1807 9.4395 20.6287C7.57944 20.0767 5.94756 18.9383 4.78712 17.3834C3.62669 15.8284 2.99983 13.94 3 11.9998C3 11.9012 3.01945 11.8035 3.05723 11.7124C3.09502 11.6213 3.1504 11.5386 3.2202 11.4689C3.29 11.3993 3.37286 11.3441 3.46403 11.3065C3.55519 11.2689 3.65288 11.2496 3.7515 11.2498H3.75Z" fill="currentColor"/>
				</svg>
			</a>
		</div>
		<div class="order-item__details">
			<div class="order-item__detail">
				<span>Дата оформления заказа</span>
				30/08/21
			</div>
			<div class="order-item__detail">
				<span>Статус оплаты и сумма</span>
				Неоплачен<br>
				Сумма 5 138 ₽
			</div>
			<div class="order-item__detail">
				<span>Доставка</span>
				до ПВЗ СДЕК
			</div>
			<div class="order-item__detail">
				<span>Дата и адрес доставки</span>
				Дата получения 01-03/09/2021<br>
				Адрес: Москва, ул. Летная, д. 7, стр. 4
			</div>
			<div class="order-item__detail">
				<span>Статус заказа</span>
				Отменен
			</div>
		</div>
		<div class="order-item__count">12 товаров</div>
		<div class="order-item__products-previews-cont">
			<div class="order-item__products-previews">
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
				<a href="#"><img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD"></a>
			</div>
		</div>
		<div class="order-item__products">
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
			<div class="order-product">
				<a href="#" class="order-product__thumb">
					<img src="/dev/order-thumb.png" alt="Ортопедическая подушка под голову Qmed STANDARD">
				</a>
				<div class="order-product__content">
					<a href="#" class="order-product__title">Ортопедическая подушка под голову Qmed STANDARD</a>
					<ul class="order-product__options">
						<li><span>Цвет:</span> белый</li>
						<li><span>Размер:</span> М</li>
					</ul>
				</div>
				<div class="order-product__qty">1 шт</div>
				<div class="order-product__price">5 094 ₽</div>
			</div>
		</div>
		<div class="order-products__toggle">
			<span>Подробнее о товарах</span>
			<span>Скрыть детали</span>
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M11.4699 6.96888C11.5396 6.89903 11.6224 6.84362 11.7135 6.80581C11.8046 6.768 11.9023 6.74854 12.0009 6.74854C12.0996 6.74854 12.1973 6.768 12.2884 6.80581C12.3795 6.84362 12.4623 6.89903 12.5319 6.96888L21.5319 15.9689C21.6728 16.1097 21.7519 16.3007 21.7519 16.4999C21.7519 16.699 21.6728 16.89 21.5319 17.0309C21.3911 17.1717 21.2001 17.2508 21.0009 17.2508C20.8018 17.2508 20.6108 17.1717 20.4699 17.0309L12.0009 8.56038L3.53195 17.0309C3.39112 17.1717 3.20011 17.2508 3.00095 17.2508C2.80178 17.2508 2.61078 17.1717 2.46995 17.0309C2.32912 16.89 2.25 16.699 2.25 16.4999C2.25 16.3007 2.32912 16.1097 2.46995 15.9689L11.4699 6.96888Z" fill="currentColor"/>
			</svg>
		</div>
	</div>
</div>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>