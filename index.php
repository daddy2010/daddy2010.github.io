<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php 
        echo "Hello!";
        /*
        require_once 'vendor/autoload.php';
        require_once 'Classes/PHPExcel.php';
        //use Classes\PHPExcel;
        use GuzzleHttp\Client;
        use ElectroLinux\phpQuery;
        use Psr\Http\Message\ResponseInterface;
        use GuzzleHttp\Exception\RequestException;
        use GuzzleHttp\Exception\ClientException;
        ini_set('max_execution_time', 0);
        
        $client = new Client();
        
        $result = array();
        
        try{
            $url = $client->request('GET','https://coinmarketcap.com/all/views/all/');
            //$url = $client->request('GET','https://web.archive.org/web/20170820005425/https://coinmarketcap.com/all/views/all/');
           }
        catch (GuzzleHttp\Exception\ClientException $e){echo $e;}
        catch (RequestException $e){echo $e;}
        $body = $url->getBody();
        $document = \phpQuery::newDocumentHTML($body,'UTF8');
        $data = pq($document)->find('tr:gt(0)'); //6 2url
       foreach($data as $res){
            $ids = $q = pq($res)->find('td:eq(0)')->text();
            $names = $q = pq($res)->find('td:eq(1)')->text();
            $marketCaps = $q = pq($res)->find('td:eq(3)')->text();
            $prices = $q = pq($res)->find('td:eq(4)')->text();
            $circulatingSupplys = $q = pq($res)->find('td:eq(5)')->text();
            $id = trim($ids);
            $name = trim($names);
            $marketCap = trim($marketCaps);
            $price = trim($prices);
            $circulatingSupplyss = explode('*', $circulatingSupplys);
            $circulatingSupply = trim($circulatingSupplyss[0]);
            
            echo $id."<br>".$name."<br>".$marketCap."<br>".$price."<br>".$circulatingSupply;
            echo '<hr>';
//            $result[] = ["id" => $id, "name" => $name, "market cap" => $marketCap, "price" => $price, "circulating supply" => $circulatingSupply];
        }
        //var_dump($result);
       // setExcel($result);
        
        function setExcel($data){
            $phpExcel = new PHPExcel();
            $phpExcel->setActiveSheetIndex(0);
            $sheet = $phpExcel->getActiveSheet();
            $i = 2;
            $sheet->setTitle('Данные парсинга');
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            $sheet->getColumnDimension('E')->setAutoSize(true);
            $sheet->setCellValue('A1', '#');
            $sheet->setCellValue('B1', 'Name');
            $sheet->setCellValue('C1', 'Market Cap');
            $sheet->setCellValue('D1', 'Price');
            $sheet->setCellValue('E1', 'Circulating Supply');
            $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $sheet->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $sheet->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $sheet->getStyle('D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $sheet->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            
            foreach ($data as $value){
                //foreach ($value as $values){
                    $sheet->setCellValue('A'.$i, $value["id"]);
                    $sheet->setCellValue('B'.$i, $value["name"]);
                    $sheet->setCellValue('C'.$i, $value["market cap"]);
                    $sheet->setCellValue('D'.$i, $value["price"]);
                    $sheet->setCellValue('E'.$i, $value["circulating supply"]); 
                    $sheet->getStyle('A'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $sheet->getStyle('B'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $sheet->getStyle('C'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $sheet->getStyle('D'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $sheet->getStyle('E'.$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    
                
                    $i++;
               // }
//                foreach ($value as $v){
//                    echo '<br>'.$v.'<hr>';
//                }
            }
        
        
//        
          //header("Content-type:application/vnd.ms-excel");
          //header("Content-Disposition: attachment; filename='simple.xls'");
            $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');
            //$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'CSV');
            $objWriter->save('w.xls');
            //$objWriter->save('php://output');

        
            
            exit();
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
//        function setDocument($data){
//            $phpExcel = new PHPExcel();
//            $phpExcel->setActiveSheetIndex(0);
//            $sheet = $phpExcel->getActiveSheet();
//            $i = 2;
//            $sheet->setTitle('Данные парсинга');
//            $sheet->getColumnDimension('A')->setAutoSize(true);
//            $sheet->getColumnDimension('B')->setAutoSize(true);
//            $sheet->getColumnDimension('C')->setAutoSize(true);
//            $sheet->getColumnDimension('D')->setAutoSize(true);
//            $sheet->getColumnDimension('E')->setAutoSize(true);
//            $sheet->getColumnDimension('F')->setAutoSize(true);
//            $sheet->getColumnDimension('G')->setAutoSize(true);
//            $sheet->getColumnDimension('H')->setAutoSize(true);
//            $sheet->getColumnDimension('I')->setAutoSize(true);
//            $sheet->getColumnDimension('J')->setAutoSize(true);
//            $sheet->getColumnDimension('K')->setAutoSize(true);
//            $sheet->getColumnDimension('L')->setAutoSize(true);
//            $sheet->getColumnDimension('M')->setAutoSize(true);
//            $sheet->getColumnDimension('N')->setAutoSize(true);
//            $sheet->getColumnDimension('O')->setAutoSize(true);
//            $sheet->setCellValue('A1', 'Просмотров');
//            $sheet->setCellValue('B1', 'Цена квартиры');
//            $sheet->setCellValue('C1', 'Цена квадратного метра');
//            $sheet->setCellValue('D1', 'Населенный пункт');
//            $sheet->setCellValue('E1', 'Адрес');
//            $sheet->setCellValue('F1', 'Район города');
//            $sheet->setCellValue('G1', 'Метро');
//            $sheet->setCellValue('H1', 'Комнат');
//            $sheet->setCellValue('I1', 'Этажность');
//            $sheet->setCellValue('J1', 'Тип дома');
//            $sheet->setCellValue('K1', 'Площадь');
//            $sheet->setCellValue('L1', 'Высота потолков');
//            $sheet->setCellValue('M1', 'Год постройки');
//            $sheet->setCellValue('N1', 'Сан/узел');
//            $sheet->setCellValue('O1', 'Ссылка');
//            foreach ($data as $value){
//                foreach ($value as $values){
//                    $sheet->setCellValue('A'.$i, $values[0]);
//                    $sheet->setCellValue('B'.$i, $values[1]);
//                    $sheet->setCellValue('C'.$i, $values[2]);
//                    $sheet->setCellValue('D'.$i, $values[3]);
//                    $sheet->setCellValue('E'.$i, $values[4]);
//                    $sheet->setCellValue('F'.$i, $values[5]);
//                    $sheet->setCellValue('G'.$i, $values[6]);
//                    $sheet->setCellValue('H'.$i, $values[7]);
//                    $sheet->setCellValue('I'.$i, $values[8]);
//                    $sheet->setCellValue('J'.$i, $values[9]);
//                    $sheet->setCellValue('K'.$i, $values[10]);
//                    $sheet->setCellValue('L'.$i, $values[11]);
//                    $sheet->setCellValue('M'.$i, $values[12]);
//                    $sheet->setCellValue('N'.$i, $values[13]);
//                    $sheet->setCellValue('O'.$i, $values[14]);
//           
//                
//                    $i++;
//                }
////                foreach ($value as $v){
////                    echo '<br>'.$v.'<hr>';
////                }
//            }
//        
//        
////        
//          //header("Content-type:application/vnd.ms-excel");
//          //header("Content-Disposition: attachment; filename='simple.xls'");
//            $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');
//            //$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'CSV');
//            //$objWriter->save('w.xls');
//            $objWriter->save('php://output');
//
//            exit();
//        }
//        
//        
//        
//        
//        try{
//            $url = $client->request('GET','https://realt.by/sale/flats/?search=eJx1j00OgjAQhU8zrDulLbBwQ8BrNK0M2IRgU0qMt7cWiQt1Mz%2F53nuZibf7ot0AsiWQ3Uki44Xd3Dy4ZdIPMiGRKSPOUHyh%2BUBVEcgbF%2FQaTaR3XGrsxaFj0CLwcx566BBqnmfxx4a7LenwUKfKfkfoleLmkyvQRXsK2pv95JJ92DW%2FJwRKa6UdVDWyRpGqJU9rM6qmpNI8AQYKS2U%3D');
//           }
//        catch (GuzzleHttp\Exception\ClientException $e){echo $e;}
//        catch (RequestException $e){echo $e;}
//        $body = $url->getBody();
//        $document = \phpQuery::newDocumentHTML($body,'UTF8');
//        $pagin = pq($document)->find('#c1030 > div > div:nth-child(5) > span > span > a')->text();     
//        $pag = (int)$pagin;
//               
//       for($i = 0; $i < $pag; $i++){
//            $uri = getPost($client, $i);
//            $parseData[] = result($client, $uri);  
//        }
//        setDocument($parseData);
//
//        
//        
//        
//        
//        
//        
//        
//        
//        
//        
//        
//        
//        function setCsv($res, $o){
//            
////            foreach ($res as $fi){
////                foreach ($fi as $ww){
////                    foreach ($ww as $t){
////                        $fieldd[] = iconv('utf-8', 'windows-1251', $t);
////                    }
////                }
////
////            }
//            foreach ($res as $df){
//                fputcsv($o, $df, ';', ' ');
//            }
//
//
////            foreach ($res as $results){
////                foreach ($results as $re){
////                    var_dump($results);
////                    echo '<hr>';
////                    $resul[] = iconv('utf-8', 'windows-1251', $re);
////                    //fputcsv($o, explode(';', $resul), ';');
////                    fputcsv($o, $resul, ';');
////                }
////                 
////            }
//
//            fclose($o);
//        } 
//            
//            
//            
//            
//            
//            
//            
//            
//            
//            
//            
//            
//            
//            
//            
//            
//            
//        
//        function getPost($clients, $pages){
//            try {          
//                $url = $clients->request('GET','https://realt.by/sale/flats/?search=eJx1j00OgjAQhU8zrDulLbBwQ8BrNK0M2IRgU0qMt7cWiQt1Mz%2F53nuZibf7ot0AsiWQ3Uki44Xd3Dy4ZdIPMiGRKSPOUHyh%2BUBVEcgbF%2FQaTaR3XGrsxaFj0CLwcx566BBqnmfxx4a7LenwUKfKfkfoleLmkyvQRXsK2pv95JJ92DW%2FJwRKa6UdVDWyRpGqJU9rM6qmpNI8AQYKS2U%3D&page='.$pages);
//            }
//            catch (GuzzleHttp\Exception\ClientException $e){return;}
//            catch (RequestException $e){return;}
//            $body = $url->getBody();                                                                                                                                                                                                                                                                          
//            $documents = \phpQuery::newDocumentHTML($body,'UTF8');
//            $ref = pq($documents)->find('#c1030 > div > div.bd-table');
//            $link = pq($ref)->find('div');
//
//            foreach($link as $l){
//                
//                $pos = pq($l)->find('div > div > a')->attr('href');
//                if($pos !=""){
//                    $posts[] = $pos;
//                }
//                
//            }
//            return $posts;
//        }
//        
//        
//        function result($clients, $uri){
//
//            foreach ($uri as $u){
//                try{
//                    $url = $clients->request('GET', $u);
//                   }
//                catch (GuzzleHttp\Exception\ClientException $e){continue;}
//                catch (RequestException $e){continue;}
//                $body = $url->getBody();
//                $document = \phpQuery::newDocumentHTML($body);//'UTF8');
//
//                $views = pq($document)->find('#c1030 > div > div.views-sms > div > span > span')->text();               
//                $prices = pq($document)->find('#c1030 > div > div:nth-child(6) > div > p:nth-child(6) > span.b14.price-byr')->text();
//                $price = explode(',', $prices);
//                $priceC = count($price);
//                if($priceC === 3){
//                    $priceApartments = $price[0];
//                    $priceApartment = $priceApartments.','.$price[1];
//                    $priceMeter = $price[2];
//                }
//                else{
//                    $priceApartment = $price[0];
//                    $priceMeter = $price[1];
//                }
//
//                
//                //Location:
//                $locality = pq($document)->find('#c1030 > div > table:eq(1) > tbody > tr:nth-child(2) > td.table-row-right > a > strong')->text();
//                $address = pq($document)->find('#c1030 > div > table:eq(1) > tbody > tr:nth-child(3) > td.table-row-right')->text();                                                
//                $district = pq($document)->find('#c1030 > div > table:eq(1) > tbody > tr:nth-child(4) > td.table-row-right > a:nth-child(2)')->text();
//                $metro = pq($document)->find('#c1030 > div > table:eq(1) > tbody > tr:nth-child(5) > td.table-row-right')->text();
//
//                //Object parameters:
//                $rooms = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(1) > td.table-row-right > div:nth-child(2) > strong')->text();
//                $floor = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(2) > td.table-row-right')->text();
//                $type = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(3) > td.table-row-right')->text();
//                $total = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(4) > td.table-row-right > strong')->text();
//                $heights = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(5) > td.table-row-left')->text();                               
//                if($heights === 'Планировка'){
//                    $height = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(6) > td.table-row-right')->text();
//                    $year = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(7) > td.table-row-right')->text();
//                    $san = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(8) > td.table-row-right')->text();
//                }
//                else{
//                    $height = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(5) > td.table-row-right')->text();
//                    $year = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(6) > td.table-row-right')->text();
//                    $san = pq($document)->find('#c1030 > div > table:eq(2) > tbody > tr:nth-child(7) > td.table-row-right')->text();
//                }
//                               
//                $link = $u;
//                
//                
//                $views = str_replace(';', '', $views);
//                $views = str_replace(' просмотров: ','',$views);
//                $priceApartment = str_replace(';', '', $priceApartment);
//                $priceMeter = str_replace(';', '', $priceMeter);
//                $locality = str_replace(';', '', $locality);
//                $address = str_replace(';', '', $address);
//                $address = str_replace('Информация о доме', '', $address); 
//                $district = str_replace(';', '', $district);
//                $metro = str_replace(';', '', $metro);
//                $rooms = str_replace(';', '', $rooms);
//                $floor = str_replace(';', '', $floor);
//                $type = str_replace(';', '', $type);
//                $total = str_replace(';', '', $total);
//                $height = str_replace(';', '', $height);
//                $year = str_replace(';', '', $year);
//                $san = str_replace(';', '', $san);
//                
//
//                //echo 'Main: <br>'.$views.'<br>'.$priceApartment.'<br>'.$priceMeter.'<br>'.$metro.'<br>'.'Location: <br>'.$locality.'<br>'.$address.'<br>'.$district.'<br>Object parameters: <br>'.$rooms.'<br>'.$floor.'<br>'.$type.'<br>'.$total.'<br>'.$height.'<br>'.$year.'<br>'.$san.'<br>'.$link .'<hr>';
//                //$t = $views.';'.$priceApartment.';'.$priceMeter.';'.$locality.';'.$address.';'.$district.';'.$metro.';'.$rooms.';'.$floor.';'.$type.';'.$total.';'.$height.';'.$year.';'.$san.';'.$link;
//                $parseResult[] = array($views, $priceApartment, $priceMeter, $locality, $address, $district, $metro, $rooms, $floor, $type, $total, $height, $year, $san, $link);
////                foreach ($parseResult as $t){
////                    $parseResults[] = iconv('utf-8', 'windows-1251', $t);
////                }
//               
//            } 
//            return $parseResult;
//        }
//        
//        
//
//        //            $filename = 'file.csv';
////            //$filename = 'php://output';
////            $out = fopen($filename, 'w');
////            $fields = array("Просмотров","Цена квартиры","Цена квадратного метра","Населенный пункт","Адрес","Район города","Метро","Комнат","Этажность","Тип дома","Площадь","Высота потолков","Год постройки","Сан/узел","Ссылка");
////            foreach ($fields as $f){
////                $field[] = iconv('utf-8', 'windows-1251', $f);
////            }
////            fputcsv($out, $field, ';');
////            //fclose($out);
//        
//        
//        
//        
//        
        */
        ?>
    </body>
</html>
