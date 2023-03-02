<?php
                                    $url_path = 'http://apps.gapls.intraer/scati/resource/v1/ldap';
                                    $data = http_build_query(array(
                                                'login' => '15570391606', 
                                                'senha' => 'Leandro@123'
                                                ));
                                    
                                    $options = array('http' => array(
                                        'method' => "POST",
                                        'header' =>
                                            "Content-Type: application/x-www-form-urlencoded",
                                        'content' => $data
                                    ));

                                    $stream = stream_context_create($options);
                                    $result = json_decode((file_get_contents($url_path, false, $stream)), true);
                                    //var_dump($result);
                                    echo $result['nomeGuerra'];
                                ?>