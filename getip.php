<?php
require_once 'inc/header.php';

$ip = htmlspecialchars(stripslashes($_POST['ip']));//

$isp = file_get_contents("http://ip-api.com/json/". $ip ."?fields=continent,continentCode,country,countryCode,region,regionName,city,zip,lat,lon,timezone,currency,isp,as,asname");
$isp = json_decode($isp, true);

$lowerCity = strtolower($isp['countryCode']);

$flag = '<img
src="https://flagcdn.com/16x12/' . $lowerCity . '.png"
srcset="https://flagcdn.com/32x24/' . $lowerCity . '.png 2x,
  https://flagcdn.com/48x36/' . $lowerCity . '.png 3x"
width="16"
height="12"
alt="' . $isp['countryCode'] . '">'; //получаем флаг

if (ip2long($ip) == -1 || ip2long($ip) === FALSE) {
?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Произошла ошибка!</h4>
        <p>IP введен в неверном формате!</p>
        <hr>
    </div>
    <?php
}else{
    ?>
    <div class="center-block">
        <ul class="list-group list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Continent</div>
                    <?= $isp['continent']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Continent code</div>
                    <?= $isp['continentCode']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Country</div>
                    <?= $isp['country'] . ' ' . $flag; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Country code</div>
                    <?= $isp['countryCode']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Region</div>
                    <?= $isp['region']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Region name</div>
                    <?= $isp['regionName']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">City</div>
                    <?= $isp['city']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">ZIP</div>
                    <?= $isp['zip']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">LAT</div>
                    <?= $isp['lat']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">LON</div>
                    <?= $isp['lon']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Timezone</div>
                    <?= $isp['timezone']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Currency</div>
                    <?= $isp['currency']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">AS</div>
                    <?= $isp['as']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">AS Name</div>
                    <?= $isp['asname']; ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">ISP</div>
                    <?= $isp["isp"]; ?>
                </div>
            </li>
        </ul>
    </div>
<?php
}
require_once 'inc/footer.php';
