<?php
//http://drupalcontrib.org/api/drupal/drupal--modules--node--node.tpl.php
//node--[CONTENT TYPE].tpl.php

$simpleSearch = module_invoke('islandora_solr', 'block_view', 'simple');
$theme_path = drupal_get_path('theme', variable_get('theme_default', NULL));
//$content['field_name']['#theme'] = "nomarkup";
$searchOptions = module_invoke('menu', 'block_view', 'menu-search-options');
$hero_image = $content['field_hero_image'];
$hero_image_uri = $content['field_hero_image']['#items'][0]['uri'];
$hero_image_path = file_create_url($hero_image_uri);
if ($classes) {
  $classes = ' class="'. $classes . ' "';
}

if ($id_node) {
  $id_node = ' id="'. $id_node . '"';
}

hide($content['comments']);
hide($content['links']);
hide($content['field_hero_image']);
?>
<!-- node.tpl.php -->
<?php //print render($hero_image);  ?>
<div class="hero--wrapper">
  <div class="hero-section" style="background: url(<?php print($hero_image_path) ?>) 50% no-repeat;">
    <div class="logo-wrapper">
      <figure class="logo--ilives">

<svg width="100%" height="100%" viewBox="0 0 91 49" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 54 (76480) - https://sketchapp.com -->
    <title>ilives_logo</title>
    <desc>Created with Sketch.</desc>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="ilives_logo" transform="translate(0.052356, -0.261780)" fill="#E1DBCB">
            <g id="logo--island" transform="translate(0.140675, 0.126945)">
                <path d="M29.990282,4.65869282 C30.0989593,4.7130315 30.132921,4.81491653 30.092167,4.9643479 C30.051413,5.11377927 29.9631126,5.27679531 29.8272659,5.45339603 C29.6914192,5.62999674 29.5351955,5.79980512 29.3585948,5.96282116 C29.1819941,6.1258372 29.0121857,6.24809923 28.8491697,6.32960725 C28.2514442,6.49262329 27.7352267,6.73035502 27.3005173,7.04280243 C26.8658078,7.35524985 26.4650601,7.79675163 26.098274,8.36730777 C25.7314879,8.93786392 25.3850788,9.67822845 25.0590467,10.5884013 C24.7330146,11.4985742 24.3933979,12.6600635 24.0401964,14.0728692 C23.0892695,17.7407302 21.7172179,20.8516196 19.9240414,23.4055376 C20.2772428,23.351199 20.6100672,23.2696909 20.9225146,23.1610136 C21.2349621,23.0523362 21.4591091,22.9572435 21.5949558,22.8757355 C21.6764638,22.8485662 21.7308025,22.8689432 21.7579719,22.9368665 C21.7851412,23.0047899 21.7715565,23.0795056 21.7172179,23.1610136 C21.4998631,23.2968603 21.2010004,23.432707 20.8206296,23.5685537 C20.4402589,23.7044004 20.0463034,23.7994931 19.6387633,23.8538318 C17.9270949,26.1632257 15.9573177,27.9224405 13.7294318,29.1314761 C11.5015459,30.3405118 9.09705927,30.9450296 6.51597195,30.9450296 C4.5326101,30.9450296 3.01112704,30.5918282 1.95152277,29.8854253 C0.8919185,29.1790225 0.362116364,28.2688496 0.362116364,27.1549066 C0.362116364,26.2039797 0.742487128,25.3005991 1.50322866,24.4447649 C2.26397019,23.5889307 3.45942116,22.9572435 5.08958158,22.5497034 C5.22542828,22.5768728 5.30014397,22.6312114 5.31372864,22.7127195 C5.32731331,22.7942275 5.3069363,22.8621508 5.25259762,22.9164895 C3.59526786,23.4598763 2.76660298,24.4923113 2.76660298,26.0137943 C2.76660298,27.1549066 3.2148971,28.0650795 4.11148533,28.744313 C5.00807356,29.4235465 6.25786321,29.7631633 7.86085429,29.7631633 C9.98006284,29.7631633 11.8819167,29.3216615 13.5664158,28.4386579 C15.2509149,27.5556544 16.7316439,26.068133 18.0086029,23.9760938 C16.6229665,23.8945858 15.5633623,23.3647836 14.8297901,22.3866874 C14.0962179,21.4085911 13.7294318,20.1452168 13.7294318,18.5965644 C13.7294318,16.9120653 14.1777259,15.2411509 15.0743141,13.5838211 C15.9709024,11.9264914 17.1663533,10.4321776 18.6606671,9.10087996 C20.1549808,7.76958229 21.8870262,6.69639335 23.8568034,5.88131314 C25.8265806,5.06623293 27.8710734,4.65869282 29.990282,4.65869282 Z M21.5134478,14.9694575 C21.8123105,13.7468372 22.1383426,12.7008176 22.491544,11.8313987 C22.8447455,10.9619798 23.2387009,10.2080306 23.6734104,9.56955108 C24.1081198,8.93107159 24.6039603,8.38089245 25.1609317,7.91901366 C25.7179032,7.45713487 26.363175,7.02242543 27.0967472,6.61488532 C25.2220628,6.83224005 23.4968096,7.33487284 21.9209879,8.12278371 C20.3451662,8.91069458 18.9866991,9.85482916 17.8455869,10.9551874 C16.7044746,12.0555457 15.821471,13.257789 15.1965762,14.5619174 C14.5716813,15.8660457 14.2592339,17.1565894 14.2592339,18.4335484 C14.2592339,20.0637088 14.6124354,21.3067061 15.3188382,22.1625403 C16.0252411,23.0183745 16.9897526,23.4870457 18.212373,23.5685537 C19.4893319,21.3950065 20.5896902,18.5286411 21.5134478,14.9694575 Z" id="Shape"></path>
                <path d="M28.8084157,20.5120029 C29.4061412,20.5120029 29.888397,20.5935109 30.255183,20.756527 C30.6219691,20.919543 30.8053622,21.1233131 30.8053622,21.3678371 C30.8053622,21.6666999 30.7306465,22.0063166 30.5812151,22.3866874 C30.4317838,22.7670581 30.2891447,23.0795056 30.153298,23.3240296 C30.0989593,23.3783683 30.031036,23.3851606 29.949528,23.3444066 C29.8680199,23.3036526 29.8272659,23.2289369 29.8272659,23.1202596 C29.908774,22.9300742 29.949528,22.6583808 29.949528,22.3051794 C29.949528,21.9248086 29.8476429,21.6123612 29.6438729,21.3678371 C29.4401028,21.1233131 29.1616171,21.001051 28.8084157,21.001051 C28.3465369,21.001051 27.9729585,21.1436901 27.6876804,21.4289681 C27.4024023,21.7142462 27.2597633,22.114994 27.2597633,22.6312114 C27.2597633,23.0659209 27.375233,23.4802533 27.6061724,23.8742088 C27.8371118,24.2681642 28.0952205,24.6621196 28.3804986,25.0560751 C28.6657766,25.4500305 28.9306777,25.8711553 29.1752018,26.3194494 C29.4197258,26.7677435 29.5419879,27.2771686 29.5419879,27.8477248 C29.5419879,28.825821 29.1480324,29.5865626 28.3601216,30.1299494 C27.5722107,30.6733362 26.5397758,30.9450296 25.2628168,30.9450296 C24.3390592,30.9450296 23.6122793,30.7955982 23.0824772,30.4967355 C22.5526751,30.1978727 22.287774,29.8718406 22.287774,29.5186392 C22.287774,29.4099618 22.328528,29.2605305 22.410036,29.0703451 C22.491544,28.8801597 22.6002214,28.6763897 22.7360681,28.4590349 C22.8719148,28.2416802 23.0213462,28.0243255 23.1843622,27.8069708 C23.3473783,27.589616 23.523979,27.4130153 23.7141644,27.2771686 C23.7956724,27.22283 23.8703881,27.2364146 23.9383114,27.3179226 C24.0062348,27.3994307 24.0130271,27.4809387 23.9586884,27.5624467 C23.7956724,27.7254627 23.6734104,27.8952711 23.5919023,28.0718718 C23.5103943,28.2484725 23.4696403,28.4862043 23.4696403,28.785067 C23.4696403,29.2741151 23.6326563,29.6748629 23.9586884,29.9873103 C24.2847205,30.2997577 24.7058453,30.4559815 25.2220628,30.4559815 C25.9284656,30.4559815 26.4786447,30.2590037 26.8726002,29.8650483 C27.2665556,29.4710929 27.4635333,28.9888371 27.4635333,28.4182809 C27.4635333,27.9020635 27.3480636,27.4198077 27.1171242,26.9715136 C26.8861848,26.5232194 26.6348684,26.08851 26.363175,25.6673852 C26.0914816,25.2462604 25.8401652,24.8183433 25.6092259,24.3836339 C25.3782865,23.9489244 25.2628168,23.4870457 25.2628168,22.9979975 C25.2628168,22.2915947 25.5616795,21.7006615 26.159405,21.2251981 C26.7571305,20.7497346 27.640134,20.5120029 28.8084157,20.5120029 Z" id="Path"></path>
                <path d="M49.552207,0.664799796 C49.9597471,0.664799796 50.2925715,0.766684822 50.5506803,0.970454874 C50.808789,1.17422493 50.9853897,1.44591833 51.0804824,1.78553508 C51.1755751,2.12515184 51.1891598,2.51231494 51.1212364,2.94702438 C51.0533131,3.38173383 50.8970893,3.81644327 50.6525653,4.25115272 C50.5982266,4.3054914 50.5303033,4.3054914 50.4487952,4.25115272 C50.3672872,4.19681404 50.3129485,4.12889069 50.2857792,4.04738266 C50.3401179,3.72135058 50.2246482,3.44965718 49.9393701,3.23230246 C49.654092,3.01494773 49.2125902,2.90627037 48.6148648,2.90627037 C47.5009218,2.90627037 46.3801865,3.32060281 45.2526589,4.14926769 C44.1251313,4.97793257 43.0315653,6.07149852 41.9719611,7.42996553 C40.9123568,8.78843255 39.9206759,10.3506696 38.9969183,12.1166767 C38.0731607,13.8826839 37.2716652,15.7030297 36.5924317,17.5777141 C35.9131982,19.4523986 35.3766037,21.3134984 34.9826483,23.1610136 C34.5886928,25.0085287 34.3917151,26.6930278 34.3917151,28.2145109 C34.3917151,29.0295911 34.6226545,29.4371312 35.0845333,29.4371312 C35.4105654,29.4371312 35.7298051,29.3012845 36.0422525,29.0295911 C36.3546999,28.7578977 36.7146937,28.3503576 37.1222338,27.8069708 C37.2037418,27.7526321 37.2784575,27.7594244 37.3463809,27.8273478 C37.4143042,27.8952711 37.4346812,27.9835715 37.4075119,28.0922488 C36.8641251,28.9073291 36.2256456,29.5865626 35.4920734,30.1299494 C34.7585012,30.6733362 34.0928524,30.9450296 33.4951269,30.9450296 C32.9789094,30.9450296 32.6189157,30.7955982 32.4151456,30.4967355 C32.2113755,30.1978727 32.1094905,29.817502 32.1094905,29.3556232 C32.1094905,28.0786642 32.3811839,26.4824654 32.9245707,24.5670269 C33.4679575,22.6515884 34.1947374,20.6274726 35.1049103,18.4946794 C36.0150832,16.3618862 37.0678951,14.2358853 38.2633461,12.1166767 C39.4587971,9.99746819 40.7017944,8.08882204 41.9923381,6.39073827 C43.2828817,4.6926545 44.5802177,3.31381048 45.8843461,2.2542062 C47.1884744,1.19460193 48.4110947,0.664799796 49.552207,0.664799796 Z" id="Path"></path>
                <path d="M49.389191,28.3775269 C49.4435296,28.3231882 49.511453,28.3231882 49.592961,28.3775269 C49.674469,28.4318656 49.7016384,28.5133736 49.674469,28.622051 C49.1854209,29.3284538 48.6420341,29.8922176 48.0443086,30.3133424 C47.4465831,30.7344672 46.876027,30.9450296 46.3326402,30.9450296 C45.7077453,30.9450296 45.3069976,30.5035278 45.1303969,29.6205242 C44.9537962,28.7375207 45.0420965,27.6847087 45.3952979,26.4620884 C44.6617257,27.6303701 43.8670225,28.6288433 43.0111883,29.4575082 C42.1553541,30.2861731 41.2519735,30.7820135 40.3010466,30.9450296 C39.6489825,30.9450296 39.1463497,30.6461668 38.7931482,30.0484413 C38.4399468,29.4507159 38.2633461,28.7578977 38.2633461,27.9699868 C38.2633461,27.0733986 38.4807008,26.1836027 38.9154103,25.3005991 C39.3501197,24.4175956 39.9274682,23.6228924 40.6474557,22.9164895 C41.3674432,22.2100867 42.1689388,21.6327382 43.0519423,21.1844441 C43.9349459,20.73615 44.8247418,20.5120029 45.72133,20.5120029 C46.6722569,20.5120029 47.4194138,20.7429423 47.9628006,21.2048211 C48.234494,21.0146357 48.5809031,20.8516196 49.0020279,20.7157729 C49.4231526,20.5799262 49.7967311,20.5120029 50.1227631,20.5120029 C50.2314405,20.5120029 50.2857792,20.5799262 50.2857792,20.7157729 C49.6608844,21.4765145 49.1242899,22.3119717 48.6759958,23.2221446 C48.2277017,24.1323175 47.8812926,25.0017364 47.6367685,25.8304013 C47.3922444,26.6590661 47.2428131,27.3994307 47.1884744,28.0514948 C47.1341357,28.703559 47.1884744,29.1518531 47.3514904,29.3963772 C47.4873371,29.5593932 47.7182765,29.6069396 48.0443086,29.5390162 C48.3703407,29.4710929 48.8186348,29.0839298 49.389191,28.3775269 Z M41.564421,29.4371312 C41.890453,29.4371312 42.2912008,29.2333611 42.7666643,28.825821 C43.2421277,28.4182809 43.7379682,27.8748941 44.2541856,27.1956606 C44.7704031,26.5164271 45.2798282,25.7556856 45.782461,24.913436 C46.2850938,24.0711865 46.7265956,23.2153523 47.1069664,22.3459334 C46.998289,21.9927319 46.7469726,21.7074539 46.3530172,21.4900991 C45.9590617,21.2727444 45.5039753,21.1640671 44.9877578,21.1640671 C44.362863,21.1640671 43.7787222,21.3202908 43.2353354,21.6327382 C42.6919486,21.9451856 42.2232775,22.379895 41.829322,22.9368665 C41.4353666,23.493838 41.1229192,24.1594868 40.8919798,24.933813 C40.6610404,25.7081392 40.5455707,26.5571811 40.5455707,27.4809387 C40.5455707,28.0786642 40.6474557,28.5541276 40.8512258,28.9073291 C41.0549958,29.2605305 41.2927275,29.4371312 41.564421,29.4371312 Z" id="Shape"></path>
                <path d="M63.1232925,28.0922488 C63.1776312,28.0379102 63.2455545,28.0447025 63.3270625,28.1126258 C63.4085706,28.1805492 63.4357399,28.2688496 63.4085706,28.3775269 C62.9195224,29.0567604 62.3557586,29.6544859 61.7172791,30.1707034 C61.0787996,30.6869208 60.4471125,30.9450296 59.8222176,30.9450296 C59.3603389,30.9450296 59.0003451,30.7955982 58.7422364,30.4967355 C58.4841276,30.1978727 58.3550733,29.8039173 58.3550733,29.3148692 C58.3550733,28.3639422 58.5248816,27.3315073 58.8644984,26.2175644 C59.2041151,25.1036214 59.6592016,23.9760938 60.2297577,22.8349815 C60.3112658,22.6447961 60.3520198,22.4410261 60.3520198,22.2236713 C60.3520198,21.9519779 60.2297577,21.8161312 59.9852337,21.8161312 C58.9799681,21.8161312 57.8660251,22.5021571 56.6434048,23.8742088 C55.4207845,25.2462604 54.2932569,27.4266 53.260822,30.4152274 C53.2336526,30.4967355 53.1453523,30.5714511 52.9959209,30.6393745 C52.8464895,30.7072978 52.6766811,30.7616365 52.4864958,30.8023905 C52.2963104,30.8431445 52.106125,30.8771062 51.9159396,30.9042756 C51.7257542,30.9314449 51.5763229,30.9450296 51.4676455,30.9450296 C51.3317988,30.9450296 51.2299138,30.9178602 51.1619904,30.8635216 C51.0940671,30.8091829 51.0872747,30.7140902 51.1416134,30.5782435 C51.6034922,29.4099618 52.0721633,28.1262105 52.5476268,26.7269895 C53.0230902,25.3277685 53.4374227,23.9217551 53.7906241,22.5089494 C53.8721321,22.237256 53.8857168,22.0402783 53.8313781,21.9180163 C53.7770394,21.7957542 53.6819467,21.7346232 53.5461,21.7346232 C53.2472373,21.7346232 52.9619592,21.8636776 52.6902658,22.1217863 C52.4185724,22.379895 52.1740483,22.6583808 51.9566936,22.9572435 C51.8751856,23.0115822 51.8004699,22.9979975 51.7325466,22.9164895 C51.6646232,22.8349815 51.6442462,22.7534735 51.6714155,22.6719655 C51.8072622,22.4817801 51.9906553,22.2644253 52.2215947,22.0199013 C52.4525341,21.7753772 52.7174351,21.5376455 53.0162979,21.3067061 C53.3151606,21.0757667 53.627608,20.8855813 53.9536401,20.73615 C54.2796722,20.5867186 54.6057043,20.5120029 54.9317364,20.5120029 C55.3936152,20.5120029 55.6992702,20.6546419 55.8487016,20.93992 C55.998133,21.2251981 56.0320947,21.5716072 55.9505866,21.9791473 C55.8147399,22.5768728 55.6721009,23.1406366 55.5226695,23.6704387 C55.3732382,24.2002408 55.1898451,24.791174 54.9724904,25.4432382 C55.2985225,24.8455127 55.6992702,24.2545795 56.1747337,23.6704387 C56.6501972,23.0862979 57.1799993,22.5564958 57.7641401,22.0810323 C58.3482809,21.6055688 58.9799681,21.2251981 59.6592016,20.93992 C60.3384351,20.6546419 61.0584226,20.5120029 61.8191642,20.5120029 C62.1451962,20.5120029 62.3965126,20.5935109 62.5731133,20.756527 C62.7497141,20.919543 62.8380144,21.1097284 62.8380144,21.3270831 C62.8380144,21.7074539 62.7429217,22.0470706 62.5527363,22.3459334 C61.9821802,23.3783683 61.4999244,24.4447649 61.105969,25.5451232 C60.7120135,26.6454815 60.5150358,27.6303701 60.5150358,28.4997889 C60.5150358,29.2061918 60.7459752,29.5593932 61.207854,29.5593932 C61.5067167,29.5593932 61.8055795,29.4371312 62.1044422,29.1926071 C62.403305,28.9480831 62.7429217,28.581297 63.1232925,28.0922488 Z" id="Path"></path>
                <path d="M88.635303,0.13499766 C89.0428431,0.13499766 89.3756676,0.243675021 89.6337763,0.461029743 C89.891885,0.678384466 90.0752781,0.963662539 90.1839554,1.31686396 C90.2926328,1.67006539 90.3198021,2.07081316 90.2654635,2.51910727 C90.2111248,2.96740139 90.0752781,3.40890317 89.8579234,3.84361261 C89.8035847,3.89795129 89.7356613,3.9183283 89.6541533,3.90474363 C89.5726453,3.89115896 89.5183066,3.83002794 89.4911373,3.72135058 C89.5454759,3.31381048 89.4367986,3.0081554 89.1651052,2.80438535 C88.8934118,2.60061529 88.513041,2.49873027 88.0239929,2.49873027 C86.5568485,2.49873027 85.1440428,2.98777839 83.7855758,3.96587464 C82.4271088,4.9439709 81.1433575,6.44507695 79.9343218,8.4691928 C78.7252862,10.4933087 77.6113432,13.0608113 76.592493,16.1717008 C75.5736427,19.2825902 74.6566775,22.9844129 73.8415972,27.2771686 C73.7057505,27.8748941 73.6921659,28.3843193 73.8008432,28.805444 C73.9095206,29.2265688 74.1132906,29.4371312 74.4121534,29.4371312 C74.7110161,29.4371312 74.9962942,29.3148692 75.2679876,29.0703451 C75.539681,28.825821 75.7842051,28.5133736 76.0015598,28.1330029 C76.0558985,28.0786642 76.1306142,28.0786642 76.2257069,28.1330029 C76.3207995,28.1873415 76.3547612,28.2688496 76.3275919,28.3775269 C76.1917452,28.6492203 75.9947675,28.9344984 75.7366587,29.2333611 C75.47855,29.5322239 75.1932719,29.8107096 74.8808245,30.0688184 C74.5683771,30.3269271 74.242345,30.5374895 73.9027283,30.7005055 C73.5631115,30.8635216 73.2574564,30.9450296 72.985763,30.9450296 C72.3880375,30.9450296 71.9669128,30.7276749 71.7223887,30.2929654 C71.4778646,29.858256 71.3827719,29.3692078 71.4371106,28.825821 C71.4914493,28.3639422 71.5593727,27.9292328 71.6408807,27.5216927 C71.7223887,27.1141526 71.8174814,26.6794431 71.9261588,26.2175644 C71.3827719,27.385846 70.6220304,28.3979039 69.6439342,29.2537381 C68.6658379,30.1095724 67.7013263,30.6733362 66.7503994,30.9450296 C66.1255046,30.9450296 65.6228718,30.7140902 65.242501,30.2522114 C64.8621303,29.7903326 64.6719449,29.1926071 64.6719449,28.4590349 C64.6719449,27.3994307 64.8621303,26.3873727 65.242501,25.4228612 C65.6228718,24.4583496 66.1390893,23.6093077 66.7911534,22.8757355 C67.4432176,22.1421633 68.2175438,21.5580225 69.114132,21.1233131 C70.0107203,20.6886036 70.9752318,20.4712489 72.0076668,20.4712489 C72.5782229,20.4712489 73.0808557,20.5663416 73.5155652,20.756527 C74.0046133,19.2893826 74.5887541,17.7611072 75.2679876,16.1717008 C75.9472211,14.5822944 76.694378,13.0268496 77.5094582,11.5053666 C78.3245384,9.98388352 79.187165,8.53032382 80.0973379,7.14468746 C81.0075108,5.7590511 81.9380607,4.55001546 82.8889876,3.51758053 C83.8399145,2.4851456 84.8044261,1.66327305 85.7825223,1.0519629 C86.7606186,0.440652738 87.7115455,0.13499766 88.635303,0.13499766 Z M68.0545278,29.3556232 C68.3533905,29.3556232 68.7065919,29.1993995 69.114132,28.886952 C69.5216721,28.5745046 69.9427969,28.1533799 70.3775064,27.6235777 C70.8122158,27.0937756 71.2197559,26.4824654 71.6001267,25.7896473 C71.9804974,25.0968291 72.3065295,24.3564645 72.5782229,23.5685537 C72.6869003,23.3240296 72.781993,23.0727132 72.863501,22.8146045 C72.945009,22.5564958 73.0129324,22.3051794 73.067271,22.0606553 C72.9585937,21.7346232 72.7480313,21.4968915 72.4355839,21.3474601 C72.1231365,21.1980287 71.7767274,21.1233131 71.3963566,21.1233131 C70.8258005,21.1233131 70.268829,21.2931214 69.7254422,21.6327382 C69.1820554,21.9723549 68.7065919,22.4410261 68.2990518,23.0387515 C67.8915117,23.636477 67.5586873,24.3428799 67.3005786,25.1579601 C67.0424698,25.9730403 66.9134155,26.8696285 66.9134155,27.8477248 C66.9134155,28.2824342 67.0153005,28.642428 67.2190705,28.9277061 C67.4228406,29.2129841 67.7013263,29.3556232 68.0545278,29.3556232 Z" id="Shape"></path>
            </g>
            <g id="logo--lives" transform="translate(11.603401, 34.458272)">
                <path d="M11.2570218,10.9908472 C10.7272197,12.2542215 10.2925102,13.1576021 9.95289349,13.7009889 C9.77629278,13.9590976 9.5657304,14.088152 9.32120633,14.088152 C5.0556199,14.0202286 2.06699247,14.0134363 0.355324029,14.067775 C0.192307987,14.0949443 0.0972152958,14.0338133 0.0700459555,13.8843819 C0.029291945,13.8164586 0.0224996099,13.7179697 0.0496689503,13.5889154 C0.0768382906,13.459861 0.131176971,13.3817491 0.212684992,13.3545798 C0.226269662,13.3545798 0.253439003,13.3477875 0.294193013,13.3342028 C0.334947024,13.3206181 0.362116364,13.3138258 0.375701034,13.3138258 C0.389285704,13.3138258 0.416455045,13.3138258 0.457209055,13.3138258 C1.44888998,13.3138258 1.99227678,13.0896787 2.08736947,12.6413846 C2.11453881,12.3425219 2.12812348,11.8602661 2.12812348,11.1946173 L2.12812348,2.8196681 C2.12812348,2.27628129 2.01944612,1.90609903 1.8020914,1.70912131 C1.58473668,1.5121436 1.17040424,1.41365474 0.559094081,1.41365474 L0.314570018,1.41365474 C0.219477327,1.40007007 0.165138647,1.31856205 0.151553976,1.16913068 C0.137969306,1.0196993 0.158346312,0.911021942 0.212684992,0.843098592 C0.267023673,0.73442123 0.368908699,0.700459555 0.518340071,0.741213565 C1.95831511,0.768382906 3.90092294,0.761590571 6.34616357,0.72083656 C6.50917961,0.72083656 6.6042723,0.781967576 6.63144164,0.904229607 C6.72653433,1.25743103 6.63823398,1.44082408 6.36654057,1.45440875 C6.09484717,1.48157809 5.87749245,1.49516276 5.71447641,1.49516276 C4.94015021,1.5223321 4.47827142,1.58346312 4.32884005,1.67855581 C4.17940868,1.7736485 4.10469299,2.08609591 4.10469299,2.61589805 L4.10469299,11.9485664 C4.10469299,12.3696912 4.19299335,12.6583655 4.36959406,12.8145892 C4.54619477,12.9708129 4.84505752,13.0489247 5.26618229,13.0489247 L7.18162078,13.0489247 C7.98311632,13.0489247 8.5400878,12.9810014 8.85253521,12.8451547 C9.16498263,12.709308 9.55893806,12.3221449 10.0344015,11.6836654 L10.7475967,10.7463231 C10.9377821,10.6783998 11.0804211,10.6783998 11.1755138,10.7463231 C11.2841912,10.8006618 11.3113605,10.8821698 11.2570218,10.9908472 Z" id="Path"></path>
                <path d="M18.1852036,0.965360623 C18.2259576,1.2506387 18.1919959,1.39327773 18.0833186,1.39327773 C18.0561492,1.39327773 18.0119991,1.40007007 17.950868,1.41365474 C17.889737,1.42723941 17.8387945,1.43403174 17.7980405,1.43403174 C17.1731457,1.44761641 16.7825864,1.56648228 16.6263627,1.79062934 C16.470139,2.01477639 16.3920271,2.59552104 16.3920271,3.53286328 L16.3920271,11.9893205 C16.3920271,12.5191226 16.4871198,12.872324 16.6773052,13.0489247 C16.8674906,13.2255254 17.241069,13.3206181 17.7980405,13.3342028 C17.9474719,13.3342028 18.0493569,13.3409951 18.1036956,13.3545798 C18.1852036,13.4089185 18.23275,13.4938227 18.2463346,13.6092924 C18.2599193,13.7247621 18.2497308,13.8300433 18.2157691,13.925136 C18.1818074,14.0202286 18.1376573,14.067775 18.0833186,14.067775 C16.3988195,14.0134363 14.7143204,14.0134363 13.0298213,14.067775 C12.8668052,14.067775 12.7852972,13.96589 12.7852972,13.7621199 C12.7852972,13.5040112 12.8464282,13.3749568 12.9686903,13.3749568 C13.5935851,13.3206181 13.9807482,13.2153369 14.1301796,13.0591132 C14.2796109,12.9028895 14.3679113,12.5462919 14.3950806,11.9893205 L14.4154576,11.2761253 L14.4154576,3.53286328 L14.3950806,2.8196681 C14.381496,2.27628129 14.2999879,1.91628753 14.1505566,1.73968682 C14.0011252,1.56308611 13.6547161,1.44761641 13.1113293,1.39327773 C12.8668052,1.36610839 12.7920896,1.19630002 12.8871822,0.883852602 C12.9279363,0.788759911 13.023029,0.741213565 13.1724603,0.741213565 C13.226799,0.741213565 13.9060325,0.758194403 15.2101608,0.792156079 C16.5142892,0.826117754 17.3972927,0.809136916 17.8591715,0.741213565 C18.0629416,0.741213565 18.1716189,0.815929251 18.1852036,0.965360623 Z" id="Path"></path>
                <path d="M34.1607757,0.822721586 C34.2286991,0.904229607 34.2490761,1.01290697 34.2219067,1.14875367 C34.1947374,1.28460037 34.1336064,1.35931606 34.0385137,1.37290073 C33.4543729,1.3864854 33.0230596,1.52912443 32.7445739,1.80081784 C32.4660881,2.07251124 32.1570369,2.64306739 31.8174201,3.51248628 L27.7216421,14.108529 C27.6944727,14.1764524 27.6367379,14.2579604 27.5484375,14.3530531 C27.4601372,14.4481458 27.3888176,14.4956921 27.334479,14.4956921 C27.1171242,14.5364461 26.8726002,14.5296538 26.6009068,14.4753151 C26.4786447,14.4753151 26.3767597,14.3666377 26.2952517,14.149283 L21.9141956,3.2068312 C21.6017482,2.41892033 21.3402433,1.94006071 21.1296809,1.77025233 C20.9191185,1.60044395 20.4945975,1.50874743 19.856118,1.49516276 C19.733856,1.46799342 19.652348,1.41365474 19.611594,1.33214672 C19.57084,1.19630002 19.5776323,1.06045331 19.631971,0.924606613 C19.6591403,0.815929251 19.77461,0.761590571 19.9783801,0.761590571 C21.8123105,0.815929251 23.5919023,0.815929251 25.3171554,0.761590571 C25.5888488,0.761590571 25.7382802,0.781967576 25.7654496,0.822721586 C25.8741269,0.958568288 25.8877116,1.10799966 25.8062036,1.2710157 C25.7926189,1.33893905 25.7111109,1.4068624 25.5616795,1.47478575 C24.8552767,1.50195509 24.35604,1.56308611 24.0639696,1.6581788 C23.7718992,1.75327149 23.625864,1.9094952 23.625864,2.12684992 C23.625864,2.26269662 23.7413337,2.62948272 23.9722731,3.2272082 L27.1307089,11.0723552 C27.1442936,11.0995246 27.1680668,11.1334862 27.2020284,11.1742402 C27.2359901,11.2149943 27.2801403,11.2591444 27.334479,11.3066908 C27.3888176,11.3542371 27.4431563,11.3644256 27.497495,11.3372563 C27.5518337,11.3100869 27.59938,11.2421636 27.640134,11.1334862 L30.6151768,3.41060125 C30.8053622,2.90796846 30.9004549,2.50042835 30.9004549,2.18798094 C30.9004549,1.91628753 30.7849852,1.71591365 30.5540458,1.58685928 C30.3231064,1.45780492 29.888397,1.39327773 29.2499175,1.39327773 L29.0869014,1.39327773 C29.0053934,1.36610839 28.9510547,1.28799654 28.9238854,1.15894217 C28.896716,1.02988781 28.9035084,0.924606613 28.9442624,0.843098592 C28.9714317,0.788759911 29.0665244,0.761590571 29.2295404,0.761590571 C30.8189469,0.815929251 32.4015609,0.815929251 33.9773827,0.761590571 C34.0724754,0.761590571 34.1336064,0.781967576 34.1607757,0.822721586 Z" id="Path"></path>
                <path d="M46.4277329,10.7667001 C46.4277329,11.2014096 46.4073559,11.6123459 46.3666019,11.999509 C46.3258478,12.3866721 46.2816977,12.7602505 46.2341513,13.1202442 C46.186605,13.480238 46.1560395,13.6941966 46.1424548,13.7621199 C46.1152855,13.9523053 45.843592,14.047398 45.3273746,14.047398 C40.491232,14.047398 37.1765725,14.0541903 35.383396,14.067775 C35.2475493,14.0406056 35.1660413,13.9930593 35.138872,13.925136 C35.098118,13.8300433 35.0947218,13.7077812 35.1286835,13.5583499 C35.1626451,13.4089185 35.2271723,13.3274105 35.322265,13.3138258 C35.4173577,13.3002411 35.7094281,13.2934488 36.1984762,13.2934488 C36.8641251,13.2662795 37.2818537,13.1406213 37.4516621,12.9164742 C37.6214704,12.6923271 37.7063746,12.1455442 37.7063746,11.2761253 L37.7063746,3.53286328 C37.7063746,2.66344439 37.6214704,2.10307675 37.4516621,1.85176035 C37.2818537,1.60044395 36.8369557,1.47478575 36.1169682,1.47478575 L35.8418786,1.47478575 C35.807917,1.47478575 35.7807476,1.47138959 35.7603706,1.46459725 C35.7399936,1.45780492 35.7162204,1.44761641 35.6890511,1.43403174 C35.6618818,1.42044707 35.6347124,1.40007007 35.6075431,1.37290073 C35.5803737,1.34573139 35.5599967,1.31856205 35.5464121,1.29139271 C35.5056581,1.20988469 35.5328274,1.06724565 35.6279201,0.863475597 C35.6686741,0.795552246 35.7841438,0.761590571 35.9743292,0.761590571 C40.4165163,0.73442123 43.4458978,0.73442123 45.0624735,0.761590571 C45.3205822,0.761590571 45.4496366,0.829513921 45.4496366,0.965360623 C45.5039753,1.40007007 45.5413331,1.80081784 45.5617101,2.16760393 C45.5820871,2.53439003 45.5956718,2.86381828 45.6024642,3.15588869 C45.6092565,3.44795909 45.619445,3.64833298 45.6330297,3.75701034 C45.6058603,3.89285704 45.4428443,3.91323405 45.1439815,3.81814136 C45.0488888,3.80455669 45.0013425,3.729841 45.0013425,3.5939943 C44.8654958,2.76532942 44.6753104,2.24571579 44.4307864,2.0351534 C44.1862623,1.82459101 43.6428755,1.71251748 42.8006259,1.69893281 C41.4964976,1.6581788 40.5863247,1.65138647 40.0701072,1.67855581 C39.9885992,1.67855581 39.903695,1.73289449 39.8153947,1.84157185 C39.7270943,1.95024921 39.6829441,2.0453419 39.6829441,2.12684992 L39.6829441,6.24300498 C39.6829441,6.35168234 39.7135096,6.4501712 39.7746407,6.53847155 C39.8357717,6.62677191 39.9002989,6.67092209 39.9682222,6.67092209 L42.3727088,6.67092209 C43.1742044,6.67092209 43.6632525,6.60299874 43.8398532,6.46715204 C44.0164539,6.33130534 44.1523006,5.89659589 44.2473933,5.1630237 C44.2745626,5.06793101 44.423994,5.03396934 44.6956874,5.06113868 C44.7636108,5.07472335 44.8179495,5.17660837 44.8587035,5.36679375 C44.8858728,6.03244259 44.8790805,7.24147824 44.8383265,8.99390069 C44.8383265,9.1705014 44.7568184,9.26559409 44.5938024,9.27917876 C44.362863,9.3063481 44.240601,9.27238642 44.2270163,9.17729373 C44.1183389,8.47089088 43.9723037,8.04636994 43.7889107,7.90373091 C43.6055176,7.76109187 43.1130733,7.68298002 42.3115778,7.66939535 L39.9682222,7.64901834 C39.7780368,7.70335702 39.6829441,7.81203438 39.6829441,7.97505042 L39.6829441,11.3983873 C39.6829441,12.1862982 39.7542637,12.6583655 39.8969027,12.8145892 C40.0395417,12.9708129 40.4776473,13.0489247 41.2112195,13.0489247 L42.8413799,13.0489247 C43.6021215,13.0489247 44.1149428,13.0183592 44.3798438,12.9572282 C44.6447449,12.8960972 44.8654958,12.7636467 45.0420965,12.5598766 C45.3681286,12.1659212 45.619445,11.615742 45.7960457,10.9093392 C45.823215,10.7870771 45.8911384,10.7123615 45.9998158,10.6851921 C46.2443398,10.6580228 46.3869789,10.6851921 46.4277329,10.7667001 Z" id="Path"></path>
                <path d="M56.5958585,10.6648151 C56.5958585,11.7515887 56.2086954,12.6447808 55.4343692,13.3443913 C54.660043,14.0440018 53.6479851,14.3938071 52.3981954,14.3938071 C51.9499013,14.3938071 51.2434984,14.251168 50.2789869,13.96589 C49.9393701,13.8707973 49.7356,13.8232509 49.6676767,13.8232509 C49.5589993,13.8232509 49.4571143,13.8979666 49.3620216,14.047398 C49.2125902,14.1153213 49.0359895,14.1153213 48.8322195,14.047398 C48.6692034,13.4904265 48.5197721,12.3900682 48.3839254,10.7463231 C48.3839254,10.6783998 48.4246794,10.6308534 48.5061874,10.6036841 C48.5876954,10.5765148 48.6793919,10.5663263 48.781277,10.5731186 C48.883162,10.5799109 48.9476892,10.6036841 48.9748585,10.6444381 C49.1786286,11.2693329 49.389191,11.7515887 49.6065457,12.0912055 C49.8239004,12.4308222 50.1227631,12.729685 50.5031339,12.9877937 C51.0736901,13.3817491 51.6442462,13.5787269 52.2148024,13.5787269 C52.9891286,13.5787269 53.6106272,13.3613721 54.0792983,12.9266627 C54.5479695,12.4919533 54.782305,11.9417741 54.782305,11.2761253 C54.782305,11.0859399 54.7653242,10.905943 54.7313625,10.7361346 C54.6974008,10.5663263 54.6294775,10.3931217 54.5275924,10.216521 C54.4257074,10.0399203 54.3374071,9.89048892 54.2626914,9.76822688 C54.1879757,9.64596485 54.0589213,9.49992965 53.8755283,9.33012127 C53.6921352,9.1603129 53.5596847,9.0346547 53.4781767,8.95314668 C53.3966687,8.87163865 53.2370488,8.74937662 52.9993171,8.58636058 C52.7615853,8.42334454 52.612154,8.31806335 52.5510229,8.270517 C52.4898919,8.22297065 52.330272,8.11429329 52.0721633,7.94448492 C51.8140546,7.77467654 51.6714155,7.68298002 51.6442462,7.66939535 C51.1551981,7.34336326 50.7646388,7.06827369 50.4725684,6.84412663 C50.180498,6.61997958 49.8578621,6.3347015 49.5046607,5.98829241 C49.1514592,5.64188332 48.8933505,5.27170106 48.7303345,4.87774563 C48.5673184,4.48379019 48.4858104,4.05587308 48.4858104,3.5939943 C48.4858104,2.65665206 48.8186348,1.89251436 49.4842837,1.30158121 C50.1499325,0.710648058 51.0261437,0.415181482 52.1129173,0.415181482 C52.5476268,0.415181482 53.1113906,0.530651178 53.8042088,0.761590571 C54.1845795,0.883852602 54.4358959,0.944983618 54.558158,0.944983618 C54.639666,0.944983618 54.7483433,0.883852602 54.88419,0.761590571 C55.0607908,0.70725189 55.2170145,0.70725189 55.3528612,0.761590571 C55.4343692,0.965360623 55.5634235,1.88911819 55.7400243,3.53286328 C55.7264396,3.66870998 55.6381392,3.73663334 55.4751232,3.73663334 C55.3121071,3.73663334 55.2170145,3.70267166 55.1898451,3.63474831 C54.537781,1.97741855 53.5732694,1.14875367 52.2963104,1.14875367 C51.6578309,1.14875367 51.1619904,1.31856205 50.808789,1.6581788 C50.4555876,1.99779555 50.2789869,2.44608967 50.2789869,3.00306115 C50.2789869,3.66870998 50.66615,4.34115116 51.4404762,5.02038466 C51.7665082,5.31924741 52.2793295,5.70641051 52.97894,6.18187396 C53.6785506,6.65733742 54.2626914,7.06827369 54.7313625,7.41468278 C55.2000336,7.76109187 55.6279507,8.22636682 56.0151138,8.81050764 C56.4022769,9.39464846 56.5958585,10.0127509 56.5958585,10.6648151 Z" id="Path"></path>
            </g>
        </g>
    </g>
</svg>
      </figure>
    </div>

    <div class="block--lp-search">
      <?php print render($simpleSearch['content']); ?>

        <?php print render($searchOptions['content']); ?>

    </div>

  </div>
</div>
<article <?php print $id_node . $classes .  $attributes; ?> role="article">
  <div class="content">
    <?php print render($content);?>
  </div>
</article>
