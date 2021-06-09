<?php
// Selecting the data from the database needed for the Global Table
$stmtYesterday = $db->query("SELECT * FROM `total`  WHERE date = '$yesterday' ORDER BY confirmed DESC");
$countriesYesterday = $stmtYesterday->fetchAll();

$stmtEreyesterday = $db->query("SELECT * FROM `total`  WHERE date = '$ereyesterday' ORDER BY confirmed DESC");
$countriesEreyesterday = $stmtEreyesterday->fetchAll();

?>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr class="text-white">
                <td class="theadCountries">Country</td>
                <td class="theadConfirmed">Total confirmed</td>
                <td class="theadRecovered">Total recovered</td>
                <td class="theadDeaths">Total deaths</td>
                <td class="theadConfirmed">New confirmed</td>
                <td class="theadRecovered">New recovered</td>
                <td class="theadDeaths">New deaths</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($countriesYesterday as $key => $value) {
                echo "
            <tr>
            <td>{$countriesYesterday[$key]['country']}</td>
            <td class='tdConfirmed'>" . number_format($countriesYesterday[$key]['confirmed']) . "</td>
            <td class='tdRecovered'>" . number_format($countriesYesterday[$key]['recovered']) . "</td>
            <td class='tdDeaths'>" . number_format($countriesYesterday[$key]['deaths']) . "</td>
            <td class='tdConfirmed'>" . number_format($countriesYesterday[$key]['confirmed'] - $countriesEreyesterday[$key]['confirmed']) . "</td>
            <td class='tdRecovered'>" . number_format($countriesYesterday[$key]['recovered'] - $countriesEreyesterday[$key]['recovered']) . "</td>
            <td class='tdDeaths'>" . number_format($countriesYesterday[$key]['deaths'] - $countriesEreyesterday[$key]['deaths']) . "</td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</div>