<?php
/*
Template Name: ds_import
description: display Faq pages
autor: draftspot
*/
?>
<?php
get_header();
?>
<?php
    define( 'FRCP_FILE_ORDER', get_template_directory_uri().'/export/orders.xml');
    define( 'FRCP_HASH', 'f5ec909ae387abdc528eda4dea62fa7d');


    function fr_create_orders(){
        $response=wp_remote_get(FRCP_FILE_ORDER,array(
            'timeout'     => 920,
        ));
        //var_dump($response);
        $res=$response['body'];
        $xml=simplexml_load_string($res) or die("Error: Cannot create object");
        $i=0;
        $vars=json_decode(json_encode($xml),true);
        $totalArr=[];

        $items=[];
        //var_dump($vars['ORDER']);
        foreach($vars['ORDER'] as $item){
            $resArr=[];

            if($i<100){
                $order_id=$item['ORDER_ID'];
                $products=$item['ORDER_ITEMS']['ITEM'];
                //var_dump($products).'<br>';
                foreach($products as $p){
                   if($p['SUPPLIER']=='STOKLASA'){
                    $code=$p['CODE'];
                    $codeArr=explode('/',$code);
                    $totalArr[$order_id][$codeArr[0]]=array(
                        "variant_id"=> $codeArr[3],
                        "package_id"=> $codeArr[2],
                        "quantity"=> $p['AMOUNT']
                    );
                    $obj=(object) [
                        'code' => $codeArr[0],
                        'variant_id' => $codeArr[3],
                        'package_id' => $codeArr[2],
                        'quantity' => $p['AMOUNT']
                    ];
                    $items[]=$obj;
                   }
                }
            }
            $i++;
        }
        $data = (object) [
            'user_hash' => FRCP_HASH,
            'items' => $items
        ];
        $ch = curl_init('https://api.stoklasa.cz/cart/add');

        $options = [
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_RETURNTRANSFER => true,
        ];

        curl_setopt_array($ch, $options);

        $result = curl_exec($ch);
        var_dump($result);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($responseCode !== 200) {
            $response = json_decode($result);
            var_dump($response);
        }

        echo $i;
    }
    fr_create_orders();

    function fr_check_var($vars){
        $vars=json_decode(json_encode($vars),true);
        $resArr=[];
        if(!isset($vars['baleni'][0]['varianty'])){
            echo count($vars['baleni']['varianty']).'*';
        }else{

            foreach($vars['baleni'] as $v){
                if(!isset($v['varianty']['varianta'][0]['stav'])){
                    $var=$v['varianty']['varianta'];
                    $resArr[$var['id_varianty']]=$var;
                }else{
                    $var=$v['varianty']['varianta'];
                    if(!is_array($var)){$var=array($var);}
                    foreach($var as $item2){
                        $resArr[$item2['id_varianty']]=$item2;
                    }
                }
            }
            echo count($resArr);
        }

    }
    function fr_get_cats($cats){
        $res='<CATEGORY>';
        $res.='Galanterie > ';
        $res.=str_replace('|','&gt;',$cats);
        $res.='</CATEGORY>';
        return $res;
    }
    function fr_get_vars($vars,$stock){
        $vars=json_decode(json_encode($vars),true);
        $resArr=[];
        $feed='';
        if(!isset($vars['baleni'][0]['varianty'])){
            $price=number_format(floatval($vars['baleni']['cena']), 2, '.','');
            $priceVAT=number_format(floatval($vars['baleni']['cenasdph']), 2, '.','');
            if(!isset($vars['baleni']['varianty']['varianta'][0]['id_varianty'])){
                $var=$vars['baleni']['varianty']['varianta'];
                $resArr[$var['id_varianty']]=$var;
                $resArr[$var['id_varianty']]['price']=$price;
                $resArr[$var['id_varianty']]['priceVat']=$priceVAT;
            }else{
                $var=$vars['baleni']['varianty']['varianta'];
                foreach($var as $item){
                    $resArr[$item['id_varianty']]=$item;
                    $resArr[$item['id_varianty']]['price']=$price;
                    $resArr[$item['id_varianty']]['priceVat']=$priceVAT;
                }
            }
        }else{

            $price=number_format(floatval($vars['baleni'][0]['cena']), 2, '.','');
            $priceVAT=number_format(floatval($vars['baleni'][0]['cenasdph']), 2, '.','');
            var_dump($vars['baleni']);
            foreach($vars['baleni'] as $v){
                if(!isset($v['varianty']['varianta'][0]['id_varianty'])){
                    $var=$v['varianty']['varianta'];
                    $resArr[$var['id_varianty']]=$var;
                    $resArr[$var['id_varianty']]['price']=$price;
                    $resArr[$var['id_varianty']]['priceVat']=$priceVAT;
                }else{
                    $var=$v['varianty']['varianta'];
                    foreach($var as $item){
                        $resArr[$item['id_varianty']]=$item;
                        $resArr[$item['id_varianty']]['price']=$price;
                        $resArr[$item['id_varianty']]['priceVat']=$priceVAT;
                    }
                }
            }
        }
        /*if(isset($vars['baleni'][0]['cena'])){
            $price=number_format(floatval($vars['baleni'][0]['cena']), 2, '.','');
            $priceVAT=number_format(floatval($vars['baleni'][0]['cenasdph']), 2, '.','');

            foreach($vars['baleni'] as $v){
                var_dump($v['varianty']['varianta']);
                if(count($v['varianty']['varianta'])==1){
                    $var=$v['varianty']['varianta'];
                    $resArr[$var['id_varianty']]=$var;
                    $resArr[$var['id_varianty']]['price']=$price;
                    $resArr[$var['id_varianty']]['priceVat']=$priceVAT;
                }else{
                    $var=$v['varianty']['varianta'];
                    foreach($var as $item){
                        $resArr[$item['id_varianty']]=$item;
                        $resArr[$item['id_varianty']]['price']=$price;
                        $resArr[$item['id_varianty']]['priceVat']=$priceVAT;
                    }
                }
            }
        }else{
            $price=number_format(floatval($vars['baleni']['cena']), 2, '.','');
            $priceVAT=number_format(floatval($vars['baleni']['cenasdph']), 2, '.','');
            if(count($vars['baleni']['varianty'])==1){
                $var=$vars['baleni']['varianty']['varianta'];
                $resArr[$var['id_varianty']]=$var;
                $resArr[$var['id_varianty']]['price']=$price;
                $resArr[$var['id_varianty']]['priceVat']=$priceVAT;
            }else{
                $var=$vars['baleni']['varianty']['varianta'];
                foreach($var as $item){
                    $resArr[$item['id_varianty']]=$item;
                    $resArr[$item['id_varianty']]['price']=$price;
                    $resArr[$item['id_varianty']]['priceVat']=$priceVAT;
                }
            }
        }*/


        //var_dump($resArr);
        foreach($resArr as $key=>$val){
            $feed.='<VARIANT id="'.$key.'">';
            $feed.='<FREE_SHIPPING>0</FREE_SHIPPING>';
            $feed.='<FREE_BILLING>0</FREE_BILLING>';
            $feed.='<UNIT>ks</UNIT>';
            $feed.='<CODE>'.$val['ean'].'</CODE>';
            //$feed.='<LOGISTIC>0</LOGISTIC>';
            $feed.='<CURRENCY>CZK</CURRENCY>';
            $feed.='<VAT>21</VAT>';
            $feed.='<PRICE_VAT>'.$priceVAT.'</PRICE_VAT>';
            $feed.='<PURCHASE_PRICE></PURCHASE_PRICE>';
            $feed.='<STANDARD_PRICE>'.$price.'</STANDARD_PRICE>';
            $feed.='<STOCK><AMOUNT>'.$stock.'</AMOUNT></STOCK>';
            $feed.='<AVAILABILITY_OUT_OF_STOCK>Skladem</AVAILABILITY_OUT_OF_STOCK>';
            $feed.='<AVAILABILITY_IN_STOCK>Skladem</AVAILABILITY_IN_STOCK>';
            $feed.='<IMAGE_REF>'.$val['fotkavarianty'].'</IMAGE_REF>';
            $feed.='<PARAMETERS>';
            if(0/*isset($val['barva'])*/){
                $feed.='<PARAMETER>';
                $feed.='<NAME>Barva</NAME>';
                $feed.='<VALUE>'.$val['barva'].'</VALUE>';
                $feed.='</PARAMETER>';
            }else{
                $feed.='<PARAMETER>';
                $feed.='<NAME>Vlastnost</NAME>';
                $feed.='<VALUE>'.$val['nazevvarianty'].'</VALUE>';
                $feed.='</PARAMETER>';
            }
            $feed.='</PARAMETERS>';
            $feed.='</VARIANT>';
        }

        return $feed;
    }


?>
<section class="ds_page_header">
	<div class="container">
		<?php the_title( '<h1 class="ds_page_title">', '</h1>' );?>
	</div>
</section>




<?php
get_footer();
?>
