<?php
require_once 'inc/header.php';
require_once 'SxGeo.php';

$ip = htmlspecialchars(stripslashes($_POST['ip']));

$SxGeo = new SxGeo('SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY);
$city = $SxGeo->getCityFull($ip);
$lowerCity = strtolower($city['country']['iso']);

$flag = '<img
src="https://flagcdn.com/16x12/' . $lowerCity . '.png"
srcset="https://flagcdn.com/32x24/' . $lowerCity . '.png 2x,
  https://flagcdn.com/48x36/' . $lowerCity . '.png 3x"
width="16"
height="12"
alt="' . $city['country']['name_en'] . '">'; //получаем флаг

$isp = file_get_contents("https://api.iplocation.net/?ip=" . $ip);
$isp = json_decode($isp, true);

if (ip2long($ip) == -1 || ip2long($ip) === FALSE) {
?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Произошла ошибка!</h4>
        <p>IP введен в неверном формате!</p>
        <hr>
    </div>
    <?php
    ?>
    <div class="center-block">
        <ul class="list-group list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Город</div>
                    <?= $city['city']['name_ru']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">City</div>
                    <?= $city['city']['name_en']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Код города</div>
                    <?= $city['city']['id']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Координата Lat</div>
                    <?= $city['city']['lat']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Координата Lon</div>
                    <?= $city['city']['lon']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Страна</div>
                    <?= $city['country']['name_ru']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Country</div>
                    <?= $city['country']['name_en']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Iso страны</div>
                    <?= $city['country']['iso']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Код страны</div>
                    <?= $city['country']['id']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Флаг</div>
                    <?= $flag; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Провайдер</div>
                    <?= $isp["isp"]; ?>
                </div>
            </li>
        </ul>
    </div>
<?php
}
require_once 'inc/footer.php';
