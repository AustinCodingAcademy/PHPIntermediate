<?php
$cmd = 'exec ssh localhost  php /home/fmpub/FM/scripts/maintenance.php "date_type=dates\&start_date=2014-10-01\&end_date=2014-10-31\&selected_month_m=10\&selected_month_y=2014\&selected_quarter=2014-10-01\&date_method=placement\&status=both\&showproposals=no\&deal_type_selected%5B0%5D=Media\&deal_type_selected%5B1%5D=CM\&deal_type_selected%5B2%5D=Self-serve\&deal_type_selected%5B3%5D=Publishing\&layout=standard\&object=Campaign\&range=date\&columns=all\&sites=all\&sales_reps=all\&managers=all\&aso=all\&sd=all\&billing=all\&client_services=all\&products=all\&targets=all\&site_networks=all\&ad_units=all\&campaigns=all\&campaigns_selected=\&submit=Generate+Report\&uniqid=544fb8c9a2124\&process=now\&action=revenue\&backend=1\&function=generateRevenueReport\&user_id=10061"$process=backend';

$cmd  = str_replace('\\', '', $cmd );

$str =  urldecode(html_entity_decode($cmd));
$arr = explode('&', $str);
echo '<pre>';
print_r($arr);