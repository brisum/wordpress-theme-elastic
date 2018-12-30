<h1>
    <?php the_title(); ?>
</h1>

<div class="content">
    <div class="content-block shipment-methods">
        <h2>Способы доставки</h2>

        <div class="row">
            <div class="col-xs-12 col-sm-6- col-md-4">
                <div class="shipment-method">
                    <img src="<?php echo THEME_URI; ?>/resources/assets/src/img/shipments/self-shipment.png?<?php echo THEME_VERSION; ?>"
                         alt="Самовывоз">

                    <div class="shipment-title">
                        Самовывоз
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6- col-md-4">
                <div class="shipment-method">
                    <img src="<?php echo THEME_URI; ?>/resources/assets/src/img/shipments/courier-shipment.png?<?php echo THEME_VERSION; ?>"
                         alt="Доставка курьером">

                    <div class="shipment-title">
                        Доставка курьером
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6- col-md-4">
                <div class="shipment-method nova-poshta">
                    <img src="<?php echo THEME_URI; ?>/resources/assets/src/img/shipments/nova-poshta.svg?<?php echo THEME_VERSION; ?>"
                         alt="Новая почта">

                    <div class="shipment-title">
                        Новая почта
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6- col-md-4">
                <div class="shipment-method">
                    <img src="<?php echo THEME_URI; ?>/resources/assets/src/img/shipments/intime.png?<?php echo THEME_VERSION; ?>"
                         alt="Ин-тайм">

                    <div class="shipment-title">
                        Ин-тайм
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6- col-md-4">
                <div class="shipment-method">
                    <img src="<?php echo THEME_URI; ?>/resources/assets/src/img/shipments/mist-express.png?<?php echo THEME_VERSION; ?>"
                         alt="Ин-тайм">

                    <div class="shipment-title">
                        Мист Экспресс
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-block shipment-regions">
        <h2>Регионы доставки</h2>

        <div class="row">
            <div class="col-sm-12 col-md-4">
                <ul>
                    <li><span class="bold">Азербайджан</span>, все регионы</li>
                    <li><span class="bold">Армения</span>, все регионы</li>
                    <li><span class="bold">Беларусь</span>, все регионы</li>
                    <li><span class="bold">Грузия</span>, все регионы</li>
                    <li><span class="bold">Казахстан</span>, все регионы</li>
                    <li><span class="bold">Кыргызстан</span>, все регионы</li>
                    <li><span class="bold">Молдова</span>, все регионы</li>
                    <li><span class="bold">Таджикистан</span>, все регионы</li>
                    <li><span class="bold">Туркменистан</span>, все регионы</li>
                    <li><span class="bold">Узбекистан</span>, все регионы</li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-4">
                <ul>
                    <li><span class="bold">Украина:</span></li>
                    <li>Винницкая область</li>
                    <li>Волынская область</li>
                    <li>Днепропетровская область</li>
                    <li>Донецкая область</li>
                    <li>Житомирская область</li>
                    <li>Закарпатская область</li>
                    <li>Запорожская область</li>
                    <li>Ивано-Франковская область</li>
                    <li>Киев</li>
                    <li>Киевская область</li>
                    <li>Кировоградская область</li>
                    <li>Крым</li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-4">
                <ul>
                    <li>Луганская область</li>
                    <li>Львовская область</li>
                    <li>Николаевская область</li>
                    <li>Одесская область</li>
                    <li>Полтавская область</li>
                    <li>Ровненская область</li>
                    <li>Сумская область</li>
                    <li>Тернопольская область</li>
                    <li>Харьковская область</li>
                    <li>Херсонская область</li>
                    <li>Хмельницкая область</li>
                    <li>Черкасская область</li>
                    <li>Черниговская область</li>
                    <li>Черновицкая область</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="content-block shipment-regions">
        <h2>Способы оплаты</h2>

        <div class="row">
            <div class="col-xs-12 col-sm-6- col-md-4">
                <div class="payment-method">
                    <img src="<?php echo THEME_URI; ?>/resources/assets/src/img/payment/check.png?<?php echo THEME_VERSION; ?>"
                         alt="Наложенный платеж">

                    <div class="shipment-title">
                        Наложенный платеж
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6- col-md-4">
                <div class="payment-method">
                    <img src="<?php echo THEME_URI; ?>/resources/assets/src/img/payment/card.png?<?php echo THEME_VERSION; ?>"
                         alt="Безналичный расчет">

                    <div class="shipment-title">
                        Безналичный расчет
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6- col-md-4">
                <div class="payment-method">
                    <img src="<?php echo THEME_URI; ?>/resources/assets/src/img/payment/cash.png?<?php echo THEME_VERSION; ?>"
                         alt="Наличными">

                    <div class="shipment-title">
                        Наличными
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-block shipment-regions">
        <h2>*Примечания</h2>

        <div class="row">
            <div class="col-12">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

</div>
